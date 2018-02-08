<?php
/**
 * Created by PhpStorm.
 * User: raccoon
 * Date: 16.01.18
 * Time: 23:55
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class TopLink extends Model
{
    /** @var string */
    protected $table = 'top_link';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image', 'title', 'description', 'link_title', 'link'
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
