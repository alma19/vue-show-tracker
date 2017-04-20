<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Show Tracker</title>

        <script src="https://use.fontawesome.com/3ddd43fed9.js"></script>

    </head>
    <body>

      <h1>App test</h1>
        <div id="app"></div>


        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
        </script>


         <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
