<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notice;
use App\ImageNotice;


class NoticeController extends Controller
{
    public function listnotice()
    {
        return view('notice.listnotice');
    }

    public function create()
    {
        return view('notice.create');
    }

    public function save_notice(Request $request)
    {
        $validatedData = $this->validate($request, [
            'title' => 'required|min:5',
            'subtitle' => 'required',
            'description' => 'required',
            'cover_image' => 'required|mimes:jpeg,jpg,png',
            'start_date_publication' => 'required',
            'end_date_publication' => 'required',
        ]);

        $notice = new Notice();
        $user = \Auth::user();
        $notice->title = $request->input('title');
        $notice->subtitle = $request->input('subtitle');
        $notice->description = $request->input('description');
        //Subir cover_image
        $cover_image = $request->file('cover_image');
        if ($cover_image) {
            $cover_image_path = time() . $cover_image->getClientOriginalName();
            \Storage::disk('images_notices')->put($cover_image_path, \File::get($cover_image));
            $notice->cover_image = $cover_image_path;
        }

        $notice->user = $user->user;
        $notice->start_date_publication = $request->input('start_date_publication');
        $notice->end_date_publication = $request->input('end_date_publication');
        $notice->save();

        $images = $request->file('image');
        if ($images) {
            foreach ($images as $image){
                $images_path = time() . $image->getClientOriginalName();
                \Storage::disk('images_notices')->put($images_path, \File::get($image));
                //$notice->cover_image = $images_path;
                $this->save_images_notices($images_path, $notice);
            }
        }

        return redirect()->route('view_list_notice')->with(array(
            'message' => 'Noticia creada correctamente!!'
        ));

    }

    public function save_images_notices($image, $id_notice)
    {
        ImageNotice::create([
            'notice' => $id_notice->id,
            'image' => $image
        ]);
    }
}
