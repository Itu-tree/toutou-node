<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    //
    public function storeImage(Request $request)
    {   
        Storage::disk('local')->put('images/')
    }
}
