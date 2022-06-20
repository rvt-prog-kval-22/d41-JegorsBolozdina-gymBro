<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminPanelController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Posts\CategoryController;
use App\Http\Controllers\Posts\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TinymceController;

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

Route::get('/', [HomeController::class, 'create'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'user'])->name('dashboard');

// Route::get('/admin_dashboard', function () {
//     return view('admin_dashboard');
// })->middleware(['auth', 'admin'])->name('admin_dashboard');
Route::get('/admin_dashboard', [AdminPanelController::class, 'create'])->middleware(['auth', 'admin'])->name('admin_dashboard');

Route::get('categories', [CategoryController::class, 'create'])->middleware(['auth'])->name('post.viewCategories');

Route::get('post_list', [PostController::class, 'viewAllPosts'])->middleware(['auth'])->name('post.viewAllPosts');

Route::get('categories/{categoryId}', [PostController::class, 'viewPostListByCategory'])->middleware(['auth'])->name('post.viewPostListByCategory');

Route::get('posts/{postId}', [PostController::class, 'viewSingle'])->middleware(['auth'])->name('post.viewSingle');

Route::get('create-post', [PostController::class, 'create'])->middleware(['auth'])->name('post.create');

Route::post('create-post', [PostController::class, 'store'])->middleware(['auth'])->name('post.store');

Route::get('profile/{userId}/posts', [PostController::class, 'viewPostsByUser'])->middleware(['auth'])->name('user.posts');

Route::get('profile/edit_data', [UserController::class, 'showEditDataPage'])->middleware(['auth'])->name('user.editData');

Route::get('profile/edit_pass', [UserController::class, 'showEditPassPage'])->middleware(['auth'])->name('user.editPass');

Route::post('profile/edit=data', [UserController::class, 'submitUpdateInfo'])->middleware(['auth'])->name('user.changeData');

Route::post('profile/edit=pass', [UserController::class, 'submitEditPass'])->middleware(['auth'])->name('user.changePass');

Route::get('edit/post={postId}', [PostController::class, 'edit'])->middleware(['auth', 'user.allowed'])->name('post.edit');

Route::post('edit/post={postId}', [PostController::class, 'submitEdit'])->middleware(['auth', 'user.allowed'])->name('post.submitEdit');

Route::delete('delete/post={postId}', [PostController::class, 'delete'])->middleware(['auth'])->name('post.delete');

Route::delete('delete-user/id={userId}', [UserController::class, 'remove'])
                ->name('user.delete');

Route::post('give-priveleges/id={userId}', [UserController::class, 'givePriveleges'])
                ->name('user.modifyPriveleges');


Route::post('/upload', [TinymceController::class, 'store'])->middleware(['auth']);

require __DIR__.'/auth.php';
