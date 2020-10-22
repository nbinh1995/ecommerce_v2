<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bill extends Model
{
    const PRIMARY_KEY_TABLE = 'id';
    const FOREIGN_KEY_USER = 'user_id';


    use SoftDeletes;
    protected $table = 'bills';
    protected $guarded = [];

    protected $casts = [
        'created_at' => 'datetime:d/m/Y',
        'updated_at' => 'datetime:d/m/Y',
        'deleted_at' => 'datetime:d/m/Y'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, self::FOREIGN_KEY_USER, 'id');
    }

    public function billDetails()
    {
        return $this->hasMany(BillDetail::class, BillDetail::FOREIGN_KEY_BILL, self::PRIMARY_KEY_TABLE);
    }

    public static function getBillsPerOneDay()
    {
        return self::groupBy('date')
            ->selectRaw('DATE(bills.created_at) AS date,count(bills.id) AS amount_bills, SUM(bills.total_bill) AS total_bills')
            ->orderBy('date', 'DESC')
            ->get();
    }

    public static function getBillsByUserId($userID)
    {
        return self::where('user_id', $userID)->orderBy('created_at', 'DESC')->get();
    }
}
