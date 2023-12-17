<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    use HasFactory;

    protected $table = 'transaction';
    protected $primaryKey = 'tsc_id';
    protected $fillable = ['tsc_status',
                            'tsc_tglmasuk',
                            'tsc_tglselesai',
                            'tsc_tglambil',
                            'tsc_totalprice',
                            'customer_cst_id'];

    public function customer(){
        return $this->belongsTo(customer::class, 'customer_cst_id', 'cst_id');
    }

    public function transaction_detail(){
        return $this->hasMany(transaction_detail::class, 'transaction_tsc_id');
    }

    public function employee(){
        return $this->belongsToMany(employee::class, 'employee_transaction', 'epl_id', 'tsc_id');
    }

    public function payment(){
        return $this->hasOne(payment::class, 'transaction_tsc_id');
    }

    public function delivery(){
        return $this->hasOne(delivery::class, 'transaction_tsc_id');
    }
}
