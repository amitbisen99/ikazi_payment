<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use DB ;
class Payment extends Model
{
    public $table  = 'payments';
    /**
     * The attributes that are mass assignable.
     *  
     * @var array
     */
    protected $fillable = ['invoice_id','payment_mode_id','amount','payment_ref','provider_amount','provider_amount_ref','commission_percent','commission_amount','commission_ref','commission_status_id','payment_date'];
}
	