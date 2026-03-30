<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Status</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 40px;
        }
        .card-success {
            border-left: 5px solid #198754;
        }
        .card-failed {
            border-left: 5px solid #dc3545;
        }
        .card-header {
            font-weight: bold;
        }
        .table td {
            vertical-align: middle;
        }
    </style>
</head>
<body>

<div class="container">

    @php
        $statusCode = $response['result']['code'] ?? '';
        $success = str_starts_with($statusCode, '000') || str_starts_with($statusCode, '000.');
        $statusClass = $success ? 'card-success' : 'card-failed';
        $statusText = $response['result']['description'] ?? 'Unknown';
    @endphp

    <div class="card {{ $statusClass }} mb-4 shadow-sm">
        <div class="card-header">
            Payment Status: {{ $success ? 'Success' : 'Failed' }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Transaction Details</h5>
            <table class="table table-bordered">
                <tr>
                    <td><strong>Transaction ID</strong></td>
                    <td>{{ $response['id'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td><strong>Merchant Transaction ID</strong></td>
                    <td>{{ $response['merchantTransactionId'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td><strong>Payment Type</strong></td>
                    <td>{{ $response['paymentType'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td><strong>Payment Brand</strong></td>
                    <td>{{ $response['paymentBrand'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td><strong>Amount</strong></td>
                    <td>{{ $response['amount'] ?? '0.00' }} {{ $response['currency'] ?? '' }}</td>
                </tr>
                <tr>
                    <td><strong>Status Description</strong></td>
                    <td>{{ $statusText }}</td>
                </tr>
                <tr>
                    <td><strong>Extended Description</strong></td>
                    <td>{{ $response['resultDetails']['ExtendedDescription'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td><strong>Clearing Institute</strong></td>
                    <td>{{ $response['resultDetails']['clearingInstituteName'] ?? '-' }}</td>
                </tr>
            </table>

            <h5 class="mt-4">Customer Info</h5>
            <table class="table table-bordered">
                <tr>
                    <td><strong>Name</strong></td>
                    <td>{{ ($response['customer']['givenName'] ?? '-') . ' ' . ($response['customer']['surname'] ?? '-') }}</td>
                </tr>
                <tr>
                    <td><strong>Email</strong></td>
                    <td>{{ $response['customer']['email'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td><strong>IP Address</strong></td>
                    <td>{{ $response['customer']['ip'] ?? '-' }}</td>
                </tr>
            </table>

            <h5 class="mt-4">Billing Info</h5>
            <table class="table table-bordered">
                <tr>
                    <td><strong>Street</strong></td>
                    <td>{{ $response['billing']['street1'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td><strong>City</strong></td>
                    <td>{{ $response['billing']['city'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td><strong>State</strong></td>
                    <td>{{ $response['billing']['state'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td><strong>Postcode</strong></td>
                    <td>{{ $response['billing']['postcode'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td><strong>Country</strong></td>
                    <td>{{ $response['billing']['country'] ?? '-' }}</td>
                </tr>
            </table>

            <h5 class="mt-4">Card Info</h5>
            <table class="table table-bordered">
                <tr>
                    <td><strong>Card Holder</strong></td>
                    <td>{{ $response['card']['holder'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td><strong>Card Type</strong></td>
                    <td>{{ $response['card']['type'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td><strong>Card Brand</strong></td>
                    <td>{{ $response['paymentBrand'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td><strong>Card Last 4 Digits</strong></td>
                    <td>{{ $response['card']['last4Digits'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td><strong>Issuer</strong></td>
                    <td>{{ $response['card']['issuer']['bank'] ?? '-' }} | Website: <a href="{{ $response['card']['issuer']['website'] ?? '#' }}" target="_blank">{{ $response['card']['issuer']['website'] ?? '-' }}</a> | Phone: {{ $response['card']['issuer']['phone'] ?? '-' }}</td>
                </tr>
            </table>

            <h5 class="mt-4">3D Secure Info</h5>
            <table class="table table-bordered">
                <tr>
                    <td><strong>Authentication Status</strong></td>
                    <td>{{ $response['threeDSecure']['authenticationStatus'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td><strong>Flow</strong></td>
                    <td>{{ $response['threeDSecure']['flow'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td><strong>Version</strong></td>
                    <td>{{ $response['threeDSecure']['version'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td><strong>DS Transaction ID</strong></td>
                    <td>{{ $response['threeDSecure']['dsTransactionId'] ?? '-' }}</td>
                </tr>
            </table>

            <div class="mt-4">
                <a href="{{ url('/') }}" class="btn btn-secondary">Back to Home</a>
            </div>
        </div>
    </div>
</div>

</body>
</html>
