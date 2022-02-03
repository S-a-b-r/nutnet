@extends('layouts.app')

@section('content')
    @if(isset($success))
        <div class="text-success">
            {{$success}}
        </div>
    @endif
    <a href="{{route("albums.create")}}">Добавить новый альбом</a>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($albums as $album)
            <div class="card" style="width: 27rem; border-radius: 0px">
                <p class="card-header" style="font-size: 20px; text-align: center">{{$album->name}}</p>

                <img src="{{$album->cover}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">{{$album->artist}}</p>
                    <p class="card-text">{!! $album->description !!}</p>
                    <div class="d-flex justify-content-between">
                        <a href="{{route('albums.edit',$album->id)}}">Edit</a>
                        <form action="{{route('albums.destroy', $album->id)}}">
                            @method('delete')
                            <button type="submit" class="mx-3" style="border: 0px; background: white">
                                <a href="#">Delete</a>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
