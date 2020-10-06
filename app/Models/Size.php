<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Size extends Model
{
    const PRIMARY_KEY_TABLE = 'id';

    use SoftDeletes;
    protected $table = 'sizes';
    protected $guarded = [];

    protected $casts = [
        'created_at' => 'datetime:d/m/Y',
        'updated_at' => 'datetime:d/m/Y',
        'deleted_at' => 'datetime:d/m/Y'
    ];

    public function billDetails()
    {
        return $this->hasMany(BillDetail::class, BillDetail::FOREIGN_KEY_SIZE, self::PRIMARY_KEY_TABLE);
    }
}
