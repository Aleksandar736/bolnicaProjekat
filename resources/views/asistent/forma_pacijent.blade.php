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
        <title>Pacijenti</title>
        <style>
            .row{
                width:101%;
            }
        </style>
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
            <div id="left" class="col-lg-1">

            </div>
            <!--kraj levog dela-->

            <!--srednji deo-->
            <div id="container1" class="col-lg-10">
                <form method="POST" action="/asistent/pacijent" >
                    <div class="card-header naslov">            
                        Podaci pacijenta
                    </div>
                    <div class="card-body">
                        <!--prvi red-->
                        <?php echo csrf_field(); ?>
                        <?php
                            if($pacijent->pacijent_id >0){
                                echo '<input type="hidden" name="_method" value="PUT" />';
                                echo '<input name="pacijent_id" value="'.$pacijent->pacijent_id.'" type="hidden" />';
                            }
                        ?>                
                        <div class="row">
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-control-label">Ime</label>
                                    <input type="text" name="ime_pacijenta" class="form-control" placeholder="Ime" value="<?=$pacijent->ime_pacijenta?>" />
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-control-label">Prezime</label>
                                    <input type="text" name="prezime_pacijenta" class="form-control" placeholder="Prezime" value="<?=$pacijent->prezime_pacijenta?>" />
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-control-label">Datum rođenja</label>
                                    <input type="date" name="datum_rodjenja" class="form-control" placeholder="Datum rođenja" value="<?=$pacijent->datum_rodjenja?>" />
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-control-label">Pol</label><br>
                                    <input type="text" name="pol" class="form-control" placeholder="pol" value="<?=$pacijent->pol?>" />
                                     <!-- <select name="pol" id="pol" class="col-md-6 col-md-3">
                                        <option value="muski">Muski</option>
                                        <option value="zenski">Zenski</option>
                                        <option value="ostalo">Ostalo</option>
                                    </select>    --> 
                                    <!-- @include('select_pol', ['data'=> $pol, 'pol'=>$pacijent->pol]) -->
                                                              
                                </div>
                            </div>                            
                        </div>
                        <!--kraj prvog reda-->

                        <!--drugi red-->
                        <div class="row">
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-control-label">LBO</label>
                                    <input type="number" name="lbo" class="form-control" placeholder="LBO" value="<?=$pacijent->lbo?>" />
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-control-label">E-mail</label>
                                    <input type="email" name="email_pacijenta" class="form-control" placeholder="E-mail" value="<?=$pacijent->email_pacijenta?>" />
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-control-label">Adresa</label>
                                    <input type="text" name="adresa" class="form-control" placeholder="Adresa" value="<?=$pacijent->adresa?>" />
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-control-label">Lekar</label><br>
                                    @include('select_dr', ['data'=>$doktori, 'doktor_id'=>$pacijent->dodeljeni_lekar_id])
                                </div>
                            </div>
                        </div>
                        <!--kraj drugog reda-->

                        <!--treci red-->
                        <div class="row">
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-control-label">Datum dodele doktora</label><br>
                                    <input type="date" name="datum_dodele_lekara" class="form-control" placeholder="Datum dodele doktora" value="<?=$pacijent->datum_dodele_lekara?>" />
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">

                                </div>
                            </div>
                        </div>
                        <!--kraj treceg reda-->

                        <!--cetvrti red-->
                        <div class="row">
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-fill btn-info">Dodaj u bazu</button>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <a href="/asistent/pacijent" class="btn btn-fill btn-info rosybrown">Povratak na prethodnu stranu</a>
                                </div>
                            </div>
                        </div>
                        <!--kraj cetvrtog reda-->
                    </div>
                </form>
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
        @endguest        