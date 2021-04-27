<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use DB ;
class Job extends Model
{
    public $table  = 'jobs';
    /**
     * The attributes that are mass assignable.
     *  
     * @var array
     */

    protected $fillable = ['inquiry_id','job_date','job_status_id',];
}
