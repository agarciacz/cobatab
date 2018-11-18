<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumno;
use Illuminate\Validation\Rule;

class AlumnoController extends Controller
{
    function list_student()
    {
        $students = Alumno::orderBy('names', 'asc')->get();

        $queries = array(
            'students' => $students
        );

        return view('admin.alumno.index', $queries);
    }

    function create_student()
    {
        return view('admin.alumno.create');
    }

    function save_create_student(Request $request)
    {
        $validatedData = $this->validate($request, [
            'matricula' => 'required|min:5|unique:alumnos',
            'names' => 'required|min:3',
            'paterno' => 'required|min:3',
            'sex' => 'required',
        ]);

        $student = new Alumno();
        $student->matricula = $request->input('matricula');
        $student->names = $request->input('names');
        $student->paterno = $request->input('paterno');
        $student->materno = $request->input('materno');
        $student->sex = $request->input('sex');
        $student->save();

        return redirect()->route('view_list_student')->with(array(
            'message' => 'Alumno registrado correctamente!!'
        ));
    }

    public function update_student($matricula)
    {
        $student = Alumno::where('matricula', '=', $matricula)->firstOrFail();

        $queries = array(
            'student' => $student,
        );

        return view('admin.alumno.update', $queries);
    }

    public function save_update_student(Request $request, $matricula)
    {

        $student = Alumno::where('matricula', '=', $matricula)->firstOrFail();
        //Validacion de los inputs
        $validatedData = \Validator::make($request->all(), [
            'matricula' => [
                'required',
                'min:5',
                Rule::unique('alumnos')->ignore($student->matricula, 'matricula')],
            'names' => 'required|min:3',
            'paterno' => 'required|min:3',
            'sex' => 'required',
        ]);
        //Verifica si hay algun error en la validación
        if ($validatedData->fails()) {
            return redirect()->back()->withInput()->withErrors($validatedData->errors());
        }
        $student->matricula = $request->input('matricula');
        $student->names = $request->input('names');
        $student->paterno = $request->input('paterno');
        $student->materno = $request->input('materno');
        $student->sex = $request->input('sex');
        $student->update();

        return redirect()->route('view_list_student')->with(array(
            'message' => 'Datos del alumno actualizado correctamente!!'
        ));
    }
}
