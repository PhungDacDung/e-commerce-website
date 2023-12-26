@extends('admin/main')

@section('content')
<form method="POST" action="" enctype="multipart/form-data">
    <div class="card-body">

      <div class="row">
        <div class="form-group col">
          <label for="">Tên sản phẩm</label>
          <input type="text"  name="name" class="form-control" id="exampleInputEmail1" value="{{old('name')}}"  placeholder="Nhập tên sản phẩm">
        </div>
  
        <div class="form-group col">
          <label for="">Danh mục</label>
          <select name="parent_id" id="" class="form-control">
              <option value="0">Danh mục cha</option>   
              @foreach ($menus as $menu)
              <option value="{{$menu->id}}">{{$menu->name}}</option>
              @endforeach
              {{-- <input type="hidden" name="menu_id" id="" value="{{$menu->id}}"> --}}
          </select>
          
        </div>
      </div>

     
      <div class="form-group row">
        <div class="formg-roup col">
          <label for="">Giá sản phẩm</label>
          <input type="number"  name="price" class="form-control" id="" value="{{old('price')}}" placeholder="Nhập giá sản phẩm">
        </div>
        <div class="form-group col">
          <label for="">Giá sale</label>
          <input type="number"  name="price_sale" class="form-control" id="" value="{{old('priceSale')}}" placeholder="Nhập giá sale">
        </div>
      </div>

      


      <div class="form-group">
        <label for="">Mô tả sản phẩm</label>
         <textarea name="description" id="" value="{{old('description')}}" class="form-control"></textarea>
      </div>

      <div class="form-group">
        <label for="">Nội dung chi tiết</label>
         <textarea name="content" id="" value="{{old('content')}}" class="form-control"></textarea>
      </div>



      <div class="form-group">
            <label class="form-label" for="customFile">Ảnh sản phẩm</label>
            <input type="file" accept="image/*" name="thumb" class="form-control" id="upload" />
      </div>
    </div>


    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </div>
    @csrf
  </form>


@endsection


