<?php


namespace App\Http\Services;
use App\Models\Order;


class OrderBloodServices
{
    public static function store (Order $order, $bloods) {
        // dd($bloods);
        
        foreach ($bloods as $blood) {

            if ($blood['quantity'] > 0) {
                $order->bloods()->updateOrCreate(['blood_type' => $blood['blood_type']], $blood);
            }
        }
        return true;
    }

}
