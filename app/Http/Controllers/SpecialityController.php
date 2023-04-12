<?php

namespace App\Http\Controllers;

use App\Models\Speciality;
use Illuminate\Http\Request;

class SpecialityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');        
    }
    public function index(Request $request)
    {
        $specialities = Speciality::query();   

        if ($request->filled('fecha_inicio') && $request->filled('fecha_fin')) {
            $fecha_inicio = $request->input('fecha_inicio');
            $fecha_fin = $request->input('fecha_fin');
            $specialities->whereBetween('fecha', [$fecha_inicio, $fecha_fin]);
        } elseif ($request->filled('fecha')) {
            $specialities->where('fecha', $request->input('fecha'));
        }


        if ($request->filled('dd_inicio') && $request->filled('dd_final')) {
            $dd_inicio = $request->input('dd_inicio');
            $dd_fin = $request->input('dd_final');
            $specialities->whereBetween('dd', [$dd_inicio, $dd_fin]);
        } elseif ($request->filled('dd')) {
            $specialities->where('dd', $request->input('dd'));
        }
    
        if ($request->filled('vvvv_inicio') && $request->filled('vvvv_final')) {
            $vvvv_inicio = $request->input('vvvv_inicio');
            $vvvv_fin = $request->input('vvvv_final');
            $specialities = $specialities->whereBetween('vvvv', [$vvvv_inicio, $vvvv_fin]);
        } elseif ($request->filled('vvvv')) {
            $vvvv = $request->input('vvvv');
            $specialities = $specialities->where('vvvv', $vvvv);
        }
        

        if ($request->filled('ww_inicio') && $request->filled('ww_final')) {
            $ww_inicio = $request->input('ww_inicio');
            $ww_fin = $request->input('ww_final');
            $specialities->where(function ($query) use ($ww_inicio, $ww_fin) {
                $query->whereBetween('ww', [$ww_inicio, $ww_fin])
                    ->orWhereBetween('ww1', [$ww_inicio, $ww_fin])
                    ->orWhereBetween('www', [$ww_inicio, $ww_fin]);
            });
        }
         
        if ($request->filled('cbtcu')) {
            $cbtcu = $request->input('cbtcu');
            $specialities->where(function ($query) use ($cbtcu) {
                $query->where('cbtcu1', 'LIKE', '%'.$cbtcu.'%')
                    ->orWhere('cbtcu2', 'LIKE', '%'.$cbtcu.'%')
                    ->orWhere('cbtcu3', 'LIKE', '%'.$cbtcu.'%');
            });
        }

        if ($request->filled('tt_inicio') && $request->filled('tt_final')) {
            $tt_inicio = $request->input('tt_inicio');
            $tt_fin = $request->input('tt_final');
            $specialities->whereBetween('tt', [$tt_inicio, $tt_fin]);
        } elseif ($request->filled('tt')) {
            $specialities->where('tt', $request->input('tt'));
        }
    

        if ($request->filled('tbh_inicio') && $request->filled('tbh_final')) {
            $tbh_inicio = $request->input('tbh_inicio');
            $tbh_fin = $request->input('tbh_final');
            $specialities->whereBetween('tbh', [$tbh_inicio, $tbh_fin]);
        } elseif ($request->filled('tbh')) {
            $specialities->where('tbh', $request->input('tbh'));
        }

        if ($request->filled('qfe')) {
            $qfe = $request->input('qfe');
            $specialities->where('qfe', 'LIKE', '%'.$qfe.'%');
        }
        

        if ($request->filled('qnh')) {
            $qnh = $request->input('qnh');
            $specialities->where('qnh', 'LIKE', '%'.$qnh.'%');
        }
    

        if ($request->filled('notas')) {
            $specialities->where('notas', 'like', '%'.$request->input('notas').'%');
        }
    
        $specialities = $specialities->paginate(1000);
    
        return view('specialities.index' , compact('specialities')) ;
    }
    public function create(){
        return view('specialities.create');
    }
    public function sendData(Request $request){

        $rules =[
            'oaci' => 'required|min:4'
        ];
        $messages =[
            'oaci.required' => 'La sigla OACI es obligatoria',
            'oaci.min' =>'La sigla OACI debe tener 4 caracteres.'
        ];

        $this->validate($request, $rules, $messages);
        

        $speciality = new Speciality();

        $speciality-> fecha = $request->input('fecha');
        $speciality-> gg = $request->input('gg');
        $speciality-> oaci = $request->input('oaci');
        $speciality-> dd = $request->input('dd');
        $speciality-> ff = $request->input('ff');
        $speciality-> fmfm = $request->input('fmfm');
        $speciality-> vvvv = $request->input('vvvv');
        $speciality-> dv = $request->input('dv');
        $speciality-> ww = $request->input('ww');
        $speciality-> ww1 = $request->input('ww1');        
        $speciality-> www = $request->input('www');
        $speciality-> ns1 = $request->input('ns1');
        $speciality-> hhh1 = $request->input('hhh1');
        $speciality-> cbtcu1 = $request->input('cbtcu1');
        $speciality-> ns2 = $request->input('ns2');
        $speciality-> hhh2 = $request->input('hhh2');
        $speciality-> cbtcu2 = $request->input('cbtcu2');
        $speciality-> ns3 = $request->input('ns3');
        $speciality-> hhh3 = $request->input('hhh3');
        $speciality-> cbtcu3= $request->input('cbtcu3');
        $speciality-> ns4 = $request->input('ns4');
        $speciality-> hhh4 = $request->input('hhh4');
        $speciality-> tt = $request->input('tt');
        $speciality-> tbh = $request->input('tbh');
        $speciality-> td = $request->input('td');
        $speciality-> qfe = $request->input('qfe');
        $speciality-> qnh = $request->input('qnh');
        $speciality-> pulg_hg = $request->input('pulg_hg');
        $speciality-> p_cord = $request->input('p_cord');
        $speciality-> uuu = $request->input('uuu');
        $speciality-> notas = $request->input('notas');

        $speciality->save();

        $notification = 'El registro se ha creado correctamente.';

        return redirect('/especialidades')->with(compact('notification'));
    }

    public function edit(Speciality $speciality){
        return view('specialities.edit', compact('speciality'));
    }

        public function update(Request $request, Speciality $speciality ){

        $rules =[
            'oaci' => 'required|min:4'
        ];
        $messages =[
            'oaci.required' => 'La sigla OACI es obligatoria',
             'oaci.min' =>'La sigla OACI debe tener 4 caracteres.'
        ];

        $this->validate($request, $rules, $messages);

        $speciality-> fecha = $request->input('fecha');
        $speciality-> gg = $request->input('gg');
        $speciality-> oaci = $request->input('oaci');
        $speciality-> dd = $request->input('dd');
        $speciality-> ff = $request->input('ff');
        $speciality-> fmfm = $request->input('fmfm');
        $speciality-> vvvv = $request->input('vvvv');
        $speciality-> dv = $request->input('dv');
        $speciality-> ww = $request->input('ww');
        $speciality-> ww1 = $request->input('ww1');        
        $speciality-> www = $request->input('www');
        $speciality-> ns1 = $request->input('ns1');
        $speciality-> hhh1 = $request->input('hhh1');
        $speciality-> cbtcu1 = $request->input('cbtcu1');
        $speciality-> ns2 = $request->input('ns2');
        $speciality-> hhh2 = $request->input('hhh2');
        $speciality-> cbtcu2 = $request->input('cbtcu2');
        $speciality-> ns3 = $request->input('ns3');
        $speciality-> hhh3 = $request->input('hhh3');
        $speciality-> cbtcu3= $request->input('cbtcu3');
        $speciality-> ns4 = $request->input('ns4');
        $speciality-> hhh4 = $request->input('hhh4');
        $speciality-> tt = $request->input('tt');
        $speciality-> tbh = $request->input('tbh');
        $speciality-> td = $request->input('td');
        $speciality-> qfe = $request->input('qfe');
        $speciality-> qnh = $request->input('qnh');
        $speciality-> pulg_hg = $request->input('pulg_hg');
        $speciality-> p_cord = $request->input('p_cord');
        $speciality-> uuu = $request->input('uuu');
        $speciality-> notas = $request->input('notas');

        $speciality->save();

        $notification = 'El registro se ha actualizado correctamente.';

        return redirect('/especialidades')->with(compact('notification'));
    }

    public function destroy (Speciality $speciality){
        $deleteName = $speciality->oaci;
        $deleteid = $speciality->id;

        $speciality->delete('/especialidades');

        $notification = 'El registro '. $deleteid .' '. $deleteName .' se ha eliminado';
        
        return redirect('/especialidades')->with(compact('notification'));
    } 

}
    
    
    

