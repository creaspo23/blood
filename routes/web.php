<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\DonationsController;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\BloodTestsController;
use App\Http\Controllers\DoctorTestsController;
use App\Http\Controllers\ViralTestsController;
use App\Http\Controllers\BloodWithdrawsController;
use App\Http\Controllers\DCTTestController;
use App\Http\Controllers\DerivativesController;
use App\Http\Controllers\ExchangesController;
use App\Http\Controllers\HomogeneityController;
use App\Http\Controllers\ICTTestController;
use App\Http\Controllers\ViralDiseasesController;
use App\Http\Controllers\KidsController;
use App\Http\Controllers\InvestigationsController;
use App\Http\Controllers\PolcythemiasController;
use App\Http\Controllers\InvoiceController;
use Illuminate\Support\Facades\Artisan;

// use App\Http\Controllers\PatientsController;
// use NunoMaduro\Collision\Adapters\Phpunit\State;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/states', function () {
//     return State::with('cities')->get();
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);


//Language Translation
Route::get('clear_cache', function () {

    Artisan::call('config:cache');

    dd("Cache is cleared");
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);

    Route::post('/formsubmit', [App\Http\Controllers\HomeController::class, 'FormSubmit'])->name('FormSubmit');

    Route::get('tests/{test}/{type}/{id}', [HomeController::class, 'getData'])->name("tests");

    Route::resource('employees', EmployeesController::class)->except(['destroy']);
    Route::get('homogeneity/{id}', [HomogeneityController::class, 'create'])->name('homogeneity.create');
    Route::post('homogeneity', [HomogeneityController::class, 'store'])->name('homogeneity.store');
    Route::put('updateStatus/{order}', [OrdersController::class, 'cancel'])->name('updateStatus');
    Route::resource('orders', OrdersController::class);
    Route::resource('people', PeopleController::class)->only('index');  //done
    Route::resource('doctorTest', DoctorTestsController::class);
    Route::resource('bloodTest', BloodTestsController::class);

    Route::resource('viralTest', ViralTestsController::class)->only(['store', 'create']);
    Route::resource('withdraw', BloodWithdrawsController::class);
    Route::get('withdraw/{type}/{id}', [BloodWithdrawsController::class, 'create']);

    Route::resource('derivatives', DerivativesController::class)->only('store');
    Route::resource('viralDiseases', ViralDiseasesController::class);  //done
    Route::resource('kids', KidsController::class); //done
    Route::resource('donations', DonationsController::class); //done
    Route::get('FilterDonar', [DonationsController::class, 'search'])->name('Filter');

    Route::put('cancelDonation/{id}', [DonationsController::class, 'cancel'])->name('cancelDonation');


    Route::resource('investigations', InvestigationsController::class); //done
    Route::resource('polcythemias', PolcythemiasController::class); //done
    Route::put('cancelPolcythemias/{id}', [PolcythemiasController::class, 'cancel'])->name('cancelPolcythemias');

    Route::get('exchanges/create/{order}', [ExchangesController::class, 'create'])->name('exchanges');

    Route::resource('exchanges', ExchangesController::class);

    Route::get('donersWithDraw', [InvoiceController::class, 'donersWithDraw'])->name('doners-WithDraw');

    Route::get('donatios-check', [InvoiceController::class, 'donatiosCheck'])->name('donatios-check');
    Route::get('viralDiseases-invoice', [InvoiceController::class, 'viralDiseases'])->name('viralDiseases-invoice');
    Route::get('ExclusionFromTheDoctor', [InvoiceController::class, 'exclusionFromTheDoctor'])->name('exclusionFromTheDoctor');
    Route::get('polcythemiasrReport', [InvoiceController::class, 'polcythemiasrReport'])->name('polcythemiasrReport');
    Route::get('BloodDischarged', [InvoiceController::class, 'BloodDischarged'])->name('BloodDischarged');

    Route::get('order-invoice/{id}', [InvoiceController::class, 'printOrder'])->name('print-order');
    Route::get('Polcythemias-invoice/{id}', [InvoiceController::class, 'printPolcythemias'])->name('printPolcythemias');
    Route::get('kid-invoice/{id}', [InvoiceController::class, 'kidInvoice'])->name('kidInvoice');
    Route::get('investigations-invoice/{id}', [InvoiceController::class, 'investigationsInvoice'])->name('investigationsInvoice'); //done
    Route::put('investigationsStatus/{id}', [InvestigationsController::class, 'updateStatus'])->name('investigationsStatus'); //done


    Route::get('filter', function () {
        return view('layouts.filter');
    })->name('filter');

    Route::post('ict', [ICTTestController::class, 'store'])->name('ict');
    Route::post('dct', [DCTTestController::class, 'store'])->name('dct');

    Route::get('bottles', [DerivativesController::class, 'bottles'])->name('bottles');
    Route::get('derivatives/{id}', [DerivativesController::class, 'create']);
});
