<?php

namespace App\Http\Controllers;

use App\Osoba;
use App\Rezerwacje;
use App\Stanowiska;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class RezerwacjeController extends Controller
{
    function index(){
        $stanowiska = DB::table('wyposazenie')
            ->select('wyposazenie.id', 'wyposazenie.rodzaj', 'wyposazenie.model')
            ->get();
        $miejscaPracy = Stanowiska::all();

        return view('main.zarzadzaj', ['stanowiska'=>$stanowiska, 'miejscapracy' => $miejscaPracy]);
    }
    public function getData()
    {
        $rezerwacje = DB::table('rezerwacje')
            ->join('osoby', 'osoby.id', '=', 'rezerwacje.osoba_id')
            ->join('miejsce_pracy', 'miejsce_pracy.id', '=', 'rezerwacje.miejsce_pracy_id')
            ->select('rezerwacje.*', 'osoby.*', 'miejsce_pracy.nazwa')
            ->whereNotNull('rezerwacje.kiedy_rezerwacja_od')
            ->get();

            return Datatables::of($rezerwacje)->make();
    }
    function getStanowiska()
    {
        $stanowiska = DB::table('miejsce_pracy')
            ->join('wyposazenie', 'wyposazenie.id', '=', 'miejsce_pracy.wyposazenie_id')
            ->select('miejsce_pracy.nazwa', 'wyposazenie.id', 'wyposazenie.rodzaj', 'wyposazenie.model')
            ->get();

            return Datatables::of($stanowiska)
            ->addColumn('action', function($data){
                $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal">Edit</button>';
                return $button;
            })->rawColumns(['action'])
            ->make(true);
    }
    function edytujStanowisko($id)
    {

            $stanowisko = Stanowiska::findOrFail($id);


    }
    function sprawdzWolneStanowiska(Request $request)
    {
        $gcheck1= 0;
        $gcheck2 = 0;
        if($request->input('gdzod') < 10)
        {
            $gcheck1 = '0'.$request->input('gdzod');
        }
        else
        {
            $gcheck1 = $request->input('gdzod');
        }
        if($request->input('gdzdo') < 10)
        {
            $gcheck2 = '0'.$request->input('gdzdo');
        }
        else
        {
            $gcheck2 = $request->input('gdzdo');
        }

        $godzinaod = $gcheck1;
        $godzinado = $gcheck2;
        $rezerwacjaod = $request->input('datarezerwacji').' '.$godzinaod.':'.$request->input('minod');
        $rezerwacjado = $request->input('datarezerwacji').' '.$godzinado.':'.$request->input('mindo');

        $rangeCount = Rezerwacje::where(function ($query) use ($rezerwacjaod, $rezerwacjado) {
            $query->where(function ($query) use ($rezerwacjaod, $rezerwacjado) {
                $query->where('kiedy_rezerwacja_od', '<=', $rezerwacjaod)
                    ->where('kiedy_rezerwacja_do', '>=', $rezerwacjaod);
            })->orWhere(function ($query) use ($rezerwacjaod, $rezerwacjado) {
                $query->where('kiedy_rezerwacja_od', '<=', $rezerwacjado)
                    ->where('kiedy_rezerwacja_do', '>=', $rezerwacjado);
            })->orWhere(function ($query) use ($rezerwacjaod, $rezerwacjado) {
                $query->where('kiedy_rezerwacja_od', '>=', $rezerwacjaod)
                    ->where('kiedy_rezerwacja_do', '<=', $rezerwacjado);
            });
        })->get();

        $wolneStanowiska = Stanowiska::whereNotIn('id', array_pluck($rangeCount, 'miejsce_pracy_id'))->get();


        if($rangeCount == null)
        {
            return response()->json(array('msg'=>"brak"));
        }
        else{
            return response()->json(array('msg' => array_pluck($wolneStanowiska, 'nazwa')));
        }



    }
    function dodajRezerwacje(Request $request){
            $gcheck1= 0;
            $gcheck2 = 0;
            if($request->input('gdzod') < 10)
            {
                $gcheck1 = '0'.$request->input('gdzod');
            }
            else
            {
                $gcheck1 = $request->input('gdzod');
            }
            if($request->input('gdzdo') < 10)
            {
                $gcheck2 = '0'.$request->input('gdzdo');
            }
            else
            {
                $gcheck2 = $request->input('gdzdo');
            }
            $godzinaod = $gcheck1;
            $godzinado = $gcheck2;

            $rezerwacjaod = $request->input('datarezerwacji').' '.$godzinaod.':'.$request->input('minod');
            $rezerwacjado = $request->input('datarezerwacji').' '.$godzinado.':'.$request->input('mindo');
        $rangeCount = Rezerwacje::where(function ($query) use ($rezerwacjaod, $rezerwacjado) {
            $query->where(function ($query) use ($rezerwacjaod, $rezerwacjado) {
                $query->where('kiedy_rezerwacja_od', '<=', $rezerwacjaod)
                    ->where('kiedy_rezerwacja_do', '>=', $rezerwacjaod);
            })->orWhere(function ($query) use ($rezerwacjaod, $rezerwacjado) {
                $query->where('kiedy_rezerwacja_od', '<=', $rezerwacjado)
                    ->where('kiedy_rezerwacja_do', '>=', $rezerwacjado);
            })->orWhere(function ($query) use ($rezerwacjaod, $rezerwacjado) {
                $query->where('kiedy_rezerwacja_od', '>=', $rezerwacjaod)
                    ->where('kiedy_rezerwacja_do', '<=', $rezerwacjado);
            });
        })->get();
        $wolneStanowiska    = Stanowiska::whereNotIn('id', array_pluck($rangeCount, 'miejsce_pracy_id'))->get();
        $miejscePracyNazwa  = Stanowiska::findOrFail($request->input('miejscepracy'));
        $sprawdzCzyJest     = in_array($miejscePracyNazwa->nazwa, array_pluck($wolneStanowiska, 'nazwa'));
        if($sprawdzCzyJest == true)
        {
            $osoba              = new Osoba();
            $osobaImie          = $request->input('imie');
            $osobaEmail         = $request->input('email');
            $osoba->imie        = $osobaImie;
            $osoba->nazwisko    = $request->input('nazwisko');
            $osoba->telefon     = $request->input('telefon');
            $osoba->email       = $osobaEmail;
            $osoba->opis        = $request->input('opis');
            $osoba->save();

            $osobaID = Osoba::select("id")->where('imie', $osobaImie)->where('email', $osobaEmail)->first();

            $rezerwacjaD                        = new Rezerwacje();
            $rezerwacjaD->osoba_id              = $osobaID->id;
            $rezerwacjaD->miejsce_pracy_id      = $request->input('miejscepracy');
            $rezerwacjaD->kiedy_rezerwacja_od   = $rezerwacjaod;
            $rezerwacjaD->kiedy_rezerwacja_do   = $rezerwacjado;
            $rezerwacjaD->save();

            return response()->json(array('komunikat'=>"Pomyślnie dodano rezerwację", 'resetForm' => true));
        }
        else{
            $wiadomosc = "<p style='color: red;'>Stanowisko w tym terminie jest już zajęte</p>";
            return response()->json(array('komunikat'=>$wiadomosc, 'resetForm' => false));
        }
    }

}
