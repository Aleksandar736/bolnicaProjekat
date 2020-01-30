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
        <title>Korisnici</title>
        <!-- .js -->      
        <script>
        //validacija podataka u formi za unos novog korisnika
        function korisnikValidacija() {
            var username = document.getElementById( 'username' );
            if ( username.value == '' ) {
                alert( 'Morate uneti korisnicko ime!' );
                return false;
            } else {
                return true;
            }
            

            var password = document.getElementById( 'password' );
            if ( password.value == '' ) {
                alert( 'Morate uneti sifru!' );
                return false;
            } else {
                return true;
            }
            var uloga = document.getElementById( 'uloga' );
            if ( uloga.value == '' ) {
                alert( 'Morate odabrati ulogu!' );
                return false;
            } else {
                return true;
            }
        }

        </script>
       
    </head>
    <body>
        <!-- heder -->
        @extends('layouts.appAdmin')
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

            Ulogovali ste se kao Admin!
        </div>
        <div class="flex-center position-ref">
            <!--pocetak menija-->
            @include('admin.meniAdmina')
            <!--kraj menija-->           
        </div>

        <!--glavni sadržaj-->
        <div id="container2" class="row">
            <!--levi deo-->
            <div id="left pozadina" class="col-lg-1">

            </div>
            <!--kraj levog dela-->

            <!--srednji deo-->
            <div id="container1" class="col-lg-10">
                <form method="POST" action="/admin/korisnik" onsubmit="return korisnikValidacija()">
                    <div class="card-header naslov">            
                        Podaci korisnika
                    </div>        
                    <div class="card-body">
                        <!--prvi red-->
                        <?php echo csrf_field(); ?>
                        <?php   
                            if($korisnik->korisnik_id > 0){
                                echo '<input type="hidden" name="_method" value="PUT" />';
                                echo '<input name="korisnik_id" value="'.$korisnik->korisnik_id.'" type="hidden" />';
                            }
                        ?>
                        <div class="row">
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-control-label">Ime</label>
                                    <input type="text" name='ime' id='ime' placeholder='Ime' value='<?=$korisnik->ime?>' class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-control-label">Prezime</label>
                                    <input type="text" name='prezime' id='prezime' placeholder='Prezime' value='<?=$korisnik->prezime?>' class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-control-label">Uloga</label>
                                    <!--<input type="text" name='uloga' id = 'uloga' placeholder='Uloga' value='<=$korisnik->rola->naziv?>' class="form-control" required>-->
                                    @include('select_uloga', ['data'=>$uloge, 'ulo'=>$korisnik->uloga_id])
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-control-label">Email</label>
                                    <input type="email" name='email' id='email' placeholder='E-mail' value='<?=$korisnik->email?>' class="form-control">
                                </div>
                            </div>
                        </div>
                        <!--kraj prvog reda-->
                        
                        <!--drugi red-->
                        <div class="row">
                            <!-- <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-control-label">Korisničko ime</label>
                                    <input type="text" name='username' id='username' placeholder='Korisničko ime' value='<?=$korisnik->username?>' class="form-control">
                                </div>
                            </div> -->
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-control-label">Lozinka</label>
                                    <input type="text" name='password' id='password' placeholder='Lozinka' value='<?=$korisnik->password?>' class="form-control">
                                </div>
                            </div>
                        </div>
                        <!--kraj drugog reda-->

                        <!--treci red-->
                        <div class="row">
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-fill btn-info">Dodaj u bazu</button>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <a href="/admin/korisnik" class="btn btn-fill btn-info rosybrown">Povratak na prethodnu stranu</a>
                                </div>
                            </div>
                        </div>
                        <!--kraj treceg reda-->
                    </div>
                </form>    
            </div>
            <!--kraj srednjeg dela-->

            <!--desni deo-->
            <div id="right pozadina" class="col-lg-1">

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