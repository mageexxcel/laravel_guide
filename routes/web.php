<?php
use App\UserData;
use Illuminate\Http\Request;
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
});

Route::get('/ping', function(){
    return 'Pong';
});

Route::get('/info/{id}/{page?}', function($id, $page = null){
    if (!$page) {
        return 'This is the page with an id ' . $id;
    } else {
        return 'This is ' . $page . ' page with and id ' . $id;
    }
})->name('infopage');

Route::get('/v1/info', function(){
    return redirect()->route('infopage', ['id' => 1, 'page' => 'login']);
});

Route::post("/user", function(){
    echo "hello";
});

Route::get('/user/{id}', function($id){
    $users = DB::table('login_users')->where('id', $id)->get();
    return $users;
});
