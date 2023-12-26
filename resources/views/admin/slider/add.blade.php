@extends('admin/main')

@section('content')
<form method="POST" action="" enctype="multipart/form-data">
    <div class="card-body">

      <div class="row">
        <div class="form-group col">
          <label for="">Tiêu đề</label>
          <input type="text"  name="name" class="form-control" id="exampleInputEmail1" value="{{old('name')}}"  placeholder="">
        </div>
  
        <div class="form-group col">
          <label for="">URL</label>
          <input type="text"  name="url" class="form-control"  value="{{old('name')}}"  placeholder="">
          
        </div>
      </div>

     
      <div class="form-group row">
        <div class="formg-roup col">
          <label for="">Sắp xếp</label>
          <input type="number"  name="sort_by" class="form-control" id="" value="{{old('price')}}" placeholder="">
        </div>
        
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


