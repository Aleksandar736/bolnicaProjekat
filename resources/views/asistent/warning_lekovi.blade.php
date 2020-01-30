<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/app.css">
        <link rel="stylesheet" href="/css/novi.css">
        <link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.css" type="text/css">
        <!-- .js -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
        <title>HospitalPlus</title>
    </head>
    <body>
        <!-- heder -->
        @include('heder_login')
        <!-- heder -->
        <div class="flex-center position-ref">
            <!--pocetak menija-->
            @include('meni')
            <!--kraj menija-->
        </div>

        <div id="container2" class="row">
            <!--levi deo-->
            <div id="left" class="col-lg-1"></div>
            <!--kraj levog dela-->
            <!--srednji deo-->
            <div id="container1" class="col-lg-10">
                <div class="card-body text-center">
                    <h5 class="lead ">
                    Odabrani broj lekova nije dostupan na zalihama!
                    </h5>
                    <div class="card-footer ">
                    <a href="/asistent/pregledi" class="btn btn-fill btn-info rosybrown">Povratak na stranu Pregledi</a>
                </div>
                </div>
                
            </div>
            <!--kraj srednjeg dela-->
            <!--desni deo-->
            <div id="right" class="col-lg-1">

            </div>
            <!--kraj desnog dela-->
        </div>
        <!--footer-->
        @include('futer')
        <!--kraj footer-a-->
    </body>

</html>
