<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Post;

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

    Post::create([
        'title' => 'First Post',
        'slug' => 'first-post',
        'content' => 'This is my first post, wow!'
    ]);

    return 'Well hello there';
});

Route::get('/find/{id}', function ($id) {
    $post = Post::find($id);
    return view('first-post', ['post' => $post]);
});

Route::get('/destroy/{id}', function ($id) {
    Post::destroy($id);
    return 'post was deleted';
});
