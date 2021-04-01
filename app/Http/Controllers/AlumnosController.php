<?php

namespace App\Http\Controllers;

use App\Models\Alumnos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlumnosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['alumnos']=Alumnos::paginate(7);

        return view('alumnos.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alumnos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$datosAlumno = request()->all();

        $datosAlumno = request()->except('_token');

        if($request->hasFile('stud_picture')){
            $datosAlumno['stud_picture']=$request->file('stud_picture')->store('uploads', 'public');
        }

        Alumnos::insert($datosAlumno);
        
        return redirect('alumnos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alumnos  $alumnos
     * @return \Illuminate\Http\Response
     */
    public function show(Alumnos $alumnos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alumnos  $alumnos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alumno = Alumnos::findOrFail($id);

        return view('alumnos.edit', compact('alumno'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alumnos  $alumnos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosAlumno = request()->except(['_token','_method']);

        if($request->hasFile('stud_picture')){

            $alumno = Alumnos::findOrFail($id);
            Storage::delete('public/'.$alumno->stud_picture);
            $datosAlumno['stud_picture']=$request->file('stud_picture')->store('uploads', 'public');
        }

        Alumnos::where('id','=',$id)->update($datosAlumno);

        $alumno = Alumnos::findOrFail($id);
        return view('alumnos.edit', compact('alumno'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alumnos  $alumnos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alumno = Alumnos::findOrFail($id);

        if(Storage::delete('public/'.$alumno->stud_picture)){

            Alumnos::destroy($id);
        }

        return redirect('alumnos');
    }
}
