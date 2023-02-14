<?php

namespace App\Http\Controllers;

use App\Models\BloodTest;
use App\Models\BloodWithdraw;
use App\Models\DoctorTest;
use App\Models\Donation;
use App\Models\Investigation;
use App\Models\Kid;
use App\Models\Order;
use App\Models\Polycythemia;
use App\Models\ViralTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class InvoiceController extends Controller
{
    public function banckInvoice()
    {
        $pdf = PDF::loadView('invoices.bank-invoice');
        return $pdf->stream('document.pdf');
    }

    public function donatiosCheck()
    {
        // $pdf = PDF::loadView('invoices.donatios-check');
        return view('invoices.donatios-check');

        // return $pdf->stream('document.pdf');
    }

    public function viralDiseases(Request $request)
    {

        $viralDiseases = ViralTest::where('result', '!=', null)->whereBetween('created_at', [$request->form_date, $request->to_date])->pluck('result');
        $HCV = 0;
        $HBV = 0;
        $HIV = 0;
        $SYPHILIS = 0;
        $NHCV = 0;
        $NHBV = 0;
        $NHIV = 0;
        $NSYPHILIS = 0;
        $list = [];

        $index = 0;
        foreach ($viralDiseases as $value) {
            $index++;
            $vals = json_decode($value);
            foreach ($vals as $val) {
                if ($val == 'HIV') {
                    $HIV++;
                } elseif ($val == 'Hcv') {
                    $HCV++;
                } elseif ($val == 'HBV') {
                    $HBV++;
                } elseif ($val == 'SYPHILIS') {
                    $SYPHILIS++;
                }
            }
        }
        // dd($x);

        //  foreach($viralDiseases as $key=>$value) {
        //  }

        return view('invoices.donersCheck', compact('HCV', 'HBV', 'HIV', 'SYPHILIS', 'index'));
    }

    public function printOrder($id)
    {
        $order = Order::where('id', $id)->with(['donations', 'bloods', 'person'])->first();
        $quantity = $order->bloods->pluck('quantity');
        $donation = Donation::where('order_id', $id)->first();
        $barcode = (string)$order->id;
        return view('invoices.order-invoice', compact('order', 'barcode', 'quantity'));
        // $pdf = PDF::loadView('invoices.order-invoice', compact('order', 'quantity','donation'));
        // return $pdf->stream('document.pdf');
    }

    public function printPolcythemias($id)
    {
        $polcythemia = Polycythemia::where('id', $id)->with(['bloodTest', 'doctorTest', 'bloodWithdraw', 'person'])->first();

        // $pdf = PDF::loadView('invoices.Polcythemias-invoice', compact('polcythemia'));
        // return $pdf->stream('document.pdf');
        $barcode = (string)$polcythemia->id;

        return view('invoices.Polcythemias-invoice', compact('polcythemia', 'barcode'));
    }

    public function donersWithDraw(Request $request)
    {
        $viralDiseases = ViralTest::where('result', '!=', null)->whereBetween('created_at', [$request->form_date, $request->to_date])->pluck('result');

        $HCV = 0;
        $HBV = 0;
        $HIV = 0;
        $SYPHILIS = 0;

        foreach ($viralDiseases as $value) {
            $vals = json_decode($value);
            foreach ($vals as $val) {
                if ($val == 'HIV') {
                    $HIV++;
                } elseif ($val == 'Hcv') {
                    $HCV++;
                } elseif ($val == 'HBV') {
                    $HBV++;
                } elseif ($val == 'SYPHILIS') {
                    $SYPHILIS++;
                }
            }
        }
        $donerCount = Donation::count();
        $unCompleteWithDraw = BloodWithdraw::where('faild', 1)->count();
        $Decent = BloodWithdraw::where('faild', 0)->count();
        $lowHemoglobin = BloodTest::where('HB', '<', 13)->count();
        $polcythemiaLowHemoglobin = Polycythemia::where('HB', '<', 13)->count();
        $lowHemoglobin = $lowHemoglobin + $polcythemiaLowHemoglobin;
        $ExclusionFromTheDoctor = DoctorTest::where('others', '!=', null)->count();
        return view('invoices.doners-with-draw-invoice', compact('donerCount', 'Decent', 'unCompleteWithDraw', 'lowHemoglobin', 'ExclusionFromTheDoctor', 'lowHemoglobin', 'HCV', 'HBV', 'HIV', 'SYPHILIS'));
    }

    public function ExclusionFromTheDoctor(Request $request)
    {
        $permanentTreatments = 0;
        $chronicDiseases = 0;
        $HHB = 0;
        $LHB = 0;
        $highBlood = 0;
        $lowBlood = 0;
        $others = 0;
        $usesAntibiotics = 0;
        $lowWeight = 0;
        $lessThan18 = 0;
        $ToothExtraction = 0;
        $doctorTests = DoctorTest::where('others', '!=', null)->whereBetween('created_at', [$request->form_date, $request->to_date])->pluck('others');
        $count = DoctorTest::where('others', '=', null)->count();
        foreach ($doctorTests as $doctorTest) {
            $vals = json_decode($doctorTest);
            foreach ($vals as $val) {
                if ($val == 'علاجات مستديمه') {
                    $permanentTreatments++;
                } elseif ($val == 'امراض مزمنه') {
                    $chronicDiseases++;
                } elseif ($val == 'هيمقلوبين مرتفع') {
                    $HHB++;
                } elseif ($val == 'هيمقلوبين منخفض') {
                    $LHB++;
                } elseif ($val == 'ضغط دم مرتفع') {
                    $highBlood++;
                } elseif ($val == 'ضغط دم منخفض') {
                    $lowBlood++;
                } elseif ($val == 'يستعمل مضادي حيوي') {
                    $usesAntibiotics++;
                } elseif ($val == 'قليل الوزن') {
                    $lowWeight++;
                } elseif ($val == 'العمر اقل من 18') {
                    $lessThan18++;
                } elseif ($val == 'خلع ضرس') {
                    $ToothExtraction++;
                } elseif ($val == 'اسباب اخري') {
                    $others++;
                }
            }
        }
        return view('invoices.exclusion-from-the-doctor', compact('count', 'highBlood', 'lowBlood', 'ToothExtraction', 'lowWeight', 'permanentTreatments', 'chronicDiseases', 'HHB', 'LHB', 'others', 'lessThan18', 'usesAntibiotics'));
    }

    public function polcythemiasrReport(Request $request)
    {
        $economyIn = Polycythemia::where('type', 'اقتصادي')->whereBetween('created_at', [$request->form_date, $request->to_date])->count();
        $economyOut = Polycythemia::where('type', 'تامين')->whereBetween('created_at', [$request->form_date, $request->to_date])->count();
        $economyInBYMonth = Polycythemia::where('type', 'اقتصادي')->whereMonth('created_at', now()->month)->count();
        $economyOutBYMonth = Polycythemia::where('type', 'تامين')->whereMonth('created_at', now()->month)->count();
        return view('invoices.polcythemias-report', compact('economyIn', 'economyOut', 'economyInBYMonth', 'economyOutBYMonth'));
    }

    public function BloodDischarged(Request $request)
    {
        $list = ['A+' => 0, 'A-' => 0, 'B+' => 0, 'B-' => 0, 'AB+' => 0, 'AB-' => 0, 'O+' => 0, 'O-' => 0];
        $unitsList = ['العناية المكثفة' => 0, 'العناية الحثيثة' => 0, 'الطوارئ' => 0, 'الولادة' => 0, 'الجراحة' => 0, 'الباطنية' => 0, 'الاطفال' => 0, 'النفسية' => 0, 'الشمالي' => 0, 'الغربي' => 0, 'الكلى' => 0, 'العظام' => 0, 'المسالك البولية' => 0, 'امراض الدم' => 0, 'الجلدية' => 0, 'الاذن والانف والحنجرة' => 0, 'اسر الضباط' => 0, 'جناح الضباط' => 0];
        $count = 0;
        $unitCount = 0;

        $orderIds = DB::table('exchanges')->where('type', 'داخلي')->whereBetween('created_at', [$request->form_date, $request->to_date])->pluck('order_id');

        foreach ($orderIds as $orderId) {
            $order = Order::where('id', $orderId)->first();
            if ($order->person->blood_group == "A+") {
                $list['A+']++;
                $count++;
            } elseif ($order->person->blood_group == "A-") {
                $list['A-']++;
                $count++;
            } elseif ($order->person->blood_group == "B+") {
                $list['B+']++;
                $count++;
            } elseif ($order->person->blood_group == "B-") {
                $list['B-']++;
                $count++;
            } elseif ($order->person->blood_group == "AB-") {
                $list['AB-']++;
                $count++;
            } elseif ($order->person->blood_group == "AB+") {
                $list['AB+']++;
                $count++;
            } elseif ($order->person->blood_group == "O-") {
                $list['O-']++;
                $count++;
            } elseif ($order->person->blood_group == "O+") {
                $list['O+']++;
                $count++;
            }
        }
        foreach ($orderIds as $orderId) {
            $order = Order::where('id', $orderId)->first();
            if ($order->unit == 'العناية المكثفة') {
                $unitsList['العناية المكثفة']++;
                $unitCount++;
            } elseif ($order->unit == 'العناية الحثيثة') {
                $unitsList['العناية الحثيثة']++;
                $unitCount++;
            } elseif ($order->unit == 'الطوارئ') {
                $unitsList['الطوارئ']++;
                $unitCount++;
            } elseif ($order->unit == 'الولادة') {
                $unitsList['الولادة']++;
                $unitCount++;
            } elseif ($order->unit == 'الجراحة') {
                $unitsList['الجراحة']++;
                $unitCount++;
            } elseif ($order->unit == 'الباطنية') {
                $unitsList['الباطنية']++;
                $unitCount++;
            } elseif ($order->unit == 'الاطفال') {
                $unitsList['الاطفال']++;
                $unitCount++;
            } elseif ($order->unit == 'النفسية') {
                $unitsList['النفسية']++;
                $unitCount++;
            } elseif ($order->unit == 'الشمالي') {
                $unitsList['الشمالي']++;
                $unitCount++;
            } elseif ($order->unit == 'الغربي') {
                $unitsList['الغربي']++;
                $unitCount++;
            } elseif ($order->unit == "الكلى") {
                $unitsList['الكلى']++;
                $unitCount++;
            } elseif ($order->unit == 'العظام') {
                $unitsList['العظام']++;
                $unitCount++;
            } elseif ($order->unit == 'المسالك البولية') {
                $unitsList['المسالك البولية']++;
                $unitCount++;
            } elseif ($order->unit == 'امراض الدم') {
                $unitsList['امراض الدم']++;
                $unitCount++;
            } elseif ($order->unit == 'الجلدية') {
                $unitsList['الجلدية']++;
                $unitCount++;
            } elseif ($order->unit == 'الاذن والانف والحنجرة') {
                $unitsList['الاذن والانف والحنجرة']++;
                $unitCount++;
            } elseif ($order->unit == 'اسر الضباط') {
                $unitsList['اسر الضباط']++;
                $unitCount++;
            } elseif ($order->unit == 'جناح الضباط') {
                $unitsList['جناح الضباط']++;
                $unitCount++;
            }
        }

        return view('invoices.BloodDischarged', compact('list', 'count', 'unitsList', 'unitCount'));
    }

    public function kidInvoice($id)
    {
        $kid = Kid::with(['person', 'bloodTest', 'motherBloodTest', 'ictTest', 'dctTest'])->find($id);

        $barcode = (string)$kid->id;
        return view('invoices.kidInvoice', compact('kid', 'barcode'));
    }

    public function investigationsInvoice($id)
    {
        $investigation = Investigation::find($id)->whereHas('tests', function ($query) {
            $query->whereNotNull('result');
        })->first();

        // dd($investigation);
        return view('invoices.investigationInvoice', compact('investigation'));
    }
}
