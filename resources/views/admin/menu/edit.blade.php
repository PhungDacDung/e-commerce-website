@extends('admin/main')

@section('content')

<form method="POST" action="">
    
    <div class="card-body">
      <div class="form-group">
        <label for="">Tên danh mục</label>
        <input type="text"  name="name" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên" value="{{$menu->name}}">
      </div>

      <div class="form-group">
        <label for="">Danh mục</label>
        <select name="parent_id" id="" class="form-control" value="{{$menu->name}}">
            <option value="0" {{$menu->parent_id == 0 ? 'selected' :''}}>Danh mục cha</option>   
            @foreach ($menus as $menuParent)
            <option value="{{$menuParent->id}}"
                 {{$menu->parent_id == $menuParent->id ? 'selected' :''}}>
                 {{$menuParent->name}}</option>
            @endforeach
        </select>
      </div>

      <div class="form-group">
        <label for="">Mô tả</label>
         <textarea name="description" id="" class="form-control" value="" > {{$menu->description}}</textarea>
      </div>

      <div class="form-group">
        <label for="">Nội dung</label>
         <textarea name="content" id="" class="form-control" value=""> {{$menu->content}}</textarea>
      </div>

    </div>


    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </div>
  
    @csrf
  </form>

  @endsection