<?php

namespace App\Http\Services\Slider;
use App\Models\Slider;

class SliderService{
    public function insert($request, $url){
        try{
                Slider::create([
                    'name' => (string)$request->input('name'),
                    'thumb' => (string)$url,
                    'url' => (string)$request->input('url'),
                    'sort_by' => (string)$request->input('sort_by'),
                ]);
                
                return redirect()->back()->with('success','Thành Công');

        } catch(\Exception $err){
            return redirect()->back()->with('error','Thất bại');
            return false;
        }

        return true;
    }

    public function getSlider(){
        return Slider::orderbyDesc('id')->paginate(10);

    }
}