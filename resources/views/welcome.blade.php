<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link href="{{asset(mix('css/app.css'))}}" rel="stylesheet">
</head>
<body>
<div id="app">
    <home-component></home-component>
</div>
</body>

<script type="text/javascript" src="{{ asset(mix('js/app.js'))}}"></script>