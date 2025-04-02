@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>{{ $game->title }}</h1>

        <a href="{{ route('games.index') }}" class="btn btn-primary">Back to games list</a>

        <p><strong>Title:</strong> {{ $game->title }}</p>
        <p><strong>Developer:</strong> {{ $game->developer }}</p>
        <p><strong>Genre:</strong> {{ $game->genre }}</p>
        <p><strong>Release Date:</strong> {{ $game->release_date }}</p>
        <p><strong>Platform:</strong> {{ \App\Models\Game::PLATFORMS[$game->platform] ?? 'Unknown Platform' }}</p>
        <p><strong>Price:</strong> ${{ $game->price }}</p>

        <a href="{{ route('games.edit', $game->id) }}" class="btn btn-primary">Edit</a>

        <form action="{{ route('games.destroy', $game->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?');">
                Delete
            </button>
        </form>
    </div>
@endsection