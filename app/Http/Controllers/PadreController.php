<?php

namespace App\Http\Controllers;

use App\Padre;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PadreController extends Controller
{
    public function list_father()
    {
        $fathers = Padre::orderBy('names', 'asc')->get();

        $queries = array(
            'fathers' => $fathers
        );
        return view('admin.father.index', $queries);
    }

    public function create_father()
    {
        return view('admin.father.create');
    }

    public function save_create_father(Request $request)
    {
        $validatedData = $this->validate($request, [
            'curp' => 'required|min:18|unique:padres|alpha_num',
            'names' => 'required|min:3',
            'paterno' => 'required|min:3',
            'telephone1' => 'required|min:10|numeric',
        ]);

        $father = new Padre();
        $father->curp = $request->input('curp');
        $father->names = $request->input('names');
        $father->paterno = $request->input('paterno');
        $father->materno = $request->input('materno');
        $father->telephone1 = $request->input('telephone1');
        $father->telephone2 = $request->input('telephone2');
        $father->save();

        return redirect()->route('view_list_father')->with(array(
            'message' => 'Padre registrado correctamente!!'
        ));
    }

    public function update_father($curp)
    {
        $father = Padre::where('curp', '=', $curp)->firstOrFail();

        $queries = array(
            'father' => $father,
        );
        return view('admin.father.update', $queries);
    }

    public function save_update_father(Request $request, $curp)
    {
        $father = Padre::where('curp', '=', $curp)->firstOrFail();
        //Validacion de los inputs
        $validatedData = \Validator::make($request->all(), [
            'curp' => [
                'required',
                'min:18',
                'alpha_num',
                Rule::unique('padres')->ignore($father->curp, 'curp')
            ],
            'names' => 'required|min:3',
            'paterno' => 'required|min:3',
            'telephone1' => 'required|min:10|numeric',
        ]);
        //Verifica si hay algun error en la validación
        if ($validatedData->fails()) {
            return redirect()->back()->withInput()->withErrors($validatedData->errors());
        }
        $father->curp = $request->input('curp');
        $father->names = $request->input('names');
        $father->paterno = $request->input('paterno');
        $father->materno = $request->input('materno');
        $father->telephone1 = $request->input('telephone1');
        $father->telephone2 = $request->input('telephone2');
        $father->update();

        return redirect()->route('view_list_father')->with(array(
            'message' => 'Datos del padre actualizado correctamente!!'
        ));
    }
}
