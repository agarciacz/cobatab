<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoryMailbox;
use App\Mailbox;

class MailboxController extends Controller
{
    //Función para visualizar y enviar un correo
    function create_mailbox()
    {
        $categories_mails = CategoryMailbox::orderBy('category_mailbox', 'asc')->get();

        $queries = array(
            'categories_mails' => $categories_mails
        );

        return view('public.mailbox', $queries);
    }

    //Función para guardar datos del formulario del buzón
    function save_create_mailbox(Request $request)
    {
        $validatedData = $this->validate($request, [
            'name' => 'min:3',
            'mail' => 'email',
            'telephone' => 'nullable|numeric',
            'category_mailbox' => 'required',
            'description' => 'required',
        ]);

        $mailbox = new Mailbox();
        $mailbox->name = $request->input('name');
        $mailbox->mail = $request->input('mail');
        $mailbox->telephone = $request->input('telephone');
        $mailbox->category_mailbox = $request->input('category_mailbox');
        $mailbox->description = $request->input('description');
        $mailbox->save();

        return redirect()->route('view_create_mailbox_cobatab')->with(array(
            'message' => 'Mensaje enviado!!'
        ));
    }
}
