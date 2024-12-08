<div>
    <h1> This is Header Component </h1>
    <h3> Welcome to, {{ $name }} </h3>
        <hr/>
    <ul>
        @foreach ($fruits as $item)
            <li>{{ $item }}</li>
        @endforeach
    </ul>
</div>