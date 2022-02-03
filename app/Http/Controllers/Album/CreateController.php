<?php

namespace App\Http\Controllers\Album;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CreateController extends Controller
{

    public function __invoke()
    {
        return view('albums.create');
    }
}
