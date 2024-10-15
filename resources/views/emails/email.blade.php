<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form Submission</title>
</head>
<body>
    <h1>New Contact Form Submission</h1>
    <p><strong>Name:</strong> {{ $formData['clientname'] }}</p>
    <p><strong>Email:</strong> {{ $formData['clientemail'] }}</p>
    <p><strong>Message:</strong> {{ $formData['clientmessage'] }}</p>
</body>
</html>
