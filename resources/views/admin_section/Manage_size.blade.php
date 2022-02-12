@extends('admin_section.layout')
@section('pagetitle','Manage Size')
@section('size_active','active')


@section('content')
<a href="{{ url('admin/size') }}" class="btn btn-danger">Back</a> <br><br>
<div class="card-body">
    <div class="card-title">
        <h1 class="text-center title-2">Manage size</h1>
    </div>
    <hr>
    <form action="{{ route('size.manage_size_process') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="cc-payment" class="control-label mb-1">Size</label>
            <input value="{{ $size }}" name="size" type="text" class="form-control" aria-required="true" aria-invalid="false">
            <div class="alert-danger">
                @error('size')
                {{ $message }}
            @enderror
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