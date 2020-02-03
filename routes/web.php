<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Korisnik;
use App\Lekovi;
use App\Pacijent;
use App\Bolest;
use App\Pregledi;

Route::get('/', function () {
   return view('welcome');
});

//Glavne stranice
Route::get('/home', 'HomeController@index')->name('home');

//Admin
Route::prefix('/admin')->middleware(['admin', 'auth'])->group(function()
{
Route::get('/home', 'HomeController@adminHome')->name('admin.adminHome')->middleware('uloga');  
//Tabela korisnik
Route::get('/korisnik', 'KorisnikController@korisnik_tabela')->name('admin.korisnik');
Route::get('/korisnik/action', 'KorisnikController@action')->name('live_search_korisnik.action');
Route::get('/korisnik/forma_korisnik', 'KorisnikController@forma_korisnik_novi');
Route::get('/korisnik/forma_korisnik/{id}', 'KorisnikController@forma_korisnik_stari');
//Route::get('/korisnik/{id}', 'KorisnikController@jedan_red');
Route::delete('/korisnik/{id}', 'KorisnikController@korisnik_delete');
Route::post('/korisnik', 'KorisnikController@korisnik_novi');
Route::put('/korisnik', 'KorisnikController@korisnik_update');
});

//Asistent
Route::prefix('/asistent')->middleware(['asistent', 'auth'])->group(function()
{
Route::get('/home', 'HomeController@asistentHome')->name('asistent.asistentHome')->middleware('uloga');
//Tabela lekovi
Route::get('/lekovi', 'LekController@lek_tabela');
Route::get('/lekovi/action', 'LekController@action')->name('live_search_lek.action');
Route::get('/lekovi/forma_lek', 'LekController@forma_lek_novi');
Route::get('/lekovi/forma_lek/{id}', 'LekController@forma_lek_stari');
//Route::get('/lekovi/{id}', 'LekController@jedan_red_tab_lekovi');
Route::delete('/lekovi/{id}', 'LekController@lek_obrisi');
Route::post('/lekovi', 'LekController@lek_novi');
Route::put('/lekovi', 'LekController@lek_izmeni');
//Tabela pacijenti
Route::get('/pacijent', 'PacijentController@pacijent');      //poziva metodu i kontroler za dobijanje podataka u tabeli
Route::get('/pacijent/action', 'PacijentController@action')->name('live_search_pacijent.action'); //Tek treba primeniti
Route::get('/pacijent/forma_pacijent', 'PacijentController@forma_pacijent_novi');   //prikazuje formu za unos
Route::get('/pacijent/forma_pacijent/{id}', 'PacijentController@forma_pacijent_stari');   //vraca podatke iz tabele u formu
//Route::get('/pacijent/{id}', 'PacijentController@jedan_red');   //jedan red iz tabele
Route::delete('/pacijent/{id}', 'PacijentController@pacijent_delete');   //delete
Route::post('/pacijent', 'PacijentController@pacijent_novi');  //poziva metodu i kontroler za dodavanje nove osobe
Route::put('/pacijent', 'PacijentController@pacijent_update');  //update
//Tabela bolesti
Route::get('/bolest', 'BolestController@bolest_tabela');
Route::get('/bolest/action', 'BolestController@action')->name('live_search_bolest.action');
Route::get('/bolest/forma_bolest', 'BolestController@forma_bolest_nova');
Route::get('/bolest/forma_bolest/{id}', 'BolestController@forma_bolest_stara');
//Route::get('/bolest/{id}', 'BolestController@jedan_red_bolest');
Route::delete('/bolest/{id}', 'BolestController@bolest_obrisi');
Route::post('/bolest', 'BolestController@bolest_nova');
Route::put('/bolest', 'BolestController@bolest_izmeni');
//Tabela pregledi
Route::get('/pregledi', 'PreglediController@pregledi_tabela');      //poziva metodu i kontroler za dobijanje podataka u tabeli
Route::get('/pregledi/action', 'PreglediController@action')->name('live_search_pregledi.action'); //Pretraga
Route::get('/pregledi/forma_pregled', 'PreglediController@forma_pregled_novi');   //prikazuje formu za unos
Route::get('/pregledi/forma_pregled/{id}', 'PreglediController@forma_pregled_stari');   //vraca podatke iz tabele u formu
Route::delete('/pregledi/{id}', 'PreglediController@pregled_delete');   //delete
Route::post('/pregledi', 'PreglediController@pregled_novi');  //poziva metodu i kontroler za dodavanje novog
Route::put('/pregledi', 'PreglediController@pregled_update');  //update
});

//Doktor
Route::prefix('/lekar')->middleware(['lekar', 'auth'])->group(function()
{
Route::get('/home', 'HomeController@doktorHome')->name('lekar.doktorHome')->middleware('uloga');
//Tabela pregledi Doktora
Route::get('/pregledi_doktora', 'PreglediDoktoraController@pregledi_tabela');      //poziva metodu i kontroler za dobijanje podataka u tabeli
Route::get('/pregledi_doktora/action', 'PreglediDoktoraController@action')->name('live_search_pregledi_doktora.action'); //Pretraga
Route::get('/pregledi_doktora/forma_pregled_doktor', 'PreglediDoktoraController@forma_pregled_novi');   //prikazuje formu za unos
Route::get('/pregledi_doktora/forma_pregled_doktor/{id}', 'PreglediDoktoraController@forma_pregled_stari');   //vraca podatke iz tabele u formu
Route::delete('/pregledi_doktora/{id}', 'PreglediDoktoraController@pregled_delete');   //delete
Route::post('/pregledi_doktora', 'PreglediDoktoraController@pregled_novi');  //poziva metodu i kontroler za dodavanje novog
Route::put('/pregledi_doktora', 'PreglediDoktoraController@pregled_update');  //update
//Tabela pacijenti
Route::get('/pacijent_doktora', 'PacijentDoktoraController@pacijent');      //poziva metodu i kontroler za dobijanje podataka u tabeli
Route::get('/pacijent_doktora/action', 'PacijentDoktoraController@action')->name('live_search_pacijent_doktora.action');
//Tabela bolesti Doktora
Route::get('/bolest_doktora', 'BolestDoktoraController@bolest_tabela');
Route::get('/bolest_doktora/action', 'BolestDoktoraController@action')->name('live_search_bolest_doktora.action');
//Tabela lekovi Doktora
Route::get('/lekovi_doktora', 'LekDoktoraController@lek_tabela');
Route::get('/lekovi_doktora/action', 'LekDoktoraController@action')->name('live_search_lek_doktora.action');
});

//Ostalo
Auth::routes();

Route::get('/vreme', function () {
   return view('vreme');
});

Route::get('/redirect', function () {
   return view('redirect');
});






