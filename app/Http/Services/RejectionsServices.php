<?php


namespace App\Http\Services;


use App\Models\Donation;
use Illuminate\Support\Facades\DB;
use Mpdf\Tag\Tr;

class RejectionsServices
{
    public static function checkForRejection($processable, $stage)
    {
        if ($stage == 'فحص الدم') {



            if ($processable->bloodTest->HB > 16) {

                return self::reject($processable, $stage, ['زيادة في معدل الهيموقلبين']);
            }

            if ($processable->bloodTest->HB < 12) {
                return self::reject($processable, $stage, ['نقصان في معدل الهيموقلبين']);
            }
            if ($processable->order_id) {
                return self::canDonate($processable);
            }
        }

        if ($stage == 'فحص الطبيب') {

            if ($processable->doctorTest->weight < 50) {
                return self::reject($processable, $stage, ['نقصان الوزن']);
            }

            if ($processable->doctorTest->others) {

                return self::reject($processable, $stage, $processable->doctorTest->others);
            }
        }

        if ($stage == 'الفحص الفيروسي') {
            if ($processable->viralTest->result) {
                if ($processable->viralTest->result == ",") {
                    return;
                }

                $processable->person->update(['blocked' => 1]);

                return self::reject($processable, $stage, $processable->viralTest->result);
            }
        }
    }

    public static function reject($donation, $stage, $reasons)
    {

        return DB::transaction(function () use ($donation, $stage, $reasons) {

            // $type = gettype($reasons);
            // if ($type != "array") {
            //     $reasons = explode(',', $reasons);
            // }
            // dd($donation);/
                    // dd($reasons);
            $donation->rejection()->create([
                'stage' => $stage,
                'reasons' =>json_encode($reasons,true)
            ]);

            $donation->update(['status' => 'مرفوض']);
            return $reasons;
        });
    }

    private static function canDonate($processable)
    {
        $negatives = ['A-', 'B-', 'AB-', 'O-'];

        if (in_array($processable->order->person->blood_group, $negatives) and !in_array($processable->person->blood_group, $negatives)) {
            return self::reject($processable, 'فحص الدم', ['اختلاف الذمرة']);
        }
    }
}
