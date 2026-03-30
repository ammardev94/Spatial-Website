<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Payment Receipt</title>
</head>
<body>
<h2>Thank You for Your Payment</h2>
<p>Dear {{ ($response['customer']['givenName'] ?? '') . ' ' . ($response['customer']['surname'] ?? '') }},</p>

<table border="1" cellpadding="8" cellspacing="0">
    <tr><td>Transaction ID</td><td>{{ $response['id'] }}</td></tr>
    <tr><td>Amount</td><td>{{ $response['amount'] }} {{ $response['currency'] }}</td></tr>
    <tr><td>Status</td><td>{{ $response['result']['description'] ?? '' }}</td></tr>
</table>

<p>Your receipt is attached as a PDF.</p>
<p>Thanks,<br>{{ config('app.name') }}</p>
</body>
</html>
