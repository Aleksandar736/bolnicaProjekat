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
        @extends('layouts.appDoktor')
        <!-- heder -->
        @section('content')
        <div class="float-right" style="margin-right:20px;">    
            @if (session('status'))
                    {{ session('status') }}
            @endif

            Ulogovali ste se kao Doktor!
        </div>  
        <div class="flex-center position-ref">
            <!--pocetak menija-->
            @include('lekar.meniDoktora')
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
                        Dobrodošli na HospitalPlus <br>informacioni sistem!
                    </h5>
                </div>
                <!--widgets-->
                <div class="widgets">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="card p-5 border-0 rounded-top border-bottom ">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11323.816650069457!
                                2d20.402573557504088!3d44.802122783614664!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a6f92363f1881%3A0x550c0955fccddcc2!
                                2z0KHQsNCy0YHQutC4INC90LDRgdC40L8gNywg0JHQtdC-0LPRgNCw0LQgMTEwNzA!5e0!3m2!1ssr!2srs!4v1577136357145!5m2!1ssr!2srs"
                                 width="350" height="220" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="card p-5 border-0 rounded-top hover-style-1">
                                <div class="vreme">
                                    <h4>Radno vreme:</h4><br>
                                    ponedeljak - petak:<br>
                                    07-22<br><br>
                                    subota - nedelja:<br>
                                    07-14
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="card p-5 border-0 rounded-top hover-style-1" style="height:300px;">
                               
                            <a class="weatherwidget-io" href="https://forecast7.com/en/44d7920d45/belgrade/" 
                            data-label_1="BELGRADE" data-label_2="WEATHER" data-theme="orange" >BELGRADE WEATHER</a>
                              <script>
                               !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];
                               if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';
                               fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
                              </script>
                            </div>
                        </div>
                    </div>
                </div>
                <!--kraj widgets-->
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

        @endsection

