<?php
/**
 * Created by PhpStorm.
 * User: totorro
 * Date: 16.04.16
 * Time: 19:01
 */
namespace krproxy\excurso\Models;

use Illuminate\Database\Eloquent\Model;

class ExOrder extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'category_id', 'cost', 'note', 'description', 'status', 'artikul', 'views', 'show', 'complected', 'complect_id'
    ];

}
