<?php

namespace App\Http\Controllers\Album;

use App\Http\Controllers\Controller;
use App\Models\Album;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {

        $albums = Album::paginate(10);

        return view('albums.index', compact('albums'));
    }
}
