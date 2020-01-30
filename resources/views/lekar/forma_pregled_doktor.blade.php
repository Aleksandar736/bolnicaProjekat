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
        <script>
            function validateForm() {
            var x = document.forms["myForm"]["opis"].value;
            if (x == "") {
                alert("Ime mora biti uneto");
                return false;
            }
            } 
        </script>
        <!-- Title -->
        <title>Pregledi</title>    
    </head>
    <body>
        <!-- heder -->
        @extends('layouts.appDoktor')
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

            Ulogovali ste se kao Doktor!
        </div>  
        <div class="flex-center position-ref">
            <!--pocetak menija-->
            @include('lekar.meniDoktora')
            <!--kraj menija-->
        </div>   

        <div id="container2" class="row">
            <!--levi deo-->
            <div id="left" class="col-lg-1 pozadina">

            </div>
            <!--kraj levog dela-->

            <!--srednji deo-->
            <div id="container1" class="col-lg-10">
                <form method="POST" action="/lekar/pregledi_doktora" name="myForm" onsubmit="return validateForm()" >
                    <div class="card-header naslov">            
                        Podaci o pregledu
                    </div>
                    <div class="card-body">
                        <!--prvi red-->
                        <?php echo csrf_field(); ?>
                        <?php
                            if($pregled->pregledi_id >0){
                                echo '<input type="hidden" name="_method" value="PUT" />';
                                echo '<input name="pregledi_id" value="'.$pregled->pregledi_id.'" type="hidden" />';
                            }
                        ?>                
                        <div class="row">
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-control-label">Broj kartona</label>
                                    <?php 
                                    if($pregled->pregledi_id >0){ 
                                    ?>
                                        <p style='font-size:1.5em;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$pregled->pacijent_id?></p>
                                        <input type="number" name="broj_kartona" class="form-control" placeholder="Broj kartona" value="<?=$pregled->pacijent_id?>" <?php if($pregled->pregledi_id >0){ echo 'hidden'; } ?> />                                      
                                    <?php 
                                    } 
                                    else {
                                        echo "<input type='number' name='broj_kartona' class='form-control' placeholder='Broj kartona'"." value='"."<?=$pregled->pacijent_id?>"."' />";
                                    }
                                    ?>
                                </div>                              
                            </div>                                                          
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-control-label">Datum pregleda</label>
                                    <input type="date" name="datum_pregleda" class="form-control" placeholder="Datum pregleda" value="<?=$pregled->datum?>" />
                                </div>
                            </div>                                                         
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-control-label">Dijagnoza</label>
                                    <br>
                                    <!-- <input type="number" name="dijagnoza" class="form-control" placeholder="Dijagnoza" value="$pregled->bolest_id?>" /> -->
                                    @include('select_dg', ['data'=>$dijagnoza, 'bolesti'=>$pregled->bolest_id])
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-control-label">Lekar</label>
                                    <br>
                                    <!-- <input type="number" name="doktor" class="form-control" placeholder="Lekar" value="$pregled->doktor_id?>" /> -->
                                    @include('select_dr', ['data'=>$doktori, 'doktor_id'=>$pregled->doktor_id])
                                </div>
                            </div>
                                                   
                        </div>                        
                        <!--kraj prvog reda-->

                        <!--drugi red-->
                        <div class="row">
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-control-label">Opis</label><br>
                                    <textarea rows="5" cols="25" id="opis" name="opis" > {{$pregled->opis}} </textarea>
                                </div>
                            </div>      
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-control-label">Prepisani lekovi</label>
                                    <!-- <input type="number" name="prep_lekovi" class="form-control" placeholder="Prepisani lekovi" value="lekovi" /> -->
                                    @include('checkbox_pl', ['data'=>$lekovi, 'prepisani_lekovi'=>$pregled->lekovi])
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-control-label">Uput</label><br>
                                    <!-- <input type="number" name="uput" class="form-control" placeholder="Uput" value="$pregled->uput_id?>" /> -->
                                    @include('select_uput', ['data'=>$uputi, 'spec'=>$pregled->uput_id])
                                </div>
                            </div>
                        </div>
                        <!--kraj drugog reda-->

                        <!--treci red-->
                        <div class="row" style="margin-top: 30px;">
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-fill btn-info">Dodaj u bazu</button>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <a href="/lekar/pregledi_doktora" class="btn btn-fill btn-info rosybrown">Povratak na prethodnu stranu</a>
                                </div>
                            </div>
                        </div>
                        <!--kraj treceg reda-->
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