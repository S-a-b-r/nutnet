@extends('layouts.app')

@section('content')
    <form method="post" action="{{route('albums.store')}}">
        @csrf
        <h3 class="mb-3">Enter album name and artist. We will try to find this album</h3>
        <div class="mb-3">
            <label for="albumName" class="form-label">Album Name</label>
            <input value="{{old('name')}}" name="name" type="text" class="form-control" id="albumName" placeholder="Enter album name">
        </div>
        <div class="mb-3">
            <label for="albumArtist" class="form-label">Artist name</label>
            <input value="{{old('artist')}}" name="artist" class="form-control" id="albumArtist" placeholder="Enter artist name">
        </div>
        <button class="btn btn-outline-dark" type="submit">Find album</button>
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
    @if(isset($message))
        <div class="text-danger">
            {{$message}}
        </div>
    @endif
@endsection
