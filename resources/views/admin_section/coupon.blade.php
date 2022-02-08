@extends('admin_section.layout')
@section('pagetitle','Coupons')

@section('content')
<div class="col">
    <div class="table-responsive table--no-card m-b-30">
        <div class="alert-success">
            {{ session('messge') }}

        </div>
        <a href="{{ url('admin/Coupon/manage_coupon') }}" class="btn btn-success text-white">Add Coupons</a><br><br>
        <table class="table table-borderless table-striped table-earnin g">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Code</th>
                    <th>value</th>
                    <th>Actions</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $items )
                <tr>
                    <td>{{ $items->id }}</td>
                    <td>{{ $items->title }}</td>
                    <td>{{ $items->code }}</td>
                    <td>{{ $items->value    }}</td>
                    <td><a href="{{ url('admin/coupon/delete') }}/{{ $items->id }}" class=" btn btn-danger">DELETE</a></td>
                    <td><a href="{{ url('admin/Coupon/manage_coupon') }}/{{ $items->id }}" class="btn btn-success">UPDATE</a></td>
                    
                </tr>
                @endforeach
               
                
            </tbody>
        </table>
    </div>
</div>
@endsection