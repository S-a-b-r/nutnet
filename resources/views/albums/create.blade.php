@extends('layouts.app')

@section('content')
    <form action="{{route('albums.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="nameAlbum" class="form-label">Album name</label>
            <input name="name" value="{{old('name')}}" type="text" class="form-control" id="nameAlbum">
        </div>
        <div class="mb-3">
            <label for="nameArtist" class="form-label">Artist</label>
            <input name="artist" value="{{old('artist')}}" type="text" class="form-control" id="nameArtist">
        </div>
        <div class="mb-3">
            <label for="descriptionAlbum" class="form-label">Album description</label>
            <textarea name="description" class="form-control" id="descriptionAlbum" rows="3">{{old('description')}}</textarea>
        </div>
        <div class="mb-3">
            <label for="coverAlbum" class="form-label">Вставьте ссылку на изображение из внешнего источника(например, lastFM)</label>
            <input name="cover" id='coverAlbum' class="form-control" value="{{old('cover')}}">
        </div>
        <button type="submit" class="btn btn-outline-dark">Add</button>
    </form>
    @if ($errors->any())
        <div class="text-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
