<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\NoticeIsAuthorized;
use App\Carrousel;
use App\ImageNotice;

class CobatabController extends Controller
{
    public function index()
    {
        $dia_actual = date('Y-m-d');
        $notices = NoticeIsAuthorized::join('notices', 'notice_is_authorize.notice', '=', 'notices.id')
            ->where('is_authorized', '=', '1')
            ->whereDate('start_date_publication', '<=', $dia_actual)
            ->whereDate('end_date_publication', '>=', $dia_actual)
            ->get();
        $carousels = Carrousel::where('is_active', '=', '1')->get();
        $queries = array(
            'notices' => $notices,
            'carousels' => $carousels,
        );
                        //Nombre de la carpeta.nombre del archivo
        return view('home.home-public', $queries);
    }

    public function view_notice($title_notice)
    {
        $dia_actual = date('Y-m-d');

        $notices = NoticeIsAuthorized::join('notices', 'notice_is_authorize.notice', '=', 'notices.id')
            ->where('is_authorized', '=', '1')
            ->whereDate('start_date_publication', '<=', $dia_actual)
            ->whereDate('end_date_publication', '>=', $dia_actual)
            ->where('title', '=', $title_notice)
            ->firstOrFail();
        $images_notices = ImageNotice::where('notice', '=', $notices->id)->get();
        $queries = array(
            'notice' => $notices,
            'images' => $images_notices
        );
        return view('notice.notice_public', $queries);
    }
}
