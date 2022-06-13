<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TinymceController extends Controller
{
    public function store(Request $request)
{
        $file=$request->file('file');
        $path= url('/uploads/').'/'.$file->getClientOriginalName();
        $imgpath=$file->move(public_path('/uploads/'),$file->getClientOriginalName());
        $fileNameToStore= $path;

        return json_encode(['location' => $fileNameToStore]);

}
}
