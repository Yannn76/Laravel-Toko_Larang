<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_Transaction extends Model
{
    use HasFactory;

    protected $table = 'detail_transaction';

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
}
