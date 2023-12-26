@extends('admin/main')

@section('content')
<form method="POST" action="">
    <div class="card-body">
      <div class="form-group">
        <label for="">Tên danh mục</label>
        <input type="text"  name="name" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên">
      </div>

      <div class="form-group">
        <label for="">Danh mục</label>
        <select name="parent_id" id="" class="form-control">
            <option value="0">Danh mục cha</option>   
            @foreach ($menus as $menu)
            <option value="{{$menu->id}}">{{$menu->name}}</option>
            @endforeach
        </select>
      </div>

      <div class="form-group">
        <label for="">Mô tả</label>
         <textarea name="description" id="" class="form-control"></textarea>
      </div>

      <div class="form-group">
        <label for="">Nội dung</label>
         <textarea name="content" id="" class="form-control"></textarea>
      </div>

      
    </div>


    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </div>
    @csrf
  </form>
@endsection