<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kloudy</title>
    <link rel="shortcut icon" href="{{ asset("assets/img/favicon.ico") }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans">
    <link rel="stylesheet" href="{{ asset("assets/css/Social-Icons.css") }}" />
    <link rel="stylesheet" href="{{ asset("assets/css/Footer-Dark.css") }}" />
    <link rel="stylesheet" href="{{ asset("assets/css/styles.css") }}" />
    <link rel="stylesheet" href="{{ asset("assets/css/weather-icons.min.css") }}" />
 </head>
 <body style="background-color:rgba(0,28,61,0.4);">
    <div class="container-fluid" style="height:100vh;padding:5em;">
        <h1 class="text-monospace text-center" style="margin-bottom:1em;font-size:3.5em;font-family:Allerta, sans-serif;">Kloudy</h1>
        <div style="background-color:#2d364e;height:100%;padding:2.5em;">
            <div class="row">
                <div class="col" style="margin-top:1em;">
                    <p class="text-center" style="color:rgb(255,255,255);font-size:2.5em;font-family:'Nunito Sans', sans-serif;margin-top:.25em;">{{$City}}, {{$Country}}</p>
                </div>
            </div>
            <div class="row" style="margin:0;width:100%;">
                <div class="col">
                    <div style="height:7rem;text-align:center;margin-top:1.2em;color: #fff;"><i class="wi wi-cloudy" style="font-size:6rem;"></i></div>
                    <p class="text-center" style="color:rgb(255,255,255);font-size:.7em;font-family:'Nunito Sans', sans-serif;">{{$State}} / {{$Humidity}}% Humidity</p>
                    <p class="text-center" style="color:rgb(255,255,255);font-size:2.3em;font-family:'Nunito Sans', sans-serif;">{{$Temperature}}º C</p>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-dark">
        <footer>
            <div class="flex-center">
                <a href="https://github.com/JeanBarry/"><i class="fa fa-github fa-4x icon-3d"></i></a>
                <a href="https://twitter.com/JeanFrancoisB7"><i class="fa fa-twitter fa-4x icon-3d"></i></a>
                <a href="https://www.linkedin.com/in/jeanb7/"><i class="fa fa-linkedin fa-4x icon-3d"></i></a>
                <a href="http://www.jeanbarry.me/"><i class="fa fa-user fa-4x icon-3d"></i></a>
            </div>
            <p class="copyright">Cloudy 2019 - Jean Barry</p>
        </footer>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
 </body>
</html>


