<?php

namespace App\Http\Controllers\Album;

use App\Http\Controllers\Controller;
use App\Http\Requests\Album\StoreRequest;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class StoreController extends Controller
{

    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $album = $data['name'];
        $artist = $data['artist'];
        $response = Http::get('http://ws.audioscrobbler.com/2.0/?method=album.getinfo&api_key=1d79627a0e9f0a6422f8e6d2d3410669&artist='.$artist.'&album='.$album.'&format=json');
        $outArr = json_decode($response);
        if(isset($outArr->error)){
            return view('albums.create')->with('message','К сожалению, мы не нашли данного альбома, попробуйте поменять регистр
            или убрать лишние пробелы');
        }
        try{
            $data['cover'] = ((array)$outArr->album->image[5])['#text'];
            $data['description'] = $outArr->album->wiki->content;
        }
        catch (\Exception $exception){
            return view('albums.create')->with('message','К сожалению, мы не нашли данного альбома, попробуйте поменять регистр
            или убрать лишние пробелы');
        }


        Album::firstOrCreate($data);
        return redirect()->route('albums.index')->with('success',"Альбом успешно добавлен");
    }
}
