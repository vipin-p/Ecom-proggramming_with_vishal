@extends('admin_section.layout')
@section('pagetitle','size')
@section('size_active','active')


@section('content')
<div class="col">
    <div class="table-responsive table--no-card m-b-30">
        <div class="alert-success">
            {{ session('messge') }}

        </div>
        <h1>@section('pagetitle','Categories')</h1><br><br>
        <a href="{{ url('admin/size/manage_size') }}" class="btn btn-success text-white">Add Size</a><br><br>
        <table class="table table-borderless table-striped table-earnin g">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Size</th>
                    <th>status</th>
                    <th></th>
                    <th>Actions</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $items )
                <tr>
                    <td>{{ $items->id }}</td>
                    <td>{{ $items->size }}</td>
                    <td><a href="{{ url('admin/size/manage_size') }}/{{ $items->id }}" class="btn btn-success">UPDATE</a></td>
                    @if ($items->status == 1)
                    <td><a href="{{ url('admin/size/status/0') }}/{{ $items->id }}" class=" btn btn-primary">Active</a></td>
                        
                    @elseif ($items->status == 0)
                    <td><a href="{{ url('admin/size/status/1') }}/{{ $items->id }}" class=" btn btn-warning">Deactive</a></td>
                        
                    @endif
                    <td><a href="{{ url('admin/size/delete') }}/{{ $items->id }}" class=" btn btn-danger">DELETE</a></td>
                    
                    
                </tr>
                @endforeach
               
                
            </tbody>
        </table>
    </div>
</div>
@endsection