<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use Illuminate\Support\Facades\Storage;

class GameController extends Controller
{
    public function index(Request $request)
    {
        $query = Game::query();

        if ($request->filled('search')) {
            $search = $request->input('search');

            $query->where(function ($query) use ($search) {
                $query->where('title', 'like', "%{$search}%")
                    ->orWhere('genre', 'like', "%{$search}%");
            });
        }

        if ($request->filled('filter') && in_array($request->filter, array_keys(Game::PLATFORMS))) {
            $query->where('platform', $request->filter);
        }

        $games = $query->paginate(5);

        return view("games.index", compact("games"));
    }

    public function create()
    {
        return view("games.create");
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'developer' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'release_date' => 'required|date',
            'platform' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validatedData['image'] = Storage::disk('public')->putFile('games', $request->file('image'));
        }

        Game::create($validatedData);

        return redirect()->route("games.index")->with("success", "Game added successfully");
    }

    public function show(Game $game)
    {
        return view("games.show", compact("game"));
    }

    public function edit(Game $game)
    {
        return view("games.edit", compact("game"));
    }

    public function update(Request $request, Game $game)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'developer' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'release_date' => 'required|date',
            'platform' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($game->image && Storage::disk('public')->exists($game->image)) {
                Storage::disk('public')->delete($game->image);
            }

            $game->image = Storage::disk('public')->putFile('games', $request->file('image'));
        }

        $game->update($request->except('image'));

        return redirect()->route("games.index")->with("success", "Game updated successfully");
    }

    public function destroy(Game $game)
    {
        if ($game->image && Storage::disk('public')->exists($game->image)) {
            Storage::disk('public')->delete($game->image);
        }

        $game->delete();

        return redirect()->route("games.index")->with("success", "Game removed successfully");
    }
}
