<?php

namespace App\Http\Controllers\Album;

use App\Http\Controllers\Controller;
use App\Http\Requests\Album\FindRequest;
use App\Models\Album;
use Illuminate\Support\Facades\Http;

class FindController extends Controller
{

    public function __invoke(FindRequest $request)
    {
        $data = $request->validated();
        $album = $data['name'];
        $artist = $data['artist'];
        $response = Http::get('http://ws.audioscrobbler.com/2.0/?method=album.getinfo&api_key=
        1d79627a0e9f0a6422f8e6d2d3410669&artist='.$artist.'&album='.$album.'&format=json&autocorrect=1');
        $outArr = json_decode($response);
        if(isset($outArr->error)){
            return view('albums.search')->with('message','К сожалению, мы не нашли данного альбома, попробуйте
             поискать его название на <a href="https://www.last.fm">last.fm</a>');
        }
        try{
            $data['cover'] = ((array)$outArr->album->image[5])['#text'];
            $data['description'] = $outArr->album->wiki->content;
        }
        catch (\Exception $exception){
            return view('albums.search')->with('message','К сожалению, мы не нашли данного альбома, попробуйте
            поискать его название на <a href="https://www.last.fm">last.fm</a>');
        }
        Album::firstOrCreate($data);

        return redirect()->route('albums.index')->with('success',"Альбом успешно добавлен");
    }
}
