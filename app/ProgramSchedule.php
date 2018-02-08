<?php
/**
 * Created by PhpStorm.
 * User: raccoon
 * Date: 21.01.18
 * Time: 23:50
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramSchedule extends Model
{
    public static $days = [
      1 => 'Понедельник',
      2 => 'Вторник',
      3 => 'Среда',
      4 => 'Четверг',
      5 => 'Пятница',
      6 => 'Субботу',
      7 => 'Воскресенье'
    ];
    /** @var string */
    protected $table = 'program_schedule';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'day_of_weak ', 'program_id', 'start_time'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];
}