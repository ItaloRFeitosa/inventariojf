<?php

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

use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    //dd(DB::table('SICAM.TOMBO')->select('NU_TOMBO','TI_TOMBO','CO_MAT')->where([['NU_TOMBO', '=', 18835], ['TI_TOMBO', '=', 'T']])->get());
    dd(DB::connection('oracle')->table('SICAM.TOMBO')->join('SICAM.TERMO','SICAM.TOMBO.NU_TERMO', '=', 'SICAM.TERMO.NU_TERMO')
                            ->join('SARH.LOTACAO', 'SARH.LOTACAO.CO_LOTACAO', '=', 'SICAM.TERMO.CO_LOTA')
                            ->select('SICAM.TOMBO.NU_TOMBO', 'SICAM.TERMO.CO_LOTA', 'SICAM.TERMO.NU_TERMO','SICAM.TERMO.AN_TERMO', 'SICAM.TERMO.DT_TERMO', 'SARH.LOTACAO.SG_LOTACAO')
                            ->where([['SICAM.TOMBO.NU_TOMBO', '=', 18835], ['SICAM.TOMBO.TI_TOMBO', '=', 'T'], ['SICAM.TERMO.AN_TERMO', '=', '2019']])
                            ->get());

    //dd(DB::connection('mysql')->table('teste')->select('*')->get());
    
});

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});
