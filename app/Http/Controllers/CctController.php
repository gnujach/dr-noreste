<?php

namespace App\Http\Controllers;

use App\Models\Cct;
use Illuminate\Http\Request;
use \App\Http\Resources\Cct as CctResource;
use Illuminate\Http\Response;
use Inertia;

class CctController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function findcct(Request $request)
    {
        if (request()->ajax()) {
            $cct = Cct::where('cct', request()->cct)->get();
            if (!$cct->isEmpty())
                return response()->json(['cct' => $cct]);
            else
                return response()->json(['cct' => false]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cct  $cct
     * @return \Illuminate\Http\Response
     */
    public function show(cct $cct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cct  $cct
     * @return \Illuminate\Http\Response
     */
    public function edit(cct $cct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cct  $cct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cct $cct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cct  $cct
     * @return \Illuminate\Http\Response
     */
    public function destroy(cct $cct)
    {
        //
    }
}
