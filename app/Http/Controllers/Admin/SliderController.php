<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Product\UploadService;
use App\Http\Services\Slider\SliderService;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    protected $slider;
    protected $upload;

    public function __construct(SliderService $slider, UploadService $upload)
    {
        $this->slider = $slider;
        $this->upload = $upload;
    }

    public function create(){
        return view('admin/slider/add',[
            'title' => "Thêm slider",

        ]);
    }

    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'url' =>'required',
            'thumb' => 'required'
        ]);

        $url = $this->upload->store($request);

        $this->slider->insert($request, $url);

        return redirect()->back();
    }
}
