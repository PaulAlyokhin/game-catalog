@extends('layouts.app')
@section('content')
    <h1>Games</h1>
    @session('success')
        <div class="alert alert-success">{{ $value }}</div>
    @endsession
    <a href="{{ route('games.create') }}" class="btn btn-primary">Add new game</a>
    <table class="table table-hover">
        <thead class="thead-light">
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Developer</th>
                <th scope="col">Genre</th>
                <th scope="col">Release Date</th>
                <th scope="col">Platform</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($games as $game)
                <tr scope="row">
                    <td>{{ $game->title }}</td>
                    <td>{{ $game->developer }}</td>
                    <td>{{ $game->genre }}</td>
                    <td>{{ $game->release_date }}</td>
                    <td>{{ \App\Models\Game::PLATFORMS[$game->platform] ?? 'Unknown Platform' }}</td>
                    <td>{{ $game->price }}</td>
                    <td>
                        <a href="{{ route('games.show', $game->id) }}" class="btn btn-sm btn-primary">View</a>
                        <a href="{{ route('games.edit', $game->id) }}" class="btn btn-sm btn-primary">Edit</a>

                        <form action="{{ route('games.destroy', $game->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?');">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection