<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee extends Model implements Authenticatable
{
    use HasFactory;

    protected $table = 'employee';
    protected $primaryKey = 'epl_id';
    protected $fillable = ['epl_name',
                            'epl_jobtitle',
                            'epl_phonenumber',
                            'epl_gender',
                            'epl_salary',
                            'epl_age',
                            'epl_workstatus',
                            'created_at',
                            'updated_at',
                            'epl_uname',
                            'epl_password'];

    public function expense(){
        return $this->belongsToMany(expense::class, 'expense_employee', 'exp_id', 'epl_id');
    }

    public function transaction(){
        return $this->belongsToMany(transaction::class, 'employee_transaction', 'epl_id', 'tsc_id');
    }

    public function delivery(){
        return $this->hasMany(delivery::class, 'employee_epl_id');
    }

    public function getAuthIdentifierName()
    {
        return 'epl_id';
    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->epl_id;
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->epl_password;
    }

    /**
     * Get the token value for the "remember me" session.
     *
     * @return string|null
     */
    public function getRememberToken()
    {
        return $this->remember_token;
    }

    /**
     * Set the token value for the "remember me" session.
     *
     * @param  string|null  $value
     * @return void
     */
    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return 'remember_token';
    }
}
