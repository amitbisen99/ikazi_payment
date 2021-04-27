<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use DB ;
class Invoice extends Model
{
    public $table  = 'invoices';
    /**
     * The attributes that are mass assignable.
     *  
     * @var array
     */
    protected $fillable = ['service_details','job_id','invoice_date','invoice_status_id','subtotal','tax','total','note','pay_key','rating','review'];
}