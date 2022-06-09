<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminPanelController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Posts\PostController;

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
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'user'])->name('dashboard');

// Route::get('/admin_dashboard', function () {
//     return view('admin_dashboard');
// })->middleware(['auth', 'admin'])->name('admin_dashboard');
Route::get('/admin_dashboard', [AdminPanelController::class, 'create'])->middleware(['auth', 'admin'])->name('admin_dashboard');

Route::get('post_list', [PostController::class, 'viewList'])->middleware(['auth'])->name('post.viewList');

Route::get('post/{postId}', [PostController::class, 'viewSingle'])->middleware(['auth'])->name('post.viewSingle');

Route::get('post_create', [PostController::class, 'create'])->middleware(['auth'])->name('post.create');

Route::post('post-create', [PostController::class, 'store'])->middleware(['auth'])->name('post.store');

Route::get('post_edit/{postId}', [PostController::class, 'edit'])->middleware(['auth'])->name('post.edit');

Route::post('post-edit/{postId}', [PostController::class, 'submitEdit'])->middleware(['auth'])->name('post.submitEdit');

Route::delete('delete-user/id={userId}', [UserController::class, 'remove'])
                ->name('user.delete');

Route::post('give-priveleges/id={userId}', [UserController::class, 'givePriveleges'])
                ->name('user.modifyPriveleges');

require __DIR__.'/auth.php';
