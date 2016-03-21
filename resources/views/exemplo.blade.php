
<html>
    <head>

    </head>

    <body>
        <h1>Itens</h1>
        <ul>
            @foreach($categories as $category)
                <li>{{$category->name}}</li>
            @endforeach
        </ul>


    </body>
</html>
