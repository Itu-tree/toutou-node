<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    //
    public function storeImage(Request $request)
    {
        //$path = Storage::disk('public')->put('images/' . $request->article_id, $request->file('image'), 'public');
        $path = $request->file('image')->store('images/' . $request->article_id);
        return secure_asset("storage/" . $path);
    }
}
