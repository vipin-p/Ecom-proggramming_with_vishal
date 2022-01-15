@extends('admin_section.layout')
@section('content')
<a href="{{ url('admin/category') }}" class="btn btn-danger">Back</a>
<div class="card-body">
    <div class="card-title">
        <h3 class="text-center title-2">Pay Invoice</h3>
    </div>
    <hr>
    <form action="" method="post" novalidate="novalidate">
        <div class="form-group">
            <label for="cc-payment" class="control-label mb-1">Payment amount</label>
            <input id="cc-pament" name="cc-payment" type="text" class="form-control" aria-required="true" aria-invalid="false" value="100.00">
        </div>
        <div class="form-group has-success">
            <label for="cc-name" class="control-label mb-1">Name on card</label>
            <input id="cc-name" name="cc-name" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card" autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
            <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
        </div>
        <div class="form-group">
            <label for="cc-number" class="control-label mb-1">Card number</label>
            <input id="cc-number" name="cc-number" type="tel" class="form-control cc-number identified visa" value="" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
            <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
        </div>
        <div>
            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                <span id="payment-button-amount">Submit</span>
            </button>
        </div>
    </form>
</div>
@endsection