<?php

Route::redirect('/', '/login');
Route::resource('juridica','JuridicaController');
Route::resource('auditoria','AuditoriaController');
Route::resource('empaste','EmpastesController');
Route::resource('asesor','AsesorController');
Route::resource('ilegal','IlegalController');
Route::resource('planificacion','PlanificacionController');
Route::resource('fiscalizacion','FiscalizacionController');
Route::resource('recursoHumano','RecursoHumanoController');
Route::resource('fondo','FondoController');
Route::resource('regional','RegionalController');
Route::resource('gaceta','GacetaController');
Route::resource('unidad_tecnica','UnidadTecnicaController');
//
Route::get('/auditoria/search/','AuditoriaController@search')->name('auditoria.search');

Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);
// Admin

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Files
    Route::delete('files/destroy', 'FilesController@massDestroy')->name('files.massDestroy');
    Route::post('files/media', 'FilesController@storeMedia')->name('files.storeMedia');
    Route::post('files/ckmedia', 'FilesController@storeCKEditorImages')->name('files.storeCKEditorImages');
    Route::resource('files', 'FilesController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
// Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
    }
});
