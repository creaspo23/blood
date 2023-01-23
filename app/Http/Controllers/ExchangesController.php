<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateExchangeRequest;
use App\Http\Services\ExchangeServices;
use App\Models\Derivative;
use App\Models\Exchange;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class ExchangesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return mixed
     */
    public function create($order)
    {

        $order = Order::where('id', '=', $order)->with(['person'])->first();


        $derivatives = Derivative::where('exchanged', 0)->whereDate('expire_date', '>', now())->with('withdraw.processable.person')->get();

        return view('exchanges', ['derivatives' => $derivatives, 'order' => $order]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateExchangeRequest $request)
    {

        DB::transaction(function () use ($request) {

            $exchange = Exchange::create([
                'order_id' => $request->order_id,
                'type' => $request->type,
                'employee_id' => auth()->user()->employee->id,
            ]);
            $order = Order::find($request->order_id)->first();
            $order->update(["status" => "مكتمل"]);
            ExchangeServices::bottles($exchange, $request->bottles);

            if ($request->type == "خارجي") {
                ExchangeServices::external($exchange, $request);
            }
        });
        return redirect()->back()->with(['success' => 'تمت العملية بنجاح']);
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
}
