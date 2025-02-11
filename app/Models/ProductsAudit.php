<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductsAudit extends Model
{

    protected $table = 'products_audit';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'action',
        'product_id',
        'changes',
    ];

}
