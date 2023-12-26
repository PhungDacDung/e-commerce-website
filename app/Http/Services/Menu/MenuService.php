<?php
namespace App\Http\Services\Menu;

use App\Models\Menu;
use Exception;
use Illuminate\Support\Str;

class MenuService {
    public function create($request){
        
        try{
            Menu::create([
                'name' => (string)$request->input('name'),
                'parent_id' => (int)$request->input('parent_id'),
                'description' => (string)$request->input('description'),
                'content' => (string)$request->input('content'),
                
            ]);

            return redirect()->back()->with('success', 'Thêm thành công');

        } catch(\Exception $err){
            return redirect()->back()->with('error', 'Thêm thất bại');
            return false;
        }

        return true;
    }

    public function getParent() {
        return Menu::where('parent_id',0)->get();
    }

    public function getAll(){
        return Menu::orderbyDesc('id')->paginate(10);
    }

    public function delete($request){
        $id = (int)$request->input('id');

        $menu = Menu::where('id', $id)->first();

        if($menu){
            return Menu::where('id',$id)->orwhere('parent_id',$id)->delete();
        }
    }

    public function update($request,$data){
        
        if($request->input('parent_id') != $data->parent_id){

            $data->parent_id = (int)$request->input('parent_id');
        }
            $data->name = (string)$request->input('name');
            $data->description = (string)$request->input('description');
            $data->content = (string)$request->input('content');

            $data->save();

            return redirect()->back()->with('success','Sửa thành công');
            return true;
    }
}