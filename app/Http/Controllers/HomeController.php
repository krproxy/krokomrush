<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use krproxy\excurso\Models\ExExcursion;

class HomeController extends Controller
{

    public function welcome()
    {
//        $excursions = ExExcursion::all();
        $excursions = ExExcursion::where('isNext', true)->get();


        return view('welcome', ['currentPage' => 'main', 'excursions' => $excursions]);
    }

    public function welcomePOST(Request $request)
    {
        $this->validate($request, [
            'bla' => 'required|integer',
        ]);

        return view('welcome');
    }
}
