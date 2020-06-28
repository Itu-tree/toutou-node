<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    //
    public function storeImage(Request $request)
    {
        //$path = Storage::disk('public')->put('images/' . $request->post_id, $request->file('image'), 'public');
        $path = $request->file('image')->store('images/' . $request->post_id);
        return asset("storage/" . $path);
    }
}
