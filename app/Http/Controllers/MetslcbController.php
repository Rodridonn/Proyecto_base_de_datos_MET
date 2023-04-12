<?php

namespace App\Http\Controllers;

use App\Models\Metslcb;
use Illuminate\Http\Request;

class MetslcbController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');        
    }

    public function index(Request $request)
    {

        $metslcb = Metslcb::query();
        

        if ($request->filled('fecha_inicio') && $request->filled('fecha_fin')) {
            $fecha_inicio = $request->input('fecha_inicio');
            $fecha_fin = $request->input('fecha_fin');
            $metslcb->whereBetween('fecha', [$fecha_inicio, $fecha_fin]);
        } elseif ($request->filled('fecha')) {
            $metslcb->where('fecha', $request->input('fecha'));
        }


        if ($request->filled('dd_inicio') && $request->filled('dd_final')) {
            $dd_inicio = $request->input('dd_inicio');
            $dd_fin = $request->input('dd_final');
            $metslcb->whereBetween('dd', [$dd_inicio, $dd_fin]);
        } elseif ($request->filled('dd')) {
            $metslcb->where('dd', $request->input('dd'));
        }
    
        if ($request->filled('vvvv_inicio') && $request->filled('vvvv_final')) {
            $vvvv_inicio = $request->input('vvvv_inicio');
            $vvvv_fin = $request->input('vvvv_final');
            $metslcb = $metslcb->whereBetween('vvvv', [$vvvv_inicio, $vvvv_fin]);
        } elseif ($request->filled('vvvv')) {
            $vvvv = $request->input('vvvv');
            $metslcb = $metslcb->where('vvvv', $vvvv);
        }

        if ($request->filled('ww_inicio') && $request->filled('ww_final')) {
            $ww_inicio = $request->input('ww_inicio');
            $ww_fin = $request->input('ww_final');
            $metslcb->where(function ($query) use ($ww_inicio, $ww_fin) {
                $query->whereBetween('ww', [$ww_inicio, $ww_fin])
                    ->orWhereBetween('ww1', [$ww_inicio, $ww_fin])
                    ->orWhereBetween('www', [$ww_inicio, $ww_fin]);
            });
        }
         
        if ($request->filled('cbtcu')) {
            $cbtcu = $request->input('cbtcu');
            $metslcb->where(function ($query) use ($cbtcu) {
                $query->where('cbtcu1', 'LIKE', '%'.$cbtcu.'%')
                    ->orWhere('cbtcu2', 'LIKE', '%'.$cbtcu.'%')
                    ->orWhere('cbtcu3', 'LIKE', '%'.$cbtcu.'%');
            });
        }

        if ($request->filled('tt_inicio') && $request->filled('tt_final')) {
            $tt_inicio = $request->input('tt_inicio');
            $tt_fin = $request->input('tt_final');
            $metslcb->whereBetween('tt', [$tt_inicio, $tt_fin]);
        } elseif ($request->filled('tt')) {
            $metslcb->where('tt', $request->input('tt'));
        }
    

        if ($request->filled('tbh_inicio') && $request->filled('tbh_final')) {
            $tbh_inicio = $request->input('tbh_inicio');
            $tbh_fin = $request->input('tbh_final');
            $metslcb->whereBetween('tbh', [$tbh_inicio, $tbh_fin]);
        } elseif ($request->filled('tbh')) {
            $metslcb->where('tbh', $request->input('tbh'));
        }

        if ($request->filled('qfe')) {
            $qfe = $request->input('qfe');
            $metslcb->where('qfe', 'LIKE', '%'.$qfe.'%');
        }
        

        if ($request->filled('qnh')) {
            $qnh = $request->input('qnh');
            $metslcb->where('qnh', 'LIKE', '%'.$qnh.'%');
        }
    

        if ($request->filled('notas')) {
            $metslcb->where('notas', 'like', '%'.$request->input('notas').'%');
        }
    
        $metslcb = $metslcb->paginate(1000);
    
        return view('metSLCB.index' , compact('metslcb')) ;
        
        
        
/*                 // Definir la cantidad de registros a seleccionar en cada iteración
                $limit = 117880;

                // Obtener el número total de registros a importar
                $total = Speciality::count();
        
                // Determinar la cantidad de iteraciones necesarias
                $iterations = ceil($total/$limit);
        
                // Realizar la importación de los datos en pequeños lotes
                for ($i = 0; $i < $iterations; $i++) {
                  // Seleccionar los registros en un lote de $limit
                  $specialities = Speciality::offset($i * $limit)
                          ->limit($limit)
                          ->get();
          
                  // Realizar la importación de los datos
                  foreach ($specialities as $speciality) {
                    // Código para importar los datos
                  }
                }
                
                return view('specialities.index' , compact('specialities')) ; */
    }
   
    public function create()
    {
        return view('metSLCB.create');
    }

    public function sendData(Request $request)
    {
        $rules = [
            'oaci' => 'required|min:4'
        ];
        $messages = [
            'oaci.required' => 'La sigla OACI es obligatoria',
            'oaci.min' => 'La sigla OACI debe tener 4 caracteres'
        ];
        $this->validate($request, $rules, $messages);
        

        $metslcb = new Metslcb();

        $metslcb-> fecha = $request->input('fecha');
        $metslcb-> gg = $request->input('gg');
        $metslcb-> oaci = $request->input('oaci');
        $metslcb-> dd = $request->input('dd');
        $metslcb-> ff = $request->input('ff');
        $metslcb-> fmfm = $request->input('fmfm');
        $metslcb-> vvvv = $request->input('vvvv');
        $metslcb-> dv = $request->input('dv');
        $metslcb-> ww = $request->input('ww');
        $metslcb-> ww1 = $request->input('ww1');        
        $metslcb-> www = $request->input('www');
        $metslcb-> ns1 = $request->input('ns1');
        $metslcb-> hhh1 = $request->input('hhh1');
        $metslcb-> cbtcu1 = $request->input('cbtcu1');
        $metslcb-> ns2 = $request->input('ns2');
        $metslcb-> hhh2 = $request->input('hhh2');
        $metslcb-> cbtcu2 = $request->input('cbtcu2');
        $metslcb-> ns3 = $request->input('ns3');
        $metslcb-> hhh3 = $request->input('hhh3');
        $metslcb-> cbtcu3= $request->input('cbtcu3');
        $metslcb-> ns4 = $request->input('ns4');
        $metslcb-> hhh4 = $request->input('hhh4');
        $metslcb-> tt = $request->input('tt');
        $metslcb-> tbh = $request->input('tbh');
        $metslcb-> td = $request->input('td');
        $metslcb-> qfe = $request->input('qfe');
        $metslcb-> qnh = $request->input('qnh');
        $metslcb-> pulg_hg = $request->input('pulg_hg');
        $metslcb-> uuu = $request->input('uuu');
        $metslcb-> notas = $request->input('notas');
        $metslcb->save();

        $notification = 'El registro se ha creado correctamente.';

        return redirect('/metslcb')->with(compact('notification'));
    }

    public function edit(Metslcb $metslcb)
    {

        return view('metslcb.edit', compact('metslcb'));
    }

    public function update(Request $request, Metslcb $metslcb)
    {
        $rules =[
            'oaci' => 'required|min:4'
        ];
        $messages =[
            'oaci.required' => 'La sigla OACI es obligatoria',
             'oaci.min' =>'La sigla OACI debe tener 4 caracteres.'
        ];

        $this->validate($request, $rules, $messages);

        $metslcb-> fecha = $request->input('fecha');
        $metslcb-> gg = $request->input('gg');
        $metslcb-> oaci = $request->input('oaci');
        $metslcb-> dd = $request->input('dd');
        $metslcb-> ff = $request->input('ff');
        $metslcb-> fmfm = $request->input('fmfm');
        $metslcb-> vvvv = $request->input('vvvv');
        $metslcb-> dv = $request->input('dv');
        $metslcb-> ww = $request->input('ww');
        $metslcb-> ww1 = $request->input('ww1');        
        $metslcb-> www = $request->input('www');
        $metslcb-> ns1 = $request->input('ns1');
        $metslcb-> hhh1 = $request->input('hhh1');
        $metslcb-> cbtcu1 = $request->input('cbtcu1');
        $metslcb-> ns2 = $request->input('ns2');
        $metslcb-> hhh2 = $request->input('hhh2');
        $metslcb-> cbtcu2 = $request->input('cbtcu2');
        $metslcb-> ns3 = $request->input('ns3');
        $metslcb-> hhh3 = $request->input('hhh3');
        $metslcb-> cbtcu3= $request->input('cbtcu3');
        $metslcb-> ns4 = $request->input('ns4');
        $metslcb-> hhh4 = $request->input('hhh4');
        $metslcb-> tt = $request->input('tt');
        $metslcb-> tbh = $request->input('tbh');
        $metslcb-> td = $request->input('td');
        $metslcb-> qfe = $request->input('qfe');
        $metslcb-> qnh = $request->input('qnh');
        $metslcb-> pulg_hg = $request->input('pulg_hg');
        $metslcb-> uuu = $request->input('uuu');
        $metslcb-> notas = $request->input('notas');

        $metslcb->save();

        $notification = 'El registro se ha actualizado correctamente.';

        return redirect('/metslcb')->with(compact('notification'));
    
    }

    public function destroy(Metslcb $metslcb)
    {
        $deleteName = $metslcb->oaci;
        $deleteid = $metslcb->id;

        $metslcb->delete('/metslcb');

        $notification = 'El registro '. $deleteid .' '. $deleteName .' se ha eliminado';
    
        return redirect('/metslcb')->with(compact('notification'));
    }
    
}
