<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrUpdateDonationRequest;
use App\Http\Services\PeopleServices;
use App\Models\Donation;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DonationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donations = Donation::with(['person', 'order'])->latest()->get();


        
        $test = ['bloodTest', 'doctorTest', 'viralTest',];

        $type = 'donation';

        return view('donors', compact('donations', 'test', 'type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return mixed
     */
    public function create()
    {

        $orders = Order::where('status', 'الانتظار')->whereHas('person', function ($q) {
            $q->where('blood_group', '!=', '');
        })->with('person:id,name')->get();

        return view('add-donation', ['orders' => $orders]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateOrUpdateDonationRequest $request)
    {

        return DB::transaction(function () use ($request) {
            $person = PeopleServices::store($request);
            if ($person->blocked) {
                return redirect()->back()->with(['error' => 'هذا الشخص محظور من التبرع']);
            }

            Donation::updateORCreate(['id' => $request->id], [
                'person_id' => $person->id,
                'order_id' => $request->order_id
            ]);
            return redirect()->back()->with(['success' => 'تمت العمليه بنجاح']);
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cancel($id)
    {
        $donation = Donation::findOrFail($id);

        $donation->update(['status' => 'ملغي']);

        return redirect()->back()->with(['success' => 'تم إلغاء التبرع بنجاح']);
    }

    public function search(Request $request)
    {
        // // dd($request->all());
        // $data= Donation::Where('name', 'like', "%$request->name%")
        // ->orwhere('blood_group',$request->group)
        // ->with(['orders','donations:created_at,status'])->get();

        // return view('donors',compact('data'));
            
    }
}
