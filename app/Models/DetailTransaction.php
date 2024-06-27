<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Stuff;
use App\Models\Transaction;

class DetailTransaction extends Model
{
    use HasFactory;

    protected $table = 'detailtransactions';

    protected $primaryKey = 'id';

    protected $keyType = 'integer';

    protected $fillable = [

        'id',
        'nota',
        'price',
        'unit',
        'status',
        'id_category',

    ];
    public function stuff() {
        return $this->hasOne(Stuff::class, 'id', 'id_stuff');
    }
    public function transaction() {
        return $this->hasMany(Transaction::class, 'nota', 'nota');
    }
}
