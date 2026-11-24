<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New ROI Calculator Submission</title>
</head>
<body style="font-family: Arial, sans-serif; background:#f6f6f6; padding:20px;">
    <div style="max-width:650px; margin:auto; background:#ffffff; padding:25px; border-radius:8px;">
        <h2 style="margin-top:0;">New ROI Calculator Submission</h2>

        <table width="100%" cellpadding="10" cellspacing="0" border="1" style="border-collapse:collapse;">
            <tr>
                <td><strong>Full Name</strong></td>
                <td>{{ $full_name }}</td>
            </tr>
            <tr>
                <td><strong>Email</strong></td>
                <td>{{ $email }}</td>
            </tr>
            <tr>
                <td><strong>Property Address</strong></td>
                <td>{{ $purchase_price }}</td>
            </tr>
            <tr>
                <td><strong>Built Up Area Size</strong></td>
                <td>{{ $target_sale_price }}</td>
            </tr>
            <tr>
                <td><strong>Plot Size</strong></td>
                <td>{{ $plot_size }}</td>
            </tr>
            <tr>
                <td><strong>Renovation Budget</strong></td>
                <td>{{ $renovation_budget }}</td>
            </tr>
            <tr>
                <td><strong>Timeline</strong></td>
                <td>{{ $timeline }}</td>
            </tr>
        </table>
    </div>
</body>
</html>