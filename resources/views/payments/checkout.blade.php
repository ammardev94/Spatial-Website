<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HyperPay Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }
        .checkout-card {
            max-width: 500px;
            width: 100%;
            padding: 30px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            text-align: center;
        }
        .loader {
            border: 6px solid #f3f3f3;
            border-top: 6px solid #0d6efd;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            margin: 20px auto;
            animation: spin 1s linear infinite;
        }
        @keyframes spin {
            0% { transform: rotate(0deg);}
            100% { transform: rotate(360deg);}
        }
        .payment-heading {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 15px;
        }
        .payment-subheading {
            font-size: 1rem;
            margin-bottom: 25px;
            color: #555;
        }
    </style>
</head>
<body>

<div class="checkout-card">
    <img src="https://prescott.ae/frontend/images/logo2.svg" style="margin-bottom: 5%;max-width: 351px;">
    <div class="payment-heading">Prescott Secure Payment</div>
    <div class="payment-subheading">Please enter your card details below to complete the transaction.</div>

    <div class="loader" id="loader"></div>

    <form id="paymentForm" action="{{ route('hyperpay.status') }}" class="paymentWidgets" data-brands="VISA MASTER" style="display:none;"></form>
</div>

<script src="{{ config('hyperpay.base_url') }}/paymentWidgets.js?checkoutId={{ $checkoutId }}"></script>
<script type="text/javascript">
    var wpwlOptions = {
        paymentTarget: "_top",
        onReady: function() {
            document.getElementById('loader').style.display = 'none';
            document.getElementById('paymentForm').style.display = 'block';
        }
    };
</script>

</body>
</html>
