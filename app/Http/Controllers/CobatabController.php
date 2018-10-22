<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\NoticeIsAuthorized;

class CobatabController extends Controller
{
    public function index()
    {
        $dia_actual = date('Y-m-d');

        $notices = NoticeIsAuthorized::join('notices', 'notice_is_authorize.notice', '=', 'notices.id')
            ->where('is_authorized', '=', '1')
            ->whereDate('start_date_publication','<=', $dia_actual)
            ->whereDate('end_date_publication', '>=',$dia_actual)
            ->get();
        $queries = array(
            'notices' => $notices,
        );

        return view('home.home-public', $queries);
    }
}
