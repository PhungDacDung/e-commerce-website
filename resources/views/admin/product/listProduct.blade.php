@extends('admin/main')
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Giá sản phẩm</th>
                <th>Giá sale</th>
                <th>Mô tả</th>
                <th>Nội dung chi tiết</th>
                <th>Update</th>
                <th>&nbsp;</th>
            </tr>
            
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->price_sale}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->content}}</td>
                <td>{{$product->updated_at}}</td>
                <td>
                     <a href="/admin/product/edit/{{$product->id}}" class ="text-warning p-4"> 
                            <i class="fas fa-edit"></i>
                     </a>
                     
                     <a href="" class ="text-danger" onclick="removeRow({{$product->id}},'/admin/product/delete')"> 
                            <i class="fas fa-trash"></i>
                     </a>   
                </td>
            </tr>  
            @endforeach
            
        </tbody>
    </table>

    
    {{-- <nav aria-label="...">
        <ul class="pagination">
          <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1">Previous</a>
          </li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item active">
            <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
          </li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#">Next</a>
          </li>
        </ul>
    </nav> --}}
    {!! $products->links()  !!}
@endsection