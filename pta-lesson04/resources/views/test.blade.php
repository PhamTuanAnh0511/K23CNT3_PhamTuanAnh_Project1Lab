<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test - View Component</title>
</head>
<body>
<div>    
    <h1> This is Header Component </h1>
    <h3> Fruits are: </h3>
    <ul>
        @foreach ($fruits as $item)
            <li>{{ $item }}</li>
        @endforeach
    </ul>
</div>
</body>
</html>