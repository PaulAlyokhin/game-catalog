<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::all();
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
        ]);
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
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'developer' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'release_date' => 'required|date',
            'platform' => 'required|string',
            'price' => 'required|numeric|min:0',
        ]);
        $game->update($validatedData);
        return redirect()->route("games.index")->with("success", "Game updated successfully");
    }

    public function destroy(Game $game)
    {
        $game->delete();
        return redirect()->route("games.index")->with("success", "Game removed successfully");
    }
}
