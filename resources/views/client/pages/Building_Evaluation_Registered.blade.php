<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Building Evaluation Registered</title>
</head>
<body>
    <h1>Building Evaluation Registered</h1>

    @foreach($emailData as $key => $value)
        <p><strong>{{ ucfirst(str_replace('_', ' ', $key)) }}:</strong> {{ $value }}</p>
    @endforeach

</body>
</html>