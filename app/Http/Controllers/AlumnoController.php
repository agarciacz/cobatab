<?php

namespace App\Http\Controllers;

use App\Padre;
use Illuminate\Http\Request;
use App\Alumno;
use App\AlumnoPadre;
use Illuminate\Validation\Rule;

class AlumnoController extends Controller
{
    //Función para listar estudiantes
    function list_student()
    {
        $students = Alumno::orderBy('names', 'asc')->get();

        $queries = array(
            'students' => $students
        );

        return view('admin.alumno.index', $queries);
    }

    //Función para visualizar el formulario para registrar estudiantes
    function create_student()
    {
        return view('admin.alumno.create');
    }

    //Función para guardar datos del formulario de estudiantes
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

    //Función para visualizar el formulario para actualizar datos de estudiantes
    public function update_student($matricula)
    {
        $student = Alumno::where('matricula', '=', $matricula)->firstOrFail();
        $parents = Padre::orderBy('names', 'asc')->get();
        $parents_linked = AlumnoPadre::where('alumno', '=', $matricula)->get();

        $queries = array(
            'student' => $student,
            'parents' => $parents,
            'parents_linked' => $parents_linked

        );

        return view('admin.alumno.update', $queries);
    }

    //Función para actualizar de los datos del estudiantes
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

    //Funcion para vincular alumnos con padres
    public function save_link_students_witch_parents(Request $request, $matricula)
    {
        $validatedData = $this->validate($request, [
            'padre' => 'required',
        ]);

        $parents = $request->input('padre');
        foreach ($parents as $father) {
            AlumnoPadre::create([
                'alumno' => $matricula,
                'padre' => $father
            ]);
        }

        return redirect()->back()->with(array(
            'message' => 'Proceso exitoso!!'
        ));
    }
    //Funcion para eliminar el vinculo de estudiante con padres
    public function delete_link_students_witch_parents($id)
    {
        $link_parents = AlumnoPadre::find($id);
        $link_parents->delete();
        return redirect()->back();

    }
    //Funcion para visualizar los datos del alumno
    public function information_student($matricula)
    {
        $student = Alumno::where('matricula', '=', $matricula)->firstOrFail();
        $parents_linked = AlumnoPadre::where('alumno', '=', $matricula)->get();

        $queries = array(
            'student' => $student,
            'parents_linked' => $parents_linked
        );

        return view('admin.alumno.information', $queries);
    }

    public function active_is_tutor ($id) {
        $link_parents = AlumnoPadre::find($id);
        $link_parents->is_tutor = "1";
        $link_parents->update();
        return redirect()->back();
    }

    public function disable_is_tutor ($id) {
        $link_parents = AlumnoPadre::find($id);
        $link_parents->is_tutor = "0";
        $link_parents->update();
        return redirect()->back();
    }
}
