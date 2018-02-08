<?php
/**
 * Created by PhpStorm.
 * User: raccoon
 * Date: 21.01.18
 * Time: 18:37
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    /** @var string */
    protected $table = 'trainer';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'photo_link', 'description', 'link_title', 'link'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at','deleted'
    ];
}
