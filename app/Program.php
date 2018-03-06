<?php
/**
 * Created by PhpStorm.
 * User: raccoon
 * Date: 21.01.18
 * Time: 23:47
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    /** @var string */
    protected $table = 'program';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'trainer_id ', 'title', 'description', 'duration', 'is_training'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at', 'deleted'
    ];

    public function trainer()
    {
        return $this->belongsTo('App\Trainer', 'trainer_id');
    }

    public function photo()
    {
        return $this->hasMany('App\ProgramPhoto', 'program_id');
    }

    public function schedule()
    {
        return $this->hasMany('App\ProgramSchedule', 'program_id');
    }
}
