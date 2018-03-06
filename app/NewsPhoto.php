<?php
/**
 * Created by PhpStorm.
 * User: raccoon
 * Date: 06.03.18
 * Time: 12:07
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsPhoto extends Model
{
    /** @var string */
    protected $table = 'news_photo';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'news_id', 'photo_link', 'photo_thumb_link'
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