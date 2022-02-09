@extends('admin_section.layout')
@section('pagetitle','Categories')
@section('category_active','active')


@section('content')
<div class="col">
    <div class="table-responsive table--no-card m-b-30">
        <div class="alert-success">
            {{ session('messge') }}

        </div>
        <h1>@section('pagetitle','Categories')</h1><br><br>
        <a href="{{ url('admin/category/manage_category') }}" class="btn btn-success text-white">Add Categories</a><br><br>
        <table class="table table-borderless table-striped table-earnin g">
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
                    <td><a href="{{ url('admin/category/manage_category') }}/{{ $items->id }}" class="btn btn-success">UPDATE</a></td>
                    @if ($items->status == 1)
                    <td><a href="{{ url('admin/category/status/0') }}/{{ $items->id }}" class=" btn btn-primary">Active</a></td>
                        
                    @elseif ($items->status == 0)
                    <td><a href="{{ url('admin/category/status/1') }}/{{ $items->id }}" class=" btn btn-warning">Deactive</a></td>
                        
                    @endif
                    <td><a href="{{ url('admin/category/delete') }}/{{ $items->id }}" class=" btn btn-danger">DELETE</a></td>
                    
                    
                </tr>
                @endforeach
               
                
            </tbody>
        </table>
    </div>
</div>
@endsection