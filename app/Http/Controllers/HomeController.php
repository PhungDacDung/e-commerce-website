<?php

namespace App\Http\Controllers;

use App\Http\Services\Product\ProductService;
use App\Http\Services\Slider\SliderService;
use Illuminate\Http\Request;

class HomeController extends Controller
{


    protected $slider;
    protected $productService;

    public function __construct(SliderService $slider, ProductService $productService)
    {
        $this->slider = $slider;
        $this->productService = $productService;
    }

    public function index(){
        return view('/main',[
            'title' => 'Trang chủ',
            'sliders' => $this->slider->getSlider(),
            'products' => $this->productService->get(),

        ]);
       
    }

    public function store(){
        $data = $this->slider->getSlider();
        dd($data);
    }


    public function loadMore(Request $request){
        dd($request->input());

        
        $page = $request->input('page',0);

        $result =  $this->productService->get($page);


        if($result){
            $html = view('productHome/list',['product' => $result])->render();

            return response()->json([
                'html' => $html
            ]);
        }
        return response()->json(['html' => '']);
    }
}
