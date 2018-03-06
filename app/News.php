<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    /** @var string */
    protected $table = 'news';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'published_dt', 'title', 'anons', 'content', 'is_action'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'deleted', 'created_at', 'updated_at',
    ];

    public function getPublishDate()
    {
        return new \DateTime($this->getAttribute('published_dt'));
    }

    public function photo()
    {
        return $this->hasMany('App\NewsPhoto', 'news_id');
    }
}
