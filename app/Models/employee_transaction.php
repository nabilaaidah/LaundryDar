<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee_transaction extends Model
{
    use HasFactory;

    protected $table = 'employee_transaction';
    protected $primaryKey = 'id';
    protected $fillable = ['epl_id', 'tsc_id',
    'created_at',
    'updated_at'];
}
