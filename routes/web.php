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
Route::get('/', function () {
    return view('auth.login');
});

Route::get('regis','ImmobilisationController@register');
Route::get('immob','ImmobilisationController@index');
Route::get('immob/create','ImmobilisationController@create');
Route::post('imob','ImmobilisationController@store');
Route::post('registerStor','ImmobilisationController@registerStor');
Route::post('imobb','ImmobilisationController@store_1');
Route::get('immob_e/{id}','ImmobilisationController@edit_1');
Route::put('iob/{id}','ImmobilisationController@store_2');
Route::get('immob/{id}/edit','ImmobilisationController@edit');
Route::put('immob/{id}','ImmobilisationController@update');
Route::delete('immob/{id}','ImmobilisationController@destroy');
Route::get('immob/{id}','ImmobilisationController@destroy')->name('immob');
Route::get('userD/{id}','ImmobilisationController@userD');

Route::get('userDel/{id}','ImmobilisationController@userDel');
Route::get('immob/{id}/show','ImmobilisationController@show');
Route::get('imp/{id}','ImmobilisationController@imprimer');
Route::get('branch','ImmobilisationController@branche');
Route::post('branch/store','ImmobilisationController@brStore');
Route::get('derection','ImmobilisationController@derection');
Route::post('derection/store','ImmobilisationController@derStore');
Route::get('service','ImmobilisationController@service');
Route::post('service/store','ImmobilisationController@serStore');
Route::post('excel','ImmobilisationController@excel');
Route::post('recherche','ImmobilisationController@recherche');
Route::get('transfaire','ImmobilisationController@trans');
Route::post('badale/{id}','ImmobilisationController@badale');
Route::post('bd/{id}','ImmobilisationController@ba');
Route::get('proposer','ImmobilisationController@proposer');
Route::post('proposer/{id}/edit','ImmobilisationController@oser');
Route::post('rfstore/{id}','ImmobilisationController@rfstore');
Route::get('prin/{id}','ImmobilisationController@prin');
Route::delete('unite/{id}','ImmobilisationController@delete');
Route::delete('derection/{id}','ImmobilisationController@drdelete');
Route::get('derection/{id}','ImmobilisationController@drdelete')->name('derection');
Route::get('service/{id}','ImmobilisationController@serdelete')->name('service');
Route::get('marque','ImmobilisationController@marque');
Route::post('marque_st','ImmobilisationController@marque_st');
Route::delete('marque/{id}','ImmobilisationController@marquedel');

Route::get('fourniseur','ImmobilisationController@fourniseur');
Route::post('fourniseur_st','ImmobilisationController@fourniseur_st');
Route::delete('fourniseur/{id}','ImmobilisationController@fourniseurdel');

Route::get('sortie','ComptableController@sortie');
Route::delete('prdelete/{id}','ComptableController@del');
Route::get('sortie_ref/{id}','ComptableController@sortie_ref');
Route::post('sortie/{id}','ComptableController@sortieSt');
Route::get('ammorti','ComptableController@ammorti');
Route::get('ammorti_pro','ComptableController@ammorti_pro');
Route::post('calcam','ComptableController@calcam');

Route::post('calcamPro','ComptableController@calcamPro');

Route::get('bilant','ComptableController@bil');
Route::get('print_bi','ComptableController@print_bi');
Route::get('regularisation','ComptableController@regularisation');
Route::get('regul/{id}','ComptableController@regul');
Route::post('reg','ComptableController@reg');
Route::post('bi','ComptableController@bilant');

Route::get('inporter','ComptableController@importer');
Route::post('excelc','ComptableController@excel');
Route::get('justifier','ComptableController@justifier');
Route::delete('phys/{id}','ComptableController@physdel');
Route::get('ajout/{id}','ComptableController@ajouter');
Route::get('compte','ComptableController@compte');
Route::post('compt/store','ComptableController@stcomp');

Route::get('sortie_re/{id}','ComptableController@sortie_re');

Route::get('com/{id}','ComptableController@comdelete')->name('com');










Route::get('/index', function () {
    return view('index');
});

Route::get('/ex', function () {
    return view('immob.show');
});
Route::get('imobile', function () {
    return view('imobile');
});
Route::get('Annee', function () {
    return view('Annee');
});

Route::get('branche', function () {
    return view('branche');
});
Route::get('lieu', function () {
    return view('lieu');
});
Route::get('clas_pri', function () {
    return view('clas_pri');
});
Route::get('sous_class', function () {
    return view('sous_class');
});
Route::get('depris_annu', function () {
    return view('depris_annu');
});
Route::get('exclusion', function () {
    return view('exclusion');
});
Route::get('trans_acti', function () {
    return view('trans_acti');
});
Route::get('/data','TestController@test');
Route::get('/st','TestController@st');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
