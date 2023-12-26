<?php

namespace App\Http\Services\Product;

use App\Models\Product;

class ProductService{

    const LIMIT = 16;

    public function insert($request, $url){
        
            try{
                Product::create([
                    'name' => (string)$request->input('name'),
                    'description' => (string)$request->input('description'),
                    'menu_id' => (int)$request->input('menu_id'),
                    'content' => (string)$request->input('content'),
                    'price' => (int)$request->input('price'),
                    'price_sale' => (int)$request->input('price_sale'),
                    'thumb' => (string)$url,
     
                ]);

                return redirect()->back()->with('success',"Thêm sản phẩm thành công");

            } catch(\Exception ){

                return redirect()->back()->with('error',"Thêm sản phẩm thất bại");
                return false;
            }

            return true;
    }

    
    public function get($page = null){
        return Product::orderbyDesc('id')
        ->when($page != null, function($query) use ($page){
            $query->offset($page * self::LIMIT);
        })
        ->limit(self::LIMIT)
        ->get(); 

    }



    public function update($request, $product, $url){
        
        $product->name = (string)$request->input('name');
        $product->description = (string)$request->input('description');
        $product->menu_id = (string)$request->input('menu_id');
        $product->content = (string)$request->input('content');
        $product->price = (string)$request->input('price');
        $product->price_sale = (string)$request->input('price_sale');
        $product->thumb = (string)$url;

        $product->save();

        return redirect()->back()->with('success','Sửa thông tin thành công');
        
        return true;
    }

    public function destroy($request){

       $id =(int)$request->input('id');
       
       $product = Product::where('id',$id)->first();

       if($product){
            return Product::where('id',$id)->delete();
       }
       return false;
    }
}