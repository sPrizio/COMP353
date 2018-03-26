<html lang="en">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.4/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="/css/main.css">

    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Raleway:100,600">

    <title>COMP353 | @yield('title')</title>
</head>

<body>

<nav>
    <div class="nav-wrapper">
        <a href="#" class="brand-logo">COMP 353</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="/departments">Departments</a></li>        
            <li><a href="/employees">Employees</a></li>
            <li><a href="/projects">Projects</a></li>
        </ul>
    </div>
</nav>
        

<div class="container">
    <br />
    <br />
    <div class="card">
        <div class="card-content">
            @yield('content')
        </div>
    </div>
</div>

<!-- JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.4/js/materialize.min.js"></script>
</body>

</html>