@extends('admin_section.layout')
@section('pagetitle','Manage Category')
@section('category_active','active')


@section('content')
<a href="{{ url('admin/category') }}" class="btn btn-danger">Back</a> <br><br>
<div class="card-body">
    <div class="card-title">
        <h1 class="text-center title-2">Manage Category</h1>
    </div>
    <hr>
    <form action="{{ route('category.manage_category_process') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="cc-payment" class="control-label mb-1">Category Name</label>
            <input value="{{ $categoty_name }}" name="category_name" type="text" class="form-control" aria-required="true" aria-invalid="false">
            <div class="alert-danger">
                @error('category_name')
                {{ $message }}
            @enderror
            </div>
        </div><div class="form-group">
            <label for="cc-payment" class="control-label mb-1">Category Slug</label>
            <input value="{{$category_slug }}" name="category_slug" type="text" class="form-control" aria-required="true" aria-invalid="false">
            <div class="alert-danger">
                @error('category_slug')
                {{ $message }}
            @enderror
            <input type="hidden" value="{{ $id }}" name="id" id="">
            </div>
           
        </div>
       
       
        <div>
            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                <span id="payment-button-amount">Submit</span>
            </button>
        </div>
    </form>
</div>
@endsection