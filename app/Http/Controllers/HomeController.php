<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Kid;
use App\Models\Order;
use App\Models\Polycythemia;
use App\Models\ViralDisease;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $list = ['A+' => 0, 'A-' => 0, 'B+' => 0, 'B-' => 0, 'AB+' => 0, 'AB-' => 0, 'O+' => 0, 'O-' => 0];


        $orderIds = DB::table('exchanges')->where('type', 'داخلي')->pluck('order_id');

        foreach ($orderIds as $orderId) {
            $order = Order::where('id', $orderId)->first();
            if ($order->person->blood_group == "A+") {
                $list['A+']++;
            } elseif ($order->person->blood_group == "A-") {
                $list['A-']++;
            } elseif ($order->person->blood_group == "B+") {
                $list['B+']++;
            } elseif ($order->person->blood_group == "B-") {
                $list['B-']++;
            } elseif ($order->person->blood_group == "AB-") {
                $list['AB-']++;
            } elseif ($order->person->blood_group == "AB+") {
                $list['AB+']++;
            } elseif ($order->person->blood_group == "O-") {
                $list['O-']++;
            } elseif ($order->person->blood_group == "O+") {
                $list['O+']++;
            }
        }
        return view('index', compact('list'));
    }

    public function getData($test, $type, $id)
    {
        $case = '';
        $tests = [
            'bloodTest' => 'فحص الدم',
            'doctorTest' => 'فحص الطبيب ',
            'viralTest' => 'الفحص الفيروسي',
            "IctTest" => 'IctTest',
            'DctTest' => 'DctTest',
        ];

        if ($type == 'donation') {
            $case = Donation::where('id', $id)->with(['person', 'bloodTest', 'doctorTest', 'viralTest'])->firstOrFail();
            if ($case->rejection) {
                if ($case->rejection->stage != $tests[$test]) {
                    //todo: list page
                    return redirect()->back()->with(['error' => "المتبرع تم رفضة في مرحلة " . $case->rejection->stage]);
                }
            }
        }

        if ($type == 'order') {
            $case = Order::where('id', $id)->with(['person', 'bloodTest', 'doctorTest', 'viralTest'])->firstOrFail();
        }
        if ($type == 'polcythemia') {
            $case = Polycythemia::where('id', $id)->with(['person', 'bloodTest', 'doctorTest'])->firstOrFail();
        }
        //  dd($id);
        if ($type == 'kid') {
            $case = Kid::where('id', $id)->with(['person', 'bloodTest', 'ictTest', 'dctTest'])->firstOrFail();
        }
        // dd($case);

        if ($type == "mother") {
            $case = Kid::where('mother_id', $id)->with(['person', 'bloodTest', 'ictTest', 'dctTest'])->firstOrFail();
        }


        //                                
        // dd($case->person);
        $diseases = '';
        if ($test == 'viralTest') {
            $diseases = ViralDisease::all();
        }

        return view($test, ['case' => $case, 'type' => $type, 'diseases' => $diseases]);
    }
}
