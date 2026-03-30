<!DOCTYPE html>
<html>
<head>
    <title>Make Payment</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet" />

    <style>
        .hidden { display: none; }
        .step { margin-top: 40px; }
    </style>
</head>
<body>

<div class="container mt-5">

    <h2 class="mb-4 text-center">HyperPay Test Payment</h2>

    {{-- SHOW ALL ERRORS --}}
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


    <form id="hyperpayForm" action="{{ route('hyperpay.create') }}" method="POST" novalidate>
        @csrf

        <input type="hidden" name="merchantTransactionId" id="merchantTransactionId" value="{{ old('merchantTransactionId') }}">

        <div class="row">
            <!-- Given Name -->
            <div class="col-md-6 mb-3">
                <label class="form-label">First Name</label>
                <input 
                    type="text" 
                    name="givenName" 
                    class="form-control @error('givenName') is-invalid @enderror" 
                    maxlength="100"
                    value="{{ old('givenName', 'John') }}" 
                    required>
                @error('givenName')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Surname -->
            <div class="col-md-6 mb-3">
                <label class="form-label">Last Name</label>
                <input 
                    type="text" 
                    name="surname" 
                    class="form-control @error('surname') is-invalid @enderror" 
                    maxlength="100"
                    value="{{ old('surname', 'Doe') }}" 
                    required>
                @error('surname')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input 
                type="email" 
                name="email" 
                class="form-control @error('email') is-invalid @enderror" 
                value="{{ old('email', 'user@example.com') }}" 
                maxlength="255"
                required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Street Address -->
        <div class="mb-3">
            <label class="form-label">Street Address</label>
            <input 
                type="text" 
                name="street1" 
                class="form-control @error('street1') is-invalid @enderror" 
                value="{{ old('street1', 'Street 123') }}" 
                maxlength="100"
                required>
            @error('street1')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="row">
            <!-- City -->
            <div class="col-md-4 mb-3">
                <label class="form-label">City</label>
                <input 
                    type="text" 
                    name="city" 
                    class="form-control @error('city') is-invalid @enderror" 
                    value="{{ old('city', 'Dubai') }}" 
                    maxlength="255"
                    required>
                @error('city')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- State -->
            <div class="col-md-4 mb-3">
                <label class="form-label">State</label>
                <input 
                    type="text" 
                    name="state" 
                    class="form-control @error('state') is-invalid @enderror" 
                    value="{{ old('state', 'Dubai') }}" 
                    maxlength="50"
                    required>
                @error('state')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Postcode -->
            <div class="col-md-4 mb-3">
                <label class="form-label">Postcode</label>
                <input 
                    type="text" 
                    name="postcode" 
                    class="form-control @error('postcode') is-invalid @enderror" 
                    value="{{ old('postcode', '00000') }}" 
                    maxlength="16"
                    required>
                @error('postcode')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Country -->
        <div class="mb-3">
            <label class="form-label">Country</label>
            <select 
                name="country" 
                id="country" 
                class="form-select @error('country') is-invalid @enderror" 
                required>
                <option value="">Select Country</option>
                <option value="AE" {{ old('country', 'AE') == 'AE' ? 'selected' : '' }}>United Arab Emirates</option>
                <option value="SA" {{ old('country') == 'SA' ? 'selected' : '' }}>Saudi Arabia</option>
                <option value="US" {{ old('country') == 'US' ? 'selected' : '' }}>United States</option>
                <option value="PK" {{ old('country') == 'PK' ? 'selected' : '' }}>Pakistan</option>
                <option value="GB" {{ old('country') == 'GB' ? 'selected' : '' }}>United Kingdom</option>
                <option value="IN" {{ old('country') == 'IN' ? 'selected' : '' }}>India</option>
            </select>
            @error('country')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Amount -->
        <div class="mb-3">
            <label class="form-label">Amount (AED)</label>
            <input 
                type="number" 
                name="amount" 
                class="form-control @error('amount') is-invalid @enderror" 
                value="{{ old('amount', 100) }}" 
                min="1" 
                max="20000" 
                step="0.01"
                required>
            @error('amount')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary w-100">Pay Now</button>
    </form>
</div>

<script>
document.addEventListener("DOMContentLoaded", () => {
    // Auto-generate merchantTransactionId if empty
    let txnInput = document.getElementById("merchantTransactionId");
    if (!txnInput.value) {
        txnInput.value = "TXN-" + Date.now() + "-" + Math.floor(Math.random() * 9000);
    }
});
</script>

</body>
</html>
