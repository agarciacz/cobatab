<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Notice;
use App\ImageNotice;
use App\NoticeIsAuthorized;


class NoticeController extends Controller
{
    public function listnotice()
    {
        $notices = Notice::orderBy('created_at', 'asc')->get();

        $queries = array(
            'notices' => $notices,
        );

        return view('notice.listnotice', $queries);
    }

    public function create()
    {
        return view('notice.create');
    }

    public function save_notice(Request $request)
    {
        $validatedData = $this->validate($request, [
            'title' => 'required|min:5|unique:notices',
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
            foreach ($images as $image) {
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

    public function getImages($filename)
    {
        $file = Storage::disk('images_notices')->get($filename);
        return new Response($file, 200);
    }

    public function authorized_notice($title_notice)
    {
        $notices = Notice::where('title', '=', $title_notice)->firstOrFail();
        $images_notices = ImageNotice::where('notice', '=', $notices->id)->get();

        $queries = array(
            'notice' => $notices,
            'images' => $images_notices
        );

        return view('notice.authorized_notice', $queries);
    }

    public function save_authorized_notice(Request $request)
    {
        $validatedData = $this->validate($request, [
            'is_authorized' => 'required',
        ]);

        $id_notice = $request->input('notice');
        $notice_is_authorized = NoticeIsAuthorized::where('notice', '=', $id_notice)
            ->where(function ($query) {
                $query->where('is_authorized', '=', '0')
                    ->orWhere('is_authorized', '=', '1');
            })
            ->first();
        if ($notice_is_authorized == false) {
            $authorized = new NoticeIsAuthorized();
            $user = \Auth::user();
            $authorized->notice = $request->input('notice');
            $authorized->user = $user->user;
            $authorized->is_authorized = $request->input('is_authorized');
            $authorized->save();
        } elseif ($notice_is_authorized == true) {
            $authorized = NoticeIsAuthorized::where('notice', '=', $id_notice)->first();
            $user = \Auth::user();
            $authorized->user = $user->user;
            $authorized->is_authorized = $request->input('is_authorized');
            $authorized->save();
        }


        if ($authorized->is_authorized == 1) {
            $message = "Noticia Aprobada";
        } elseif ($authorized->is_authorized == 0) {
            $message = "Noticia Rechazada";
        }

        return redirect()->route('view_list_notice')->with(array(
            'message' => $message
        ));

    }

    public function update_notice ($title_notice){
        $notices = Notice::where('title', '=', $title_notice)->firstOrFail();
        $images_notices = ImageNotice::where('notice', '=', $notices->id)->get();

        $queries = array(
            'notice' => $notices,
            'images' => $images_notices
        );

        return view('admin.notice.update', $queries);
    }

}
