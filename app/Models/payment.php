<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    use HasFactory;

    protected $table = 'payment';
    protected $primaryKey = 'pm_id';
    protected $fillable = ['pm_method',
                            'pm_date',
                            'pm_amount',
                            'pm_discount',
                            'transaction_tsc_id',
                            ];
    
    public function transaction(){
        return $this->belongsTo(transaction::class, 'transaction_tsc_id', 'tsc_id');
    }

}
