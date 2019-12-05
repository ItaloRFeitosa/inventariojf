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

use App\Models\Oracle\Sicam\Material;
use App\Models\Oracle\Sicam\Tombo;
use Illuminate\Support\Facades\DB;

Route::get('/oracleTeste', function () {
    //dd(DB::table('SICAM.TOMBO')->select('NU_TOMBO','TI_TOMBO','CO_MAT')->where([['NU_TOMBO', '=', 18835], ['TI_TOMBO', '=', 'T']])->get());
    // dd(DB::connection('oracle')->table('SICAM.TOMBO')->join('SICAM.TERMO','SICAM.TOMBO.NU_TERMO', '=', 'SICAM.TERMO.NU_TERMO')
    //                         ->join('SARH.LOTACAO', 'SARH.LOTACAO.CO_LOTACAO', '=', 'SICAM.TERMO.CO_LOTA')
    //                         ->select('SICAM.TOMBO.NU_TOMBO', 'SICAM.TERMO.CO_LOTA', 'SICAM.TERMO.NU_TERMO','SICAM.TERMO.AN_TERMO', 'SICAM.TERMO.DT_TERMO', 'SARH.LOTACAO.SG_LOTACAO')
    //                         ->where([['SICAM.TOMBO.NU_TOMBO', '=', 18835], ['SICAM.TOMBO.TI_TOMBO', '=', 'T'], ['SICAM.TERMO.AN_TERMO', '=', '2019']])
    //                         ->get()); 5235013016
    //$material = Material::where('co_mat',5235013016)->first();
    $tombo = Tombo::where([['nu_tombo',18835],['ti_tombo','T']])->first();
    dd($tombo->termo());
    //dd($tombo->termo()->first()->tombos()->paginate(10));
    
    
});

Route::prefix('admin')->namespace('Admin')->group(function () {

    Route::get('/', function(){
        return view('admin.dashboard');
    });


    Route::resource('inventarios', 'InventarioController');
    Route::resource('membros', 'MembroController');
    Route::resource('responsabilidades', 'ResponsabilidadeController');

    Route::prefix('inventarios')->group(function () {
        
        Route::get('{id}/finalizar', 'InventarioController@finalizar')->name('inventarios.finalizar');
        Route::get('{id}/reativar', 'InventarioController@reativar')->name('inventarios.reativar');
        Route::get('{inventario}/membros', 'MembroController@inventarioMembrosIndex')->name('inventario.membros.index');
        Route::get('{inventario}/membros/{membro}', 'MembroController@inventarioMembrosShow')->name('inventario.membros.show');
        Route::get('{inventario}/membros/{membro}/edit', 'MembroController@inventarioMembroEdit')->name('inventario.membro.edit');
    });
    
    
    
    
    
    

});
