@extends('admin/main')
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên danh mục</th>
                <th>Mô tả</th>
                <th>Nội dung chi tiết</th>
                <th>Update</th>
                <th>&nbsp;</th>
            </tr>
            
        </thead>
        <tbody>
            {!! \App\Helpers\Helper::menu($products) !!}
        </tbody>
    </table>
@endsection