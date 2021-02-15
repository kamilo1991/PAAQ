<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\DependenciaController;
use App\Http\Controllers\Admin\AreaController;
use App\Http\Controllers\Admin\ModalidadController;
use App\Http\Controllers\Admin\RequierevigenciaController;
use App\Http\Controllers\Admin\MesController;
use App\Http\Controllers\Admin\FuenteController;
use App\Http\Controllers\Admin\EstadosolicitudvigenciaController;
use App\Http\Controllers\Admin\TipozonaController;
use App\Http\Controllers\Admin\TipoprioridadController;
use App\Http\Controllers\Admin\DetallecodigounspscController;
use App\Http\Controllers\Admin\ProductoController;
use App\Http\Controllers\Admin\ClaseController;
use App\Http\Controllers\Admin\FamiliaController;
use App\Http\Controllers\Admin\SegmentoController;
use App\Http\Controllers\Admin\TipoaquicontController;
use App\Http\Controllers\Admin\TipoprocesocontController;
use App\Http\Controllers\Admin\PlanaquisController;




Route::get('', [HomeController::class,'index'])->name('admin.index');
Route::resource('dependencias', DependenciaController::class)->names('admin.dependencias');
Route::resource('areas', AreaController::class)->names('admin.areas');
Route::resource('modalidads', ModalidadController::class)->names('admin.modalidads');
Route::resource('requivigfuts', RequierevigenciaController::class)->names('admin.requivigfuts');
Route::resource('mes', MesController::class)->names('admin.mes');
Route::resource('fuentes', FuenteController::class)->names('admin.fuentes');
Route::resource('estsolivigens', EstadosolicitudvigenciaController::class)->names('admin.estsolivigens');
Route::resource('tipozonas', TipozonaController::class)->names('admin.tipozonas');
Route::resource('tipoprioridads', TipoprioridadController::class)->names('admin.tipoprioridads');
Route::resource('tipoaquiconts', TipoaquicontController::class)->names('admin.tipoaquiconts');
Route::resource('tipoprocesoconts', TipoprocesocontController::class)->names('admin.tipoprocesoconts');
Route::resource('detcodunspscs', DetallecodigounspscController::class)->names('admin.detcodunspscs');
Route::resource('productos', ProductoController::class)->names('admin.productos');
Route::resource('clases', ClaseController::class)->names('admin.clases');
Route::resource('familias', FamiliaController::class)->names('admin.familias');
Route::resource('segmentos', SegmentoController::class)->names('admin.segmentos');
Route::resource('planaquis', PlanaquisController::class)->names('admin.planaquis');
