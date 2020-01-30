<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Styles -->        
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="/css/app.css">                  
    <link rel="stylesheet" href="/css/novi.css">
    <!-- .js -->        
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">     
    <!-- Title -->
    <title>Lekovi na zalihama</title>
</head>
<body>
    <!-- heder -->
    @extends('layouts.appAsistent')
    <!-- heder -->
    @section('content')
    @guest
    @section('content')
    <div id="container2" class="row">
            <!--levi deo-->
            <div id="left" class="col-lg-1"></div>
            <!--kraj levog dela-->
            <!--srednji deo-->
            <div id="container1" class="col-lg-10">
                <div class="card-body text-center">
                    <h5 class="lead ">
                        Nemate pristup stranici!
                    </h5>
                </div>
                
            </div>
            <!--kraj srednjeg dela-->
            <!--desni deo-->
            <div id="right" class="col-lg-1">

            </div>
            <!--kraj desnog dela-->
        </div>
    @endsection
    @else    
    <div class="float-right" style="margin-right:20px;">    
        @if (session('status'))
                {{ session('status') }}
        @endif

        Ulogovali ste se kao Asistent!
    </div>  
    <div class="flex-center position-ref">
        <!--pocetak menija-->
        @include('asistent.meniAsistenta')
        <!--kraj menija-->
    </div>    

    <div id="container2" class="row">
        <!--levi deo-->
        <div id="left" class="col-lg-1 pozadina">

        </div>
        <!--kraj levog dela-->

        <!--srednji deo - forma-->
        <div id="container1" class="col-lg-10">
            <form method="POST" action="/asistent/lekovi" >
                <div class="card-header naslov">            
                   Podaci o leku
                </div> 
            <div class="card-body">
                <?php echo csrf_field(); ?>
                <?php   
                    if($lek->lek_id > 0){
                        echo '<input type="hidden" name="_method" value="PUT" />';
                        echo '<input name="lek_id" value="'.$lek->lek_id.'" type="hidden" />';
                    }
                ?>              
                <div class="col-md-9">
                    <div class="card table-with-switches">
                        <div class="card-body ">
                            <form method="POST" action="/asistent/lekovi">
                                <div class="form-group">
                                    <label>Naziv</label>
                                    <input type="text" name='naziv' placeholder='naziv' value='<?=$lek->naziv?>' class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Količina na zalihama</label><br>
                                    <input type="text" name='kolicina_na_zalihama' placeholder='količina na zalihama' value='<?=$lek->kolicina_na_zalihama?>' class="form-control">
                                </div>
                                <div class="card-footer ">
                                    <button type="submit" class="btn btn-fill btn-info">Dodaj u bazu</button>
                                </div>                                      
                            </form>
                            <div class="card-footer ">
                                <a href="/asistent/lekovi" class="btn btn-fill btn-info rosybrown">Idi na stranu Lekovi</a>                            
                            </div>
                        </div>
                    </div>
                </div>                   
            </div>
        </div>
        <!--kraj srednjeg dela-->

        <!--desni deo-->
        <div id="right" class="col-lg-1 pozadina">

        </div>
        <!--kraj desnog dela-->        
    </div>
    <!--footer-->
        @include('futer')
    <!--kraj footer-a-->
</body>
</html>
    @endsection
    @endguest    