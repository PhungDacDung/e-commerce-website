<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateFormRequest;
use App\Http\Services\Menu\MenuService;
use \Illuminate\Http\JsonResponse;
use App\Models\Menu;

class MenuController extends Controller
{
    protected $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function create(){
        return view('admin/menu/add',[
            'title' => 'Thêm mới',
            'menus' => $this->menuService->getParent()
        ]);
    }

    public function store(CreateFormRequest $request){

        $this->menuService->create($request);

        return redirect()->back();
    }

    public function list(){
        return view('admin/menu/list',[
            'title' => 'Danh sách sản phẩm',
            'products' => $this->menuService->getAll()
        ]);
    }

    public function delete(Request $request) : JsonResponse{ 
       $result = $this->menuService->delete($request);

       if($result){
            return response()->json([
                'error' =>false,
                'message' => 'Xóa thành công'
            ]);
       }
       return response()->json([
        'error' => true,
    ]);
    }

    public function edit(Menu $id){
        return view('admin/menu/edit',[
            'title' => 'Sửa thông tin',
            'menu' => $id,
            'menus' => $this->menuService->getParent()
        ]);
    }

    public function update(Menu $data, CreateFormRequest $request){
         $this->menuService->update($request,$data);
         
         return redirect('/admin/menu/list');
    }
}
