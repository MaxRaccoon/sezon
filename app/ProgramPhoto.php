<?php
/**
 * Created by PhpStorm.
 * User: raccoon
 * Date: 22.01.18
 * Time: 11:42
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramPhoto extends Model
{
    /** @var string */
    protected $table = 'program_photo';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'program_id', 'photo_link', 'photo_thumb_link'
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