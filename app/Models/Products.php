<?php

namespace App\Models;

use App\Enum\ProductsEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    use SoftDeletes;

    protected $table = 'products';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $casts = [
        'status' => ProductsEnum::class,
    ];
}
