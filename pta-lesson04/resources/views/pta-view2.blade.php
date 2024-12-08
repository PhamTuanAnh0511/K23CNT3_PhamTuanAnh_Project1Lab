<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>#If Statements</title>
</head>
<body>
    <h1>#If Statements</h1>
    <hr>
    @verbatim
        <pre>
            @if (count($arr) === 1)
                I have one element!
            @elseif (count($arr) > 1)
                I have multiple element!
             @else
                I don't have any element!
            @endif
        </pre>
    @endverbatim
    <h2>Mảng @{{$arr}} :</h2>
     @if (count($arr) === 1)
         I have one element!
    @elseif (count($arr) > 1)
        I have multiple element!
    @else
        I don't have any element!
    @endif
</body>
</html>