<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Services\OrderBloodServices;
use App\Http\Services\PeopleServices;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with(['person'])->get();
        $test = [
            'bloodTest',
            'doctorTest',
            'viralTest',
        ];

        $type = 'order';

        return view('all-orders', compact('orders', 'test', 'type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return mixed
     */
    public function create()
    {
        return view('add-order');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateOrderRequest  $request
     * @return mixed
     */
    public function store(CreateOrderRequest $request)
    {
       
        return DB::transaction(function () use ($request) {

            $person = PeopleServices::store($request);

            if ($person->orders()->where('status', 'الانتظار')->count() > 0) {
                $person->orders()->where('status', 'الانتظار')->get();
                OrderBloodServices::store($person->orders()->where('status', 'الانتظار')->first(), $request->bloods);

                return $person->orders()->where('status', 'الانتظار')->update($request->only(['unit', 'type', 'hospital', 'diagnosis']));
            }

            $order = Order::create(array_merge(['person_id' => $person->id], $request->validated()));

            OrderBloodServices::store($order, $request->bloods);

            return true;
        });
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateOrderRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        DB::transaction(function () use ($request, $order) {
            $order->update($request->validated());
            OrderBloodServices::store($order, $request->bloods);
        });
        return redirect()->back()->with(['success', 'تم تعديل الطلب']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function cancel($id)
    {

        $order = Order::findOrFail($id);
        $order->update(['status' => 'ملغي']);
        return redirect()->back()->with(['success'=> 'تم الفاء الطلب بنجاح']);
    }
}
