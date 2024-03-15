<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Registration Fresh</title>
</head>
<body>
    <h1>College Registration Fresh</h1>

    @foreach($emailData as $key => $value)
        @if(is_array($value) && $key === 'labs')
            <p><strong>{{ ucfirst(str_replace('_', ' ', $key)) }}:</strong></p>
            <ul>
                @foreach($value as $lab)
                    <li>{{ $lab }}</li>
                @endforeach
            </ul>
        @else
            <p><strong>{{ ucfirst(str_replace('_', ' ', $key)) }}:</strong> {{ $value }}</p>
        @endif
    @endforeach

</body>
</html>
