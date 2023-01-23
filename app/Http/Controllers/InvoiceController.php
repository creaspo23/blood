<?php

namespace App\Http\Controllers;

use App\Models\BloodTest;
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
        $viralDiseases = ViralTest::pluck('result');
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
        $viralDiseases = ViralTest::pluck('result');
        $HCV = 0;
        $HBV = 0;
        $HIV = 0;
        $SYPHILIS = 0;
        $list = [];

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
        $lowHemoglobin = BloodTest::where('HB', '<', 13)->count();
        $polcythemiaLowHemoglobin = Polycythemia::where('HB', '<', 13)->count();
        $lowHemoglobin = $lowHemoglobin + $polcythemiaLowHemoglobin;
        $ExclusionFromTheDoctor = DoctorTest::where('others', '!=', null)->count();
        // $Decent=Donation::where
        return view('invoices.doners-with-draw-invoice', compact('donerCount', 'lowHemoglobin', 'ExclusionFromTheDoctor', 'lowHemoglobin', 'HCV', 'HBV', 'HIV', 'SYPHILIS'));
    }

    public function ExclusionFromTheDoctor()
    {
        return view('invoices.exclusion-from-the-doctor');
    }

    public function polcythemiasrReport()
    {
        $economyIn = Polycythemia::where('type', 'اقتصادي')->count();
        $economyOut = Polycythemia::where('type', 'تامين')->count();
        $economyInBYMonth = Polycythemia::where('type', 'اقتصادي')->whereMonth('created_at', now()->month)->count();
        $economyOutBYMonth = Polycythemia::where('type', 'تامين')->whereMonth('created_at', now()->month)->count();
        return view('invoices.polcythemias-report', compact('economyIn', 'economyOut','economyInBYMonth','economyOutBYMonth'));
    }

    public function BloodDischarged()
    {
        
        return view('invoices.BloodDischarged');
    }
}
