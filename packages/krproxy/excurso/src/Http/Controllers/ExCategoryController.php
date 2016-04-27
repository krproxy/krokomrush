<?php
/**
 * Created by PhpStorm.
 * User: totorro
 * Date: 31.03.16
 * Time: 17:47
 */
namespace krproxy\excurso\Http\Controllers;

use App\Http\Controllers\Controller;
use krproxy\excurso\Models\ExCategory as Category;

class ExCategoryController extends Controller
{
    public function show($slug = 'root')
    {
        // Если запрос пришел не на конкретную категорию, а на раздел категорий, отдаем коллекцию категорий верхнего уровня
        if ($slug == 'root')
        {
            $nodes= Category::whereIsRoot()->get();
            $many = true;
            return view('excurso::category_show', compact('nodes','many'));
        }
        // Иначе отдаем запрашиваемую категорию c товарами
        if ( $node = Category::where('slug',$slug)->first()) {

            $products=Category::find($node->id)->products()->paginate(Category::$productPerPage);
            $many = false;
            return view('excurso::category_show', compact('node','many','products'));
        }
        // ну или посылаем на 404 если нет такой
        abort(404);
    }
}