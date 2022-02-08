@extends('admin_section.layout')
@section('pagetitle','Manage Coupon')

@section('content')
<a href="{{ url('admin/Coupon') }}" class="btn btn-danger">Back</a> <br><br>
<div class="card-body">
    <div class="card-title">
        <h1 class="text-center title-2">Manage coupon</h1>
    </div>
    <hr>
    <form action="{{ route('coupon.manage_coupon_process') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="cc-payment" class="control-label mb-1">Title</label>
            <input value="{{ $title }}" name="title" type="text" class="form-control" aria-required="true" aria-invalid="false">
            <div class="alert-danger">
                @error('title')
                {{ $message }}
            @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="cc-payment" class="control-label mb-1">Code</label>
            <input value="{{ $code }}" name="code" type="text" class="form-control" aria-required="true" aria-invalid="false">
            <div class="alert-danger">
                @error('code')
                {{ $message }}
            @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="cc-payment" class="control-label mb-1">Value</label>
            <input value="{{$value }}" name="value" type="text" class="form-control" aria-required="true" aria-invalid="false">
            <div class="alert-danger">
                @error('value')
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