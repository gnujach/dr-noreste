<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
// use Illuminate\Support\Facades\Auth;
use App\Http\Resources\CasoCollection;
use App\Http\Resources\Caso as CasoResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\Caso;
use Inertia;
use Redirect;

class CasoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia\Inertia::render(
            'Casos/ListCasos',
            [
                'casos' => new CasoCollection(Caso::orderBy('id', 'desc')->with(['cct', 'genero', 'rol', 'tipo'])->paginate(config('openlink.perpage'))),
                'can'   => [
                    // 'managerUser' => auth()->user()->can('managerUser')
                    // 'managerUser' => request()->user()->can('viewAny', User::class)
                    'managerUser' => true
                ]
            ]
        );
    }


    /**
     * Display Casos only user->profile->municipio_id
     */

    public function indexMpio()
    {
        // dd(Auth::user()->profile()->id);
        // dd(request()->user()->municipio->num_municipio);
        // dd(request()->user()->role);
        $casos = Caso::whereHas('cct', function ($query) {
            $query->where('clave_municipio',  request()->user()->municipio->num_municipio);
        })->with('cct', 'genero', 'rol', 'tipo')->paginate(config('openlink.perpage'));
        // dd($casos);
        return Inertia\Inertia::render(
            'Casos/ListCasos',
            [
                'casos' => new CasoCollection($casos),
                'can'   => [
                    // 'managerUser' => auth()->user()->can('managerUser')
                    // 'managerUser' => request()->user()->can('viewAny', User::class)
                    'managerUser' => true
                ]
            ]
        );
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles =  DB::select('SELECT id, nombre from rols');
        $tipos =  DB::select('SELECT id, nombre from tipos');
        $generos =  DB::select('SELECT id, nombre from generos');
        return Inertia\Inertia::render(
            'Casos/Create',
            ['roles' => $roles, 'tipos' => $tipos, 'generos' => $generos],
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validator = Validator::make($request->all(),
        $this->validate(
            $request,
            [
                'nombre_pila' => ['required', 'max:50'],
                'ap1' => ['required', 'max:50'],
                'ap2' => ['required', 'max:50'],
                'cct_id' => ['required', Rule::exists('ccts', 'id')],
                'rol_id' => ['required', Rule::exists('rols', 'id')],
                'genero_id' => ['required', Rule::exists('generos', 'id')],
                'tipo_id' => ['required', Rule::exists('tipos', 'id')],
                'tel_contacto' => ['required', 'max:10', 'min:10'],
                'tel_escuela' => ['required', 'max:10', 'min:10'],
                'nombre_reporta' => ['required', 'max:50'],
                'observaciones_reporta' => ['required', 'max:250'],
            ]
        );

        $caso = Caso::create([
            'uuid' => Str::uuid(),
            'user_id' =>  $request->user()->id,
            'nombre_pila' => $request->input('nombre_pila'),
            'ap1' => $request->input('ap1'),
            'ap2' => $request->input('ap2'),
            'cct_id' => $request->input('cct_id'),
            'rol_id' => $request->input('rol_id'),
            'genero_id' => $request->input('genero_id'),
            'tipo_id' => $request->input('tipo_id'),
            'has_prueba' => $request->input('has_prueba'),
            'tel_contacto' => $request->input('tel_contacto'),
            'tel_escuela' => $request->input('tel_escuela'),
            'nombre_reporta' => $request->input('nombre_reporta'),
            'observaciones_reporta' => $request->input('observaciones_reporta'),
        ]);
        request()->session()->flash('flash.banner', 'Registro Guardado');
        request()->session()->flash('flash.bannerStyle', 'success');
        return Redirect::route('dashboard')->with('success', 'Registro Guardado!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Caso  $caso
     * @return \Illuminate\Http\Response
     */
    public function show(Caso $caso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Caso  $caso
     * @return \Illuminate\Http\Response
     */
    public function edit(Caso $caso)
    {
        $diagnosticos =  DB::select('SELECT id, nombre from diagnosticos');
        return Inertia\Inertia::render(
            'Casos/EditCaso',
            [
                'caso' => new CasoResource($caso->load('cct', 'tipo', 'genero', 'rol')),
                'diagnosticos' => $diagnosticos
                // 'url' => URL::to('/')
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Caso  $caso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Caso $caso)
    {
        Validator::make($request->all(), [
            'observaciones_enlace' => ['nullable', 'string', 'max:255'],
            'has_dictamen' => ['nullable', 'boolean'],
            'diagnostico_id' => ['nullable', Rule::exists('diagnosticos', 'id')],
        ])->validate();
        $caso->update([
            'observaciones_enlace' => $request->input('observaciones_enlace'),
            'has_dictamen' => $request->input('has_dictamen'),
            'diagnostico_id' => $request->input('diagnostico_id'),
        ]);
        request()->session()->flash('flash.banner', 'Registro Actualizado');
        request()->session()->flash('flash.bannerStyle', 'success');
        return Redirect::back()->with('success', 'Caso actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Caso  $caso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Caso $caso)
    {
        //
    }
}
