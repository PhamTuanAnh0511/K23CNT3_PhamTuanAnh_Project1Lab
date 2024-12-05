<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>#if statement</title>
</head>
<body>
<h1>#If Statements</h1>
<hr>
@verbatim
    <pre>
        @if (count($array) === 1)
            I have one element!
        @elseif (count($array) > 1)
            I have multiple element!
         @else
            I don't have any element!
        @endif
        </pre>
    @enderbatim
    </pre>
@endverbatim
<h2>Mảng @{{$array}} :</h2>
@if (count($array) === 1)
    I have one element!
@elseif (count($array) > 1)
    I have multiple element!
@else
    I don't have any element!
@endif
<body>
</html>