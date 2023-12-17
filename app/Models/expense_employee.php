<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class expense_employee extends Model
{
    use HasFactory;
    protected $table = 'expense_employee';
    protected $primaryKey = 'id';
    protected $fillable = ['exp_id', 'epl_id',
    'created_at',
    'updated_at'];

}
