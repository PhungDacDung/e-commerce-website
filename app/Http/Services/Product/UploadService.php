<?php

namespace App\Http\Services\Product;
use Illuminate\Http\Request;

class UploadService{
    
    public function store($request){

        if($request->hasFile('thumb')){
            
            $name = $request->file('thumb')->getClientOriginalName();

            $pathFull = 'uploads/'.date("Y/m/d");
            $path = $request->file('thumb')->storeAs(
                'public/'. $pathFull .$name);
        
           

            
            return '/storage/'.$pathFull.''. $name;
        }
    }
}