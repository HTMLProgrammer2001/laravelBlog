<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $filename)
    {
        $filePath = storage_path().'/app/uploads/'.$filename;

        if ( ! File::exists($filePath))
        {
            return response($filePath . " File does not exist.", 404);
        }

        return Storage::response('uploads/' . $filename);
    }
}
