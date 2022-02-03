<?php

namespace App\Http\Controllers\Album;

use App\Http\Controllers\Controller;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EditController extends Controller
{

    public function __invoke(Album $album)
    {
        return view('albums.edit',compact('album'));
    }
}
