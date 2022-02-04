<?php

namespace App\Http\Controllers\Album;

use App\Http\Controllers\Controller;
use App\Http\Requests\Album\StoreRequest;
use App\Models\Album;
use Illuminate\Support\Facades\Http;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        Album::firstOrCreate($data);

        return redirect()->route('albums.index')->with('success',"Альбом успешно добавлен");
    }
}
