<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Payment Receipt</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 14px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        h2 { margin-bottom: 10px; }
    </style>
</head>
<body>

<h2>Payment Receipt</h2>

<table>
    <tr><th>Transaction ID</th><td>{{ $data['id'] }}</td></tr>
    <tr><th>Amount</th><td>{{ $data['amount'] }} {{ $data['currency'] }}</td></tr>
    <tr><th>Status</th><td>{{ $data['result']['description'] ?? '' }}</td></tr>
</table>

<h3>Customer Info</h3>
<table>
    <tr><th>Name</th><td>{{ $data['customer']['givenName'] ?? '' }} {{ $data['customer']['surname'] ?? '' }}</td></tr>
    <tr><th>Email</th><td>{{ $data['customer']['email'] ?? '' }}</td></tr>
    <tr><th>IP Address</th><td>{{ $data['customer']['ip'] ?? '' }}</td></tr>
</table>

<h3>Billing Info</h3>
<table>
    <tr><th>Street</th><td>{{ $data['billing']['street1'] ?? '' }}</td></tr>
    <tr><th>City</th><td>{{ $data['billing']['city'] ?? '' }}</td></tr>
    <tr><th>State</th><td>{{ $data['billing']['state'] ?? '' }}</td></tr>
    <tr><th>Postcode</th><td>{{ $data['billing']['postcode'] ?? '' }}</td></tr>
    <tr><th>Country</th><td>{{ $data['billing']['country'] ?? '' }}</td></tr>
</table>

</body>
</html>
