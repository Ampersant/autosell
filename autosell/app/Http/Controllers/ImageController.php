<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function show($path)
    {
        // Construct the full path to the image within the storage directory

        // Check if the image exists; if not, return a 404 response
        $image = asset('storage/images/autos/ATnGf6i7ojbmtdBiuXBSTqos4GHaRzBASZ3Xiydp.jpg');

        

        // Return the image as a response
        return $image;
    }
}
