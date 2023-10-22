<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


// Institutions ROUTES
Route::get('/institution/index', [App\Http\Controllers\InstitucionController::class, 'index'])
    ->name('institution.index');
Route::get('/institution/register', [App\Http\Controllers\InstitucionController::class, 'register'])
    ->name('institution.register');
Route::post('/institution/save', [App\Http\Controllers\InstitucionController::class, 'save'])
    ->name('institution.save');
Route::get('/institution/enter', [App\Http\Controllers\InstitucionController::class, 'enter'])
    ->name('institution.enter');
Route::any('/institution/login', [App\Http\Controllers\InstitucionController::class, 'login'])
    ->name('institution.login');
Route::get('/institution/edit', [App\Http\Controllers\InstitucionController::class, 'edit'])
    ->name('institution.edit');
Route::post('/institution/update', [App\Http\Controllers\InstitucionController::class, 'update'])
    ->name('institution.update');
Route::get('/institution/delete/{id}', [App\Http\Controllers\InstitucionController::class, 'delete'])
    ->name('institution.delete');
Route::get('/institution/logout', [App\Http\Controllers\InstitucionController::class, 'logout'])
    ->name('institution.logout');


// USER ROUTES
Route::get('/user/register', [App\Http\Controllers\UserController::class, 'register'])
    ->name('user.register');
Route::post('/user/save', [App\Http\Controllers\UserController::class, 'save'])
    ->name('user.save');
Route::get('/user/enter', [App\Http\Controllers\UserController::class, 'enter'])
    ->name('user.enter');
Route::post('/user/login', [App\Http\Controllers\UserController::class, 'login'])
    ->name('user.login');
Route::get('/user/index', [App\Http\Controllers\UserController::class, 'index'])
    ->name('user.index');
Route::get('/user/logout', [App\Http\Controllers\UserController::class, 'logout'])
    ->name('user.logout');
Route::get('/user/profile/{id}', [App\Http\Controllers\UserController::class, 'profile'])
    ->name('user.profile');
Route::get('/user/edit/', [App\Http\Controllers\UserController::class, 'edit'])
    ->name('user.edit');
Route::any('/user/update/', [App\Http\Controllers\UserController::class, 'update'])
    ->name('user.update');


// TEACHER  ROUTES
Route::get('/teacher/index/', [App\Http\Controllers\TeacherController::class, 'index'])
    ->name('teacher.index');
Route::get('/teacher/add/', [App\Http\Controllers\TeacherController::class, 'add'])
    ->name('teacher.add');
Route::get('/teacher/change/{id}/{rol}', [App\Http\Controllers\TeacherController::class, 'change'])
    ->name('teacher.change');
Route::get('/teacher/detail/{id_docente}', [App\Http\Controllers\TeacherController::class, 'detail'])
    ->name('teacher.detail');


// GROUP ROUTES
Route::get('/group/index', [App\Http\Controllers\GroupsController::class, 'index'])
    ->name('group.index');
Route::get('/group/create', [App\Http\Controllers\GroupsController::class, 'create'])
    ->name('group.create');
Route::post('/group/save', [App\Http\Controllers\GroupsController::class, 'save'])
    ->name('group.save');
Route::get('/group/delete/{id}', [App\Http\Controllers\GroupsController::class, 'delete'])
    ->name('group.delete');
Route::get('/group/edit/{id}', [App\Http\Controllers\GroupsController::class, 'edit'])
    ->name('group.edit');
Route::post('/group/update/', [App\Http\Controllers\GroupsController::class, 'update'])
    ->name('group.update');
Route::get('/group/list', [App\Http\Controllers\GroupsController::class, 'list'])
    ->name('group.list');
Route::get('/group/join', [App\Http\Controllers\GroupsController::class, 'join'])
    ->name('group.join');
Route::any('/group/joining/{id_grupo}', [App\Http\Controllers\UserGroupController::class, 'join'])
    ->name('group.joining');

    
// CLASSROOM  ROUTES
Route::get('/classroom/index', [App\Http\Controllers\ClassroomController::class, 'index'])
    ->name('classroom.index');
Route::get('/classroom/create', [App\Http\Controllers\ClassroomController::class, 'create'])
    ->name('classroom.create');
Route::post('/classroom/save', [App\Http\Controllers\ClassroomController::class, 'save'])
    ->name('classroom.save');
Route::get('/classroom/edit/{id}', [App\Http\Controllers\ClassroomController::class, 'edit'])
    ->name('classroom.edit');
Route::post('/classroom/update/', [App\Http\Controllers\ClassroomController::class, 'update'])
    ->name('classroom.update');
Route::get('/classroom/delete/{id}', [App\Http\Controllers\ClassroomController::class, 'delete'])
    ->name('classroom.delete');
Route::get('/classroom/reserve/', [App\Http\Controllers\ClassroomController::class, 'reserve'])
    ->name('classroom.reserve');
Route::get('/classroom/reserve/form/{id}', [App\Http\Controllers\ClassroomController::class, 'classReserveForm'])
    ->name('classroom.classReserveForm');
Route::post('/classroom/reserve/save/', [App\Http\Controllers\ClassroomController::class, 'saveReserva'])
    ->name('classroom.saveReserva');
Route::get('/classroom/reserved/', [App\Http\Controllers\ClassroomController::class, 'reserved'])
    ->name('classroom.reserved');
Route::get('/classroom/list/', [App\Http\Controllers\ClassroomController::class, 'list'])
    ->name('classroom.list');
Route::get('/classroom/clean/{id}', [App\Http\Controllers\ClassroomController::class, 'clean'])
    ->name('classroom.clean');


// IMPLEMENTS  ROUTES
Route::get('/implements/index/{id}', [App\Http\Controllers\ImplementController::class, 'index'])
    ->name('implements.index');
Route::get('/implements/add/{id}', [App\Http\Controllers\ImplementController::class, 'create'])
    ->name('implements.create');
Route::post('/implements/save/', [App\Http\Controllers\ImplementController::class, 'save'])
    ->name('implements.save');
Route::get('/implements/edit/{id}', [App\Http\Controllers\ImplementController::class, 'edit'])
    ->name('implements.edit');
Route::post('/implements/update/', [App\Http\Controllers\ImplementController::class, 'update'])
    ->name('implements.update');
Route::get('/implements/delete/{id}', [App\Http\Controllers\ImplementController::class, 'delete'])
    ->name('implements.delete');