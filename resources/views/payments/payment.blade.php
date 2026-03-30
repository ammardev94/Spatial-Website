@extends('default')

@section('css')
<style>
    .input-wrapper .country-select {
        width: 100%;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/country-select-js/2.0.1/css/countrySelect.min.css">
@endsection


@section('content')
<main id="pay-now">
    <div id="subheader">
        <div class="container">
            <div class="row align-items-center">
                <p class="text-uppercase">Home / Pay Now</p>
                <h2>Pay Now</h2>
            </div>
        </div>
    </div>
    <div class="pay-now-form-sec">
        <div id="subscribe-sec" class="sec-padding">
            <div class="container">
                <div class="sub-wrapper p-4 p-md-5">
                    <div class="row align-items-center form-main-row">
                        <div class="col-lg-6">
                            <div class="imgbox">
                                <img class="fit-img" src="{{ asset('frontend/images/pay-now-img.jpg') }}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="row">
                                <h3 class="text-center">
                                    Enter Your Payment Details
                                </h3>
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <strong>There were some issues:</strong>
                                    <ul class="mt-2 mb-0">
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                <form id="payNowForm" class=" mt-lg-4 mt-3" action="{{ route('hyperpay.create') }}" method="POST" novalidate>
                                    @csrf
                                    <input type="hidden" name="merchantTransactionId" id="merchantTransactionId" value="{{ old('merchantTransactionId') }}">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <div class="input-wrapper">
                                                <input
                                                    type="text"
                                                    name="givenName"
                                                    placeholder="First Name*"
                                                    class="form-control @error('givenName') is-invalid @enderror"
                                                    maxlength="100"
                                                    value="{{ old('givenName', '') }}"
                                                    required>
                                                @error('givenName')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-wrapper">
                                                <input
                                                    type="text"
                                                    name="surname"
                                                    placeholder="Last Name*"
                                                    class="form-control @error('surname') is-invalid @enderror"
                                                    maxlength="100"
                                                    value="{{ old('surname', '') }}"
                                                    required>
                                                @error('surname')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-wrapper">
                                                <input
                                                    type="email"
                                                    name="email"
                                                    placeholder="Email*"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    maxlength="255"
                                                    value="{{ old('email', '') }}"
                                                    required>
                                                @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-wrapper">
                                                <input
                                                    type="text"
                                                    name="street1"
                                                    placeholder="Street Address*"
                                                    class="form-control @error('street1') is-invalid @enderror"
                                                    maxlength="100"
                                                    value="{{ old('street1', '') }}"
                                                    required>
                                                @error('street1')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-wrapper">
                                                <input
                                                    type="text"
                                                    name="city"
                                                    placeholder="City*"
                                                    class="form-control @error('city') is-invalid @enderror"
                                                    maxlength="255"
                                                    value="{{ old('city', '') }}"
                                                    required>
                                                @error('city')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-wrapper">
                                                <input
                                                    type="text"
                                                    name="state"
                                                    placeholder="State"
                                                    class="form-control @error('state') is-invalid @enderror"
                                                    maxlength="50"
                                                    value="{{ old('state', '') }}">
                                                @error('state')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-wrapper">
                                                <input
                                                    type="text"
                                                    name="postcode"
                                                    placeholder="Post Code*"
                                                    class="form-control @error('postcode') is-invalid @enderror"
                                                    maxlength="16"
                                                    value="{{ old('postcode', '') }}"
                                                    required>
                                                @error('postcode')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="input-wrapper">
                                                <input name="country" id="country" class="form-control" type="text" placeholder="Country">
                                                <input type="hidden" id="country_code" name="country_code">
                                                @error('country')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="input-wrapper">
                                                <input
                                                    type="number"
                                                    id="amount"
                                                    name="amount"
                                                    placeholder="Amount (AED)*"
                                                    class="form-control @error('amount') is-invalid @enderror"
                                                    min="1"
                                                    value="{{ old('amount', '') }}"
                                                    max="20000"
                                                    step="0.01"
                                                    required>
                                                @error('amount')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="input-wrapper">
                                                <textarea
                                                    id="notes"
                                                    name="notes"
                                                    placeholder="Notes"
                                                    class="form-control @error('notes') is-invalid @enderror" >{{ old('notes', '') }}</textarea>
                                                @error('notes')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12 text-center mt-5">
                                            <button type="submit" class="butn btn-arrow-primary">
                                                <span>Submit
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="11"
                                                        viewBox="0 0 21 11" fill="none">
                                                        <path
                                                            d="M0.713471 4.42178L0.713472 5.84873L17.7215 5.84873L14.3869 9.18334L15.3989 10.1954L20.459 5.13525L15.3989 0.0751371L14.3869 1.08716L17.7215 4.42177L0.713471 4.42178Z"
                                                            fill="#1E1E1E" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/country-select-js/2.0.1/js/countrySelect.min.js"></script>
<script>
    $(document).ready(function() {
        var $txnInput = $("#merchantTransactionId");
        if (!$txnInput.val()) {
            $txnInput.val("TXN-" + Date.now() + "-" + Math.floor(Math.random() * 9000));
        }
    });

    $("#country").countrySelect({
        defaultCountry: "ae"
    });

    $("#country").on("change", function() {
        var data = $("#country").countrySelect("getSelectedCountryData");
        $("#country_code").val(data.iso2); // country code here
    });
</script>
@endsection