<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    use HasFactory;

    protected $table = 'service';
    protected $primaryKey = 'svc_id';
    protected $fillable = ['svc_name',
                            'svc_priceperkilo',
                            'created_at',
                            'updated_at',
                            'created_at',
                            'updated_at'];
    
    public function transaction_detail(){
        return $this->hasMany(transaction_detail::class, 'service_svc_id');
    }
}
