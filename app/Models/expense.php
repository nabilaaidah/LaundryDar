<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class expense extends Model
{
    use HasFactory;
    protected $table = 'expense';
    protected $primaryKey = 'exp_id';
    protected $fillable = ['exp_type',
                            'exp_date',
                            'exp_totalexpense',
                            ];

    public function employee(){
        return $this->belongsToMany(employee::class, 'expense_employee', 'exp_id', 'epl_id');
    }
}
