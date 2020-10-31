<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BillDetailProductAttr extends Model
{
    const FOREIGN_KEY_BILL_DETAIL = 'bill_detail_id';
    use SoftDeletes;
    protected $table = 'bill_detail_product_attr';
    protected $guarded = [];

    protected $casts = [
        'created_at' => 'datetime:d/m/Y',
        'updated_at' => 'datetime:d/m/Y',
        'deleted_at' => 'datetime:d/m/Y'
    ];
}
