<?php
/**
 * Created by PhpStorm.
 * User: totorro
 * Date: 04.04.16
 * Time: 22:11
 */
namespace krproxy\excurso\Http\Controllers;

use App\Http\Controllers\Controller;
use krproxy\excurso\Models\ExCategory as Category;
use krproxy\excurso\Models\ExExcursion as Excursion;

class ExExcursionController extends Controller
{

    public function show($slug, $categoryid = null)
    {
        if ($excursion = Excursion::where('slug', $slug)->first()) {
            $parentCategores = $excursion->categories;
            $pathCategory = Category::find($categoryid);
            return view('excurso::excursion_show', compact('excursion', 'parentCategores', 'pathCategory'));
        }
        abort(404);
    }
}