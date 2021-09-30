<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserCollection;
use App\Http\Resources\User as UsuarioResource;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Rules\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Inertia;
use Redirect;

class UserController extends Controller
{
    public function index()
    {
        // $this->authorize(User::class, 'managerUser');
        return Inertia\Inertia::render(
            'Users/ListUsers',
            [
                'users' => new UserCollection(User::orderBy('id', 'desc')->paginate(config('openlink.perpage'))),
                'can'   => [
                    // 'managerUser' => auth()->user()->can('managerUser')
                    // 'managerUser' => request()->user()->can('viewAny', User::class)
                    'managerUser' => true
                ]
            ]
        );
    }
    public function create()
    {
        // $this->authorize(User::class, 'managerUser');
        $municipios =  DB::select('SELECT id, nombre from municipios');
        $puestos =  DB::select('SELECT id, nombre from puestos');
        return Inertia\Inertia::render(
            'Users/CreateUser',
            ['municipios' => $municipios, 'puestos' => $puestos]
        );
    }
    public function store(Request $request)
    {
        // $this->authorize(User::class, 'managerUser');
        Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role' => ['required', 'string'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
            'municipio_id' => ['required', Rule::exists('municipios', 'id')],
            'puesto_id' => ['required', Rule::exists('puestos', 'id')],
        ])->validate();
        $newUser = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role' => $request->input('role'),
            'password' => Hash::make($request['password']),
        ]);
        $newUser->profile()->create(
            [
                'municipio_id' => $request->input('municipio_id'),
                'puesto_id' => $request->input('puesto_id'),
            ]
        );

        request()->session()->flash('flash.banner', 'Alta de cuenta');
        request()->session()->flash('flash.bannerStyle', 'success');
        return Redirect::route('admin.usuarios/');
    }
    /** update user */
    public function edit(User $usuario)
    {
        return Inertia\Inertia::render(
            'Users/UpdateUser',
            [
                'usuario' => new UsuarioResource($usuario),
            ]
        );
    }

    protected function passwordRules()
    {
        return ['required', 'string', new Password, 'confirmed'];
    }
}
