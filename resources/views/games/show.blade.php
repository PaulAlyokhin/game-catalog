@extends('layouts.app')
@section('content')
    <div class="d-flex flex-column gap-2">
        <div class="d-flex flex-column flex-sm-row align-items-stretch">
            <a href="{{ route('games.index') }}" class="btn btn-primary">
                <i class="fa-solid fa-arrow-left"></i> Back to games list
            </a>
        </div>

        @if ($game->image)
            <p class="text-center text-sm-start">
                <img src="{{ asset('storage/' . $game->image) }}" alt="Game Image" class="img-fluid" width="200" height="200">
            </p>
        @endif

        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <tr>
                        <td>Title:</td>
                        <td>{{ $game->title }}</td>
                    </tr>
                    <tr>
                        <td>Developer:</td>
                        <td>{{ $game->developer }}</td>
                    </tr>
                    <tr>
                        <td>Genre:</td>
                        <td>{{ $game->genre }}</td>
                    </tr>
                    <tr>
                        <td>Release Date:</td>
                        <td>{{ $game->release_date->format('d/m/Y') }}</td>
                    </tr>
                    <tr>
                        <td>Platform:</td>
                        <td>{{ \App\Models\Game::PLATFORMS[$game->platform] ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td>Price:</td>
                        <td>
                            @if ($game->price > 0)
                                ${{ $game->price }}
                            @else
                                Free to play
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="d-flex flex-column flex-sm-row gap-1">
            <a href="{{ route('games.edit', $game->id) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('games.destroy', $game->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger w-100" onclick="return confirm('Are you sure?');">
                    Delete
                </button>
            </form>
        </div>
    </div>
@endsection