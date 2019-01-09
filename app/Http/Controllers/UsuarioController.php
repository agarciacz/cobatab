<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{

    public function list_user()
    {
        if (\Auth::user()->category == 'A') {
            $users = User::paginate(10);
            return view('admin.user.index', array(
                'users' => $users
            ));
        } else {
            return redirect()->route('home');
        }
    }

    public function create_user()
    {
        if (\Auth::user()->category == 'A') {
            return view('auth.register');
        } else {
            return redirect()->route('home');
        }
    }

    public function save_create_user(Request $request)
    {
        if (empty($request->input('user'))) {
            $fail = 'El usuario es requerido';
        } elseif (empty($request->input('name'))) {
            $fail = 'El nombre es requerido';
        } elseif (empty($request->input('paterno'))) {
            $fail = 'El apellido paterno es requerido';
        } elseif (empty($request->input('materno'))) {
            $fail = 'El apellido materno es requerido';
        } elseif (empty($request->input('password'))) {
            $fail = 'La contraseña es requerida';
        } elseif (empty($request->input('password_confirmation'))) {
            $fail = 'La contraseña repetida es requerida';
        } elseif (empty($request->input('category'))) {
            $fail = 'Es requerido asignar una categoria al usuario';
        } elseif (empty($request->input('email'))) {
            $fail = 'El email es requerido';
        } elseif ($request->input('password') !== $request->input('password_confirmation')) {
            $fail = 'la contraseña y la repetición de la contraseña no son lo mismo';
        } elseif (
            !empty($request->input('user')) &&
            !empty($request->input('name')) &&
            !empty($request->input('paterno')) &&
            !empty($request->input('materno')) &&
            !empty($request->input('password')) &&
            !empty($request->input('password_confirmation')) &&
            !empty($request->input('email')) &&
            !empty($request->input('category')) &&
            $request->input('password') === $request->input('password_confirmation')
        ) {
            $user = new User();
            $user->user = $request->input('user');
            $user->name = $request->input('name');
            $user->paterno = $request->input('paterno');
            $user->materno = $request->input('materno');
            $pwd = Hash::make($request->input('password'));
            $user->password = $pwd;
            $user->email = $request->input('email');
            $user->category = $request->input('category');
            //Comprobar usuario si esta duplicado
            $isset_user = User::where('user', '=', $request->input('user'))->first();
            $contador = $isset_user;
            if ($contador == 0) {
                $user->save();
                return redirect()->route('view_list_user')->with(array(
                    'message' => 'Usuario registrado correctamente!!'
                ));
            } else {
                return redirect()->route('view_list_user')->with(array(
                    'message' => 'Error al guardar!!'
                ));
            }
        }

    }

    public function editar($idusuario)
    {
        if (\Auth::user()->role == 3) return redirect()->route('home');
        $user = User::findOrFail($idusuario);

        return view('usuario.editar', array(
            'user' => $user
        ));
    }

    public function update($idusuario, Request $request)
    {
        $validar = $this->validate($request, [
            'nombre' => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'status' => 'required',
            'permiso' => 'required'
        ]);

        $user = User::findOrFail($idusuario);
        $user->nombreUsuario = $request->input('nombre');
        $user->aPUsuario = $request->input('apellido_paterno');
        $user->aMUsuario = $request->input('apellido_materno');
        $user->statusUsuario = $request->input('status');
        $user->role = $request->input('permiso');
        $user->update();

        return redirect()->route('viewUsuario')->with(array(
            'message' => 'Usuario actualizado correctamente'
        ));
    }

    public function updatecontraseña($idusuario, Request $request)
    {
        if (empty($request->input('contraseña'))) {
            $fail = 'La contraseña es requerida';
        } elseif (empty($request->input('confirmar_contraseña'))) {
            $fail = 'Es necesario confirmar la contraseña';
        } elseif ($request->input('contraseña') !== $request->input('confirmar_contraseña')) {
            $fail = 'la contraseña y la confirmación de la contraseña son diferentes';
        } elseif (
            !empty($request->input('contraseña')) &&
            !empty($request->input('confirmar_contraseña')) &&
            $request->input('contraseña') === $request->input('confirmar_contraseña')
        ) {
            $user = User::findOrFail($idusuario);
            $pwd = Hash::make($request->input('contraseña'));
            $user->password = $pwd;
            $user->update();

            if ($user->update()) {
                $resp = 'Contraseña actualizada correctamente';
            }
        }

        if (isset($fail)) {
            return Response()->json("<div class= 'alert alert-danger'><strong> Error!! </strong>" . $fail . "</div>");
        }
        if (isset($resp)) {
            return Response()->json("<div class= 'alert alert-success'><strong> Bien hecho!! </strong>" . $resp . "</div>");
        }
        sleep(10);
    }

    public function delete($idusuario)
    {
        $registro = Salida::where('idUsuario', '=', $idusuario)->count();
        $Entrada = DetalleEntrada::where('id_user', '=', $idusuario)->count();
        if ($registro >= 1) {
            return redirect()->route('viewUsuario')->with(array(
                'message' => 'No se puede eliminar el usuario, porque esta relacionado con un proceso interno del sistema'
            ));
        } elseif ($Entrada >= 1) {
            return redirect()->route('viewUsuario')->with(array(
                'message' => 'No se puede eliminar el usuario, porque esta relacionado con un proceso interno del sistema'
            ));
        } else {
            $usuario = User::findOrFail($idusuario);
            $usuario->delete();
            return redirect()->route('viewUsuario')->with(array(
                'message' => 'Usuario Eliminado correctamente'
            ));
        }
    }
}
