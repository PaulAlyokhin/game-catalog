@extends('layouts.app')
@section('content')
    @session('success')
        <div class="alert alert-success">{{ $value }}</div>
    @endsession

    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-stretch gap-1">
        <a href="{{ route('games.create') }}" class="btn btn-primary">
            <i class="fa-solid fa-plus"></i> Add new game
        </a>

        <form method="GET" action="{{ route('games.index') }}" class="d-flex flex-column flex-sm-row gap-2">
            <div class="d-flex gap-1">
                <select type="text" name="filter" class="form-select">
                    <option value="">Any platform</option>
                    @foreach(App\Models\Game::PLATFORMS as $key => $label)
                        <option value="{{ $key }}" {{ request('filter') == $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>

            <div class="d-flex gap-1">
                <input type="search" name="search" class="form-control" placeholder="Search" value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i></button>
                <a href="{{ route('games.index') }}" class="btn btn-secondary">
                    <i class="fa-solid fa-xmark"></i>
                </a>
            </div>
        </form>
    </div>

    @if ($games->count())
        <div class="table-responsive">
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
                            <td>{{ $game->release_date->format('d/m/Y') }}</td>
                            <td>{{ \App\Models\Game::PLATFORMS[$game->platform] ?? 'N/A' }}</td>
                            <td>
                                @if ($game->price > 0)
                                    ${{ $game->price }}
                                @else
                                    Free to play
                                @endif
                            </td>
                            <td>
                                <div class="d-flex flex-column flex-sm-row gap-1">
                                    <a href="{{ route('games.show', $game->id) }}" class="btn btn-sm btn-primary">View</a>
                                    <a href="{{ route('games.edit', $game->id) }}" class="btn btn-sm btn-primary">Edit</a>

                                    <form action="{{ route('games.destroy', $game->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure?');">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class=" mt-2">
            {{ $games->withQueryString()->links('pagination::bootstrap-5') }}
        </div>
    @else
        <hr>
        <p class="fs-4">No results</p>
    @endif
@endsection