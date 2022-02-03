@extends('admin_section.layout')
@section('content')
<div class="col">
    <div class="table-responsive table--no-card m-b-30">
        <div class="alert-success">
            {{ session('messge') }}

        </div>
        <h1>Categories page</h1><br><br>
        <a href="{{ url('admin/category/manage_category') }}" class="btn btn-success text-white">Add Categories</a><br><br>
        <table class="table table-borderless table-striped table-earning">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Categoty Name</th>
                    <th>Category Slug</th>
                    <th></th>
                    <th>Actions</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $items )
                <tr>
                    <td>{{ $items->id }}</td>
                    <td>{{ $items->categoty_name }}</td>
                    <td>{{ $items->category_slug }}</td>
                    <td><a href="{{ url('admin/category/delete') }}/{{ $items->id }}" class=" btn btn-danger">DELETE</a></td>
                    <td><a href="{{ url('admin/category/manage_category') }}/{{ $items->id }}" class="btn btn-success">UPDATE</a></td>
                    
                </tr>
                @endforeach
               
                
            </tbody>
        </table>
    </div>
</div>
@endsection