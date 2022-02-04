@extends('layouts.app')

@section('content')
    @if(isset($success))
        <div class="text-success">
            {{$success}}
        </div>
    @endif
    @auth()
        <a href="{{route("albums.search")}}">Добавить новый альбом</a>
    @endauth
    <div class="row">
        @foreach($albums as $album)
            <div class="card m-2" style="width: 26rem; border-radius: 3px">
                <p class="card-header" style="font-size: 20px; text-align: center; background: white">{{$album->name}}</p>

                <img src="{{$album->cover}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h4 class="card-text">{{$album->artist}}</h4>
                    <p class="card-text text-description" style="height: 15rem; overflow-y:scroll">{!! $album->description !!}</p>
                    @auth()
                        <div class="d-flex justify-content-between">
                            <a href="{{route('albums.edit',$album->id)}}">Edit</a>
                            <form action="{{route('albums.destroy', $album->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="mx-3" style="background: white; border: 0px">
                                    <p style="text-decoration: underline; color: #0b5ed7">
                                        Delete
                                    </p>
                                </button>
                            </form>
                        </div>
                    @endauth
                </div>
            </div>
        @endforeach
    </div>
    <div class="m-auto" style="width: min-content">{{$albums->links()}}</div>

@endsection
