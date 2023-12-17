<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class delivery extends Model
{
    use HasFactory;

    protected $table = 'delivery';
    protected $primaryKey ='div_id';
    protected $fillable = ['div_date',
                            'div_price',
                            'div_address',
                            'transaction_tsc_id',
                            'employee_epl_id',
                            ];
    
    public function transaction(){
        return $this->belongsTo(transaction::class, 'transaction_tsc_id', 'tsc_id');
    }

    public function employee(){
        return $this->belongsTo(employee::class, 'employee_epl_id', 'epl_id');
    }
}
