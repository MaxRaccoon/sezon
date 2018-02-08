<?php
/**
 * Created by PhpStorm.
 * User: raccoon
 * Date: 18.01.18
 * Time: 12:46
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    /** @var string */
    protected $table = 'gallery';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'group_name', 'image_link', 'image_thumb_link', 'title', 'description'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at'
    ];
}