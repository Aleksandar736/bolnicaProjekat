<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\support\Facades\DB;
use App\Pregledi;
use App\Korisnik;
use App\Bolest;
use App\Lekovi;
use App\SpecPregled;
use App\PrepisaniLekovi;

class PreglediController extends Controller
{   
    public function pregledi_tabela(){ //tabela pregleda na str. /pregledi
        $data = Pregledi::all();
        return view('/asistent/pregledi', ['data'=>$data]);
    }

    public function forma_pregled_novi() { //prikazuje formu za unos novog pregleda
        $doktori = Korisnik::where('uloga_id', '3')->get();
        $dijagnoza = Bolest::all();
        $uputi=SpecPregled::all();
        $lekovi=Lekovi::all();
        return view('/asistent/forma_pregled', ['pregled'=>new Pregledi(),'doktori'=>$doktori,'lekovi'=>$lekovi,'dijagnoza'=>$dijagnoza,'uputi'=>$uputi]);//povezan sa function pregled_novi()
    }
    
    public function forma_pregled_stari($id){   //vraća podatke iz tabele pregleda (na str. /pregledi)
        $pregled = Pregledi::findOrFail($id);     // za izabrani pregled u formu
        $doktori = Korisnik::where('uloga_id', '3')->get();
        $dijagnoza = Bolest::all();
        $uputi=SpecPregled::all();
        $lekovi=Lekovi::all();
        return view('/asistent/forma_pregled', compact('pregled','doktori','dijagnoza','uputi', 'lekovi')); //za izmenu starog (ili unos novog) pregleda
    }                                                   //povezan sa function pacijent_update(Request $request)

    public function pregled_novi(Request $request){  //poziva metodu i kontroler za dodavanje novog pregleda
        //return $request->all();                    //unete podatke u formi za unos novog pregleda
        $d = new Pregledi();                           //šalje u bazu 
        $d->pacijent_id = $request->broj_kartona; //povezan sa function forma_pregled_novi()
        $d->datum = $request->datum_pregleda;
        $d->bolest_id = $request->bolest_id;
        $d->opis = $request->opis;
        $d->doktor_id = $request->dodeljeni_lekar_id;
        $d->uput_id = $request->uput_id;
        $d->save();
        $pregled_id = $d->pregledi_id; // ovako izvlacimo ID novo-dodatog pregleda
        foreach((array) $request->prepisani_lekovi as $lek_id) {
            $kolicina_leka = $request->prepisana_kolicina[$lek_id];
            if($kolicina_leka > 0) {
                $lek=Lekovi::find($lek_id);
                if($lek->kolicina_na_zalihama < $kolicina_leka){

                    return view('/asistent/warning_lekovi');
                } 
                $prepisani_lek = new PrepisaniLekovi();
                $prepisani_lek->pregled_id = $pregled_id;
                $prepisani_lek->lek_id = $lek_id;
                $prepisani_lek->kolicina = $kolicina_leka;
                $prepisani_lek->save();
                
                $lek->kolicina_na_zalihama = $lek->kolicina_na_zalihama-$kolicina_leka;
                $lek->save(); 
                
            }
        }
        return redirect()->to('/asistent/pregledi');
    }
    public function pregled_update(Request $request){ //poziva metodu i kontroler za izmenu starog pregleda
        // return $request->all();                     //unete podatke u formi za izmenu starog 
        $d = Pregledi::find($request->pregledi_id); //(ili unos novog) pregleda šalje u bazu
        $d->pacijent_id = $request->broj_kartona; //povezan sa function forma_pregled_stari($id)
        $d->datum = $request->datum_pregleda;
        $d->bolest_id = $request->bolest_id;
        $d->opis = $request->opis;
        $d->doktor_id = $request->dodeljeni_lekar_id;
        $d->uput_id = $request->uput_id;
        $d->save();
        $pregled_id = $request->pregledi_id;
        PrepisaniLekovi::where('pregled_id', $pregled_id)->delete();
        foreach((array) $request->prepisani_lekovi as $lek_id) {
            $kolicina_leka = $request->prepisana_kolicina[$lek_id];
            if($kolicina_leka > 0) {
                $lek=Lekovi::find($lek_id);
                if($lek->kolicina_na_zalihama < $kolicina_leka){

                    return view('/asistent/warning_lekovi');
                }
                $prepisani_lek = new PrepisaniLekovi();
                $prepisani_lek->pregled_id = $pregled_id;
                $prepisani_lek->lek_id = $lek_id;
                $prepisani_lek->kolicina = $kolicina_leka;
                $prepisani_lek->save();
                
                $lek->kolicina_na_zalihama = $lek->kolicina_na_zalihama;
                $lek->save(); 
            }
        }
        return redirect()->to('/asistent/pregledi');
    }
    public function pregled_delete($id){ //briše iz baze izabrani pregled

        $pregled = Pregledi::find($id);      
        $pregled->delete();
    
        return redirect()->to('/asistent/pregledi');
        
    }

    function action(Request $request)
    {
 
       $query = $request->get('query');
       if($query != '')
       {
       $data = Pregledi:: //DB::table('pregledi')
        where('pacijent_id', 'like', '%'.$query.'%')
        ->orderBy('pregledi_id', 'desc')
        ->get();
          
       }
       else
       {
       $data = Pregledi:: //DB::table('pregledi')
        orderBy('pregledi_id', 'desc')
        ->get();
        }
 
       return view('/asistent/pregledi', ['data'=>$data]);
 
    }

}
