<?php

namespace App\Http\Controllers\Album;

use App\Http\Controllers\Controller;
use App\Models\Album;

class DestroyController extends Controller
{

    public function __invoke(Album $album)
    {
        $album->delete();
        return redirect()->route('albums.index');
    }
}
