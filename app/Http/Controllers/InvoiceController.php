<?php

namespace App\Http\Controllers;

use App\Models\BloodTest;
use App\Models\BloodWithdraw;
use App\Models\DoctorTest;
use App\Models\Donation;
use App\Models\Order;
use App\Models\Polycythemia;
use App\Models\ViralTest;
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

    public function viralDiseases()
    {
        $viralDiseases = ViralTest::where('result', '!=', null)->pluck('result');
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

    public function donersWithDraw()
    {
        $viralDiseases = ViralTest::where('result', '!=', null)->pluck('result');

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

    public function ExclusionFromTheDoctor()
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
        $doctorTests = DoctorTest::where('others', '!=', null)->pluck('others');
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

    public function polcythemiasrReport()
    {
        $economyIn = Polycythemia::where('type', 'اقتصادي')->count();
        $economyOut = Polycythemia::where('type', 'تامين')->count();
        $economyInBYMonth = Polycythemia::where('type', 'اقتصادي')->whereMonth('created_at', now()->month)->count();
        $economyOutBYMonth = Polycythemia::where('type', 'تامين')->whereMonth('created_at', now()->month)->count();
        return view('invoices.polcythemias-report', compact('economyIn', 'economyOut', 'economyInBYMonth', 'economyOutBYMonth'));
    }

    public function BloodDischarged()
    {
        
        return view('invoices.BloodDischarged');
    }
}
