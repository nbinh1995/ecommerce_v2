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

    public static function createBill($info_bill, $carts_list)
    {
        $bill = self::create($info_bill);

        foreach ($carts_list as $cart) {
            $info_bill_detail = [
                'bill_id' => $bill->id,
                'product_id' => $cart->product_id,
                'price' => $cart->product_price,
                'amount' => $cart->product_amount,
                'total_detail' => $cart->product_total,
            ];
            $bill_detail = BillDetail::create($info_bill_detail);
            $attrs_id = explode(',', $cart->product_attrs);
            foreach ($attrs_id as $attr_id) {
                BillDetailProductAttr::create([
                    'bill_detail_id' => $bill_detail->id,
                    'attribute_value_id' => $attr_id
                ]);
            }
        }
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


    public static function getBillsByDay($date)
    {
        return self::whereDate('created_at', $date)->orderBy('id')->get();
    }

    public function getBillDetail()
    {
        return $this->load(['billDetails.product', 'billDetails.billDetailProductAttr'])->billDetails;
    }
}
