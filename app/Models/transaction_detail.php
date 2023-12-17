<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaction_detail extends Model
{
    use HasFactory;

    protected $table = 'transaction_detail';
    protected $primaryKey = 'tsc_td_id';
    protected $fillable = ['tsc_td_quantity',
                            'tsc_td_pricequantity',
                            'service_svc_id',
                            'transaction_tsc_id',];

    public function transaction(){
        return $this->belongsTo(transaction::class, 'transaction_tsc_id', 'tsc_id');
    }

    public function service(){
        return $this->belongsTo(service::class, 'service_svc_id', 'svc_id');
    }
}
