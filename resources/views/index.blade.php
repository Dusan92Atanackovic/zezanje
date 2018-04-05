<!doctype html>
<html ng-app="app">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        {{--<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">--}}
        <link rel="stylesheet" href="/css/vendor.css">
        <link rel="stylesheet" href="/css/app.css">
        {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">--}}


    </head>
    <body
            {{--style="background-image:url('res/bg.jpeg')"--}}
    >

        <div class="content">
            <div ui-view></div>
        </div>

        <script  src="/js/vendor.js"></script>
        <script  src="/js/app.js"></script>
        <script  src="./js/ui-bootstrap.min.js"></script>
        <script  src="./js/ui-bootstrap-tpls.min.js"></script>

            </body>
</html>
