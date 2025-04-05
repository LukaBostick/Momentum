<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>WeHack25</title>
    </head>
    <body>
        <ul>
            @foreach ($projects as $project)
                <li>{{ $project->title }}</li>
            @endforeach
        </ul>
    </body>
</html>
