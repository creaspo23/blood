<?php


namespace App\Http\Services;


use App\Models\Donation;
use App\Models\Kid;
use App\Models\Order;
use App\Models\Polycythemia;

class ProcessableServices
{
    public static function get ($request) {
        $processable = '';
        if ($request->has('order_id')) {
            $order = Order::findOrFail($request->order_id);
            $processable = $order;
        }

        if ($request->has('donation_id')) {
            $donation = Donation::findOrFail($request->donation_id);
            $processable = $donation;
        }
        if ($request->has('polycythemias_id')) {
            $polycythemia = Polycythemia::findOrFail($request->polycythemias_id);
            $processable = $polycythemia;
        }
        if ($request->has('kid_id')) {
            $kid = Kid::findOrFail($request->kid_id);
            $processable = $kid;
        }
        if ($request->has('mother_id')) {
            $kid = Kid::findOrFail($request->mother_id);
            $processable = $kid;
        }
        // dd($processable);
        return $processable;
    }

}
