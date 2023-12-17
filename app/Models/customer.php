<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class customer extends Model implements Authenticatable
{
    use HasFactory;

    protected $table = 'customer';
    protected $primaryKey = 'cst_id';
    protected $fillable = ['cst_name',
                            'cst_age',
                            'cst_address',
                            'cst_phonenumber',
                            'cst_gender',
                            'cst_uname',
                            'cst_password'];

    public function transaction(){
        return $this->hasMany(transaction::class, 'transaction_tsc_id');
    }

    public function getAuthIdentifierName()
    {
        return 'cst_id';
    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->cst_id;
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->cst_password;
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
