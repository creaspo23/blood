<?php

namespace App\Http\Controllers;

use App\Models\OrderBlood;

class OrderBloodsController extends Controller
{
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(OrderBlood $blood)
    {
        $blood->delete();
        return redirect()->back()->with(['success', 'تم الحذف']);
    }
}
