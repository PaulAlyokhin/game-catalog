@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Edit Game</h1>

        <a href="{{ route('games.index') }}" class="btn btn-primary">Back to games list</a>

        <form action="{{ route('games.update', $game->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group mb-2">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Game Title"
                    value="{{ $game->title }}">
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="developer">Developer</label>
                <input type="text" name="developer" class="form-control" id="developer" placeholder="Game Developer"
                    value="{{ $game->developer }}">
                @error('developer')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="developer">Genre</label>
                <input type="text" name="genre" class="form-control" id="genre" placeholder="Game Genre"
                    value="{{ $game->genre }}">
                @error('genre')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="release_date">Release Date</label>
                <input type="date" name="release_date" class="form-control" id="release_date" max="{{ date('Y-m-d') }}"
                    value="{{ $game->release_date }}">
                @error('release_date')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="platform">Platform</label>
                <select type="text" name="platform" class="form-control" id="platform">
                    @foreach(App\Models\Game::PLATFORMS as $key => $label)
                        <option value="{{ $key }}" {{ old('platform', $game->platform) == $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @error('platform')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="price">Price</label>
                <input type="number" name="price" class="form-control" id="price" min="0" step="0.01"
                    value="{{ $game->price }}">
                @error('price')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="image">Image</label>
                <input type="file" name="image" class="form-control" id="image">
                @error('image')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                @if ($game->image)
                    <p><img src="{{ asset('storage/' . $game->image) }}" alt="Game Image" class="img-fluid" width="200"
                            height="200"></p>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection