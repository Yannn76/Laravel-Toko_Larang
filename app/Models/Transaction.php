<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Customer;
use App\Models\DetailTransactions;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';

    protected $primaryKey = 'nota';

    protected $keyType = 'string';

    protected $fillable = [

        'nota',
        'id_user',
        'id_customer',
        'date',
  

    ];
    public function customer() {
        return $this->hasOne(Customer::class, 'id', 'id_customer');
    }
    public function detail() {
        return $this->hasMany(DetailTransaction::class, 'nota', 'nota');
    }
    public function user() {
        return $this->hasOne(User::class, 'id', 'id_user');
    }
}
