@extends('layouts.app')

@section('content')
    <form action="{{route('albums.update', $album->id)}}">
        @method('patch')
        <div class="mb-3">
            <label for="nameAlbum" class="form-label">Album name</label>
            <input name="name" value="{{$album->name}}" type="text" class="form-control" id="nameAlbum">
        </div>
        <div class="mb-3">
            <label for="nameArtist" class="form-label">Artist</label>
            <input name="artist" value="{{$album->artist}}" type="text" class="form-control" id="nameArtist">
        </div>
        <div class="mb-3">
            <label for="descriptionAlbum" class="form-label">Album description</label>
            <textarea name="description" class="form-control" id="descriptionAlbum" rows="3">{{$album->description}}</textarea>
        </div>
        <div class="mb-3">
            <label for="coverAlbum" class="form-label">Cover Album</label>
            <img src="{{$album->cover}}" class="form-control w-25" id="coverAlbum"/>
        </div>
        <button type="submit" class="btn btn-outline-dark">Save</button>
    </form>
@endsection
