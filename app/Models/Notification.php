<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use DB ;
class Notification extends Model
{
    public $table  = 'notifications';
    /**
     * The attributes that are mass assignable.
     *  
     * @var array
     */
    protected $fillable = ['from_id','to_id','status_id','notification','notification_date','redirect_to'];
}