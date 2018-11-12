<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Storage;
use App\Carrousel;

class CarrouselController extends Controller
{
    public function list_carousel()
    {
        $carousels = Carrousel::orderBy('created_at', 'asc')->get();

        $queries = array(
            'carousels' => $carousels,
        );

        return view('admin.carousel.index', $queries);
    }

    public function getImages($filename)
    {
        $file = Storage::disk('carousel')->get($filename);
        return new Response($file, 200);
    }

    public function create_carousel()
    {
        return view('admin.carousel.create');
    }

    public function save_create_carousel(Request $request)
    {
        $validatedData = $this->validate($request, [
            'title' => 'required|min:5',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png',
        ]);

        $carousel = new Carrousel();
        $carousel->title = $request->input('title');
        $carousel->description = $request->input('description');
        //Subir image
        $image = $request->file('image');
        if ($image) {
            $image_path = time() . $image->getClientOriginalName();
            Storage::disk('carousel')->put($image_path, \File::get($image));
            $carousel->image = $image_path;
        }
        if ($request->input('is_active') == "") {
            $carousel->is_active = 0;
        } else {
            $carousel->is_active = $request->input('is_active');
        }
        $carousel->save();

        return redirect()->route('view_list_carousel')->with(array(
            'message' => 'Noticia creada correctamente!!'
        ));
    }

    public function update_carousel($id)
    {
        $carousel = Carrousel::where('id', '=', $id)->firstOrFail();

        $queries = array(
            'carousel' => $carousel,
        );

        return view('admin.carousel.update', $queries);
    }

    public function save_update_carousel($id, Request $request)
    {
        //Validacion de los inputs
        $validatedData = $this->validate($request, [
            'title' => 'required|min:5',
            'description' => 'required',
            'image' => 'mimes:jpeg,jpg,png',
        ]);

        $carousel = Carrousel::findOrFail($id);
        $carousel->title = $request->input('title');
        $carousel->description = $request->input('description');
        //Subir cover_image
        $image = $request->file('image');
        if ($image) {
            //Eliminar fichero
            Storage::disk('carousel')->delete($carousel->image);
            //Guardar nuevo fichero
            $image_path = time() . $image->getClientOriginalName();
            Storage::disk('carousel')->put($image_path, \File::get($image));
            $carousel->image = $image_path;
        }
        //Fin de subir cover image
        if ($request->input('is_active') == "") {
            $carousel->is_active = 0;
        } else {
            $carousel->is_active = $request->input('is_active');
        }
        $carousel->update();

        return redirect()->route('view_list_carousel')->with(array(
            'message' => 'Carousel actualizado correctamente!!'
        ));

    }
}
