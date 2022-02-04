<?php

namespace App\Http\Controllers\Album;

use App\Http\Controllers\Controller;
use App\Http\Requests\Album\UpdateRequest;
use App\Models\Album;
use Illuminate\Support\Facades\Log;

class UpdateController extends Controller
{
    public function __invoke(Album $album, UpdateRequest $request)
    {
        $data = $request->validated();
        Log::channel('single')->info('Album with id:'.$album->id.' was edited user:'.auth()->user()->id.'; '.$album->name.' => '. $data['name'].', '.$album->artist.' => '.$data['artist']);
        $album->update($data);
        return redirect()->route('albums.index');
    }
}
