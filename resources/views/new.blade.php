<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>New Show</title>
  </head>
  <body>

    <div id="app"></div>
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>



    <!-- <link rel="stylesheet" href="{{ mix('css/app.css') }}">  -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}"></script>

  </body>
</html>
