<?php

namespace App\Http\Controllers\Album;

use App\Http\Controllers\Controller;
use App\Http\Requests\Album\StoreRequest;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DestroyController extends Controller
{

    public function __invoke(Album $album)
    {

        return redirect()->to(route('albums.index'));
    }
}
