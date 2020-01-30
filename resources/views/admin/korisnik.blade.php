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
    <title>Korisnici</title>   
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
            <div class="card-header">
                <legend class="text-sm-center">Korisnici</legend>
                <div class="form-group">
                    <div class="input-group input-group-merge">
                        <div class="pull-right"><input class="form-control" type="text" name="search" id="search" placeholder="Pretraga korisnika"></div>
                    </div>
                </div>
            </div>         
            <div id="data-table">
            <?php
                $total_row = $data->count();
                echo '<h6 align="center">Pronađeno podataka : '. $total_row .' <span id="total_records"></span></h6>';
            ?>
            <table class="table table-striped table-sm table-responsive-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Uloga</th>
                        <!-- <th>Korisničko ime</th> -->
                        <!-- <th>Lozinka</th> -->
                        <th>Ime i prezime</th>
                        <!-- <th>Prezime</th> -->
                        <th>E-mail</th>
                        <th colspan="2"><a href="/admin/korisnik/forma_korisnik/" class="btn btn-success" id="korisnik">DODAJ NOVOG KORISNIKA</a></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if($total_row > 0)
                        {
                        foreach($data as $row)
                        {
                    ?> 
                    <tr>
                        <td><?=$row->korisnik_id?></td>
                        <td><?=$row->uloga_id ? $row->rola->naziv : ''?></td>                    
                        <!-- <td><$row->username?></td> -->
                        <!-- <td><$row->password?></td> -->
                        <td><?=$row->ime?> <?=$row->prezime?></td>
                        <!-- <td><$row->prezime?></td> -->
                        <td><?=$row->email?></td>
                        <td width='90px'><a href="/admin/korisnik/forma_korisnik/<?=$row->korisnik_id?>" class="btn btn-primary">IZMENI</a></td>
                        <td width='90px'>
                            <form method="POST" action="/admin/korisnik/<?=$row->korisnik_id?>" >
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE" />
                                <input type="submit" class="btn btn-danger" value="OBRIŠI" />
                            </form>
                        </td>
                    </tr>
                    <?php  
                        }
                        }
                        else
                        { 
                    ?>
                    
                    <tr>
                        <td align="center" colspan="11">Nema podataka</td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
            </div>
        </div>
        <!--kraj srednjeg dela-->
        <!--desni deo-->
        <div id="right pozadina" class="col-lg-1">

        </div>
        <!--kraj desnog dela-->               
    </div>
    <!--kraj glavnog sadržaja-->
    <!--footer-->
        @include('futer')
    <!--kraj footer-a-->
    <script>
        $(document).ready(function(){

        function fetch_korisnik_data(query = '')
        {
        $('#data-table').load("{{ route('live_search_korisnik.action') }}?query=" + query + " #data-table")
        }

        $(document).on('keyup', '#search', function(){
        var query = $(this).val();
        fetch_korisnik_data(query);
        });
        });
	</script>
</body>
</html>
    @endsection
    @endguest