<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Contact Form Submission</title>
</head>
<body style="font-family: Arial, sans-serif; background:#f6f6f6; padding:20px;">
    <div style="max-width:650px; margin:auto; background:#ffffff; padding:25px; border-radius:8px;">
        <h2 style="margin-top:0;">New Contact Form Submission</h2>

        <table width="100%" cellpadding="10" cellspacing="0" border="1" style="border-collapse:collapse;">
            <tr>
                <td><strong>First Name</strong></td>
                <td>{{ $first_name }}</td>
            </tr>
            <tr>
                <td><strong>Last Name</strong></td>
                <td>{{ $last_name }}</td>
            </tr>
            <tr>
                <td><strong>Email</strong></td>
                <td>{{ $email }}</td>
            </tr>
            <tr>
                <td><strong>Phone</strong></td>
                <td>{{ $phone }}</td>
            </tr>
            <tr>
                <td><strong>Service</strong></td>
                <td>{{ $service ?? 'Not selected' }}</td>
            </tr>
            <tr>
                <td><strong>Budget</strong></td>
                <td>{{ $budget ?? 'Not selected' }}</td>
            </tr>
            <tr>
                <td><strong>Comments</strong></td>
                <td>{{ $comments ?? 'No comments' }}</td>
            </tr>
        </table>
    </div>
</body>
</html>