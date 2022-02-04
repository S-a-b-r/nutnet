<?php

namespace App\Http\Controllers\Album;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SearchController extends Controller
{
    public function __invoke()
    {
        return view('albums.search');
    }
}
