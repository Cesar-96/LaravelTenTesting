<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\MyController;

use App\Country;
use App\Post;
use App\User;
use App\Photo;
use App\Role;
use App\Tag;
use Carbon\Carbon;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {//static method for the ::
    return view('welcome');
});

Route::get('/about', function () {//static method for the ::
    return "Hi about page";
});
//
//Route::get('/contact', function () {//static method for the ::
//    return "Hi I am contact";
//});
//
Route::get('/post/{id}/{name}', function ($id, $name) {//static method for the ::
    return "This is post number " . $id . " " . $name;
});
//
//Route::get('admin/posts/example',array('as'=>'admin.home',function(){
//    $url = route('admin.home');
//
//    return "This url is " .$url;
//}));

//Section Routes-controller
//Route::get('/post',[PostsController::class, 'index']);
//
//Route::get('/post/{id}',[PostsController::class, 'index']);
//
//Route::get('/contact',[PostsController::class, 'contact']);
//
//Route::get('/posting/{id}/{name}/{pass}',[PostsController::class, 'posting']);
//
//Route::get('/link/{id}/{name}/{password}',[PostsController::class,'show_post']);
//
//Route::get('/insert',function(){
//    DB::insert('insert into posts(title,content) values (?,?)',['Pablito','Yucra']);
//});
//
Route::get('/read', function () {
    $results = DB::select('select * from posts where id = ?', [1]);
    foreach ($results as $post)
        return $post->title;

    //return var_dump($results);
});

//Route::get('/update',function(){
//   $update = DB::update('update posts set title="Update title" where id =?',[1]);
//   return $update;
//});
//
//Route::get('/delete',function(){
//   $deleted = DB::delete('delete from posts where id=?',[1]);
//   return $deleted;
//});
//
//
///*
//Route::controller(PostsController::class)->group(function (){
//    Route::get('post','index');
//});
//*/
//
////Route::resource('posts','PostsController');
//
///*
//
//Route::group(['middleware'=>['web']],function(){
//
//});
//
//*/
///*
//---------------
//ELOQUENT
//-------------
//*/
//
//Route::get('/find',function (){
//   $posts = Post::all();
//   foreach ($posts as $post){
//       return $post->title;
//   }
//
//});
//
//
//Route::get('/encuen',function (){
//    $post = Post::find(2);
//        return $post->title;
//});
//
//
//Route::get('/findwhere',function(){
//    $posts = Post::where('id',2)->orderBy('id','desc')->take(1)->get();
//    return  $posts;
//});
//
//Route::get('/findmore',function(){
////    $posts = Post::findOrFail(1);
////    return $posts;
//    $posts = Posts::where('users_count','<',50)->firstOrFail();
//
//});
//
Route::get('/basicinsert', function () {
    $post = new Post;          //$post = Post::find(2);
    $post->title = 'New Eloquent title insert';
    $post->content = 'Wow elequent content';

    $post->save();
});
//
Route::get('/basicinsert2', function () {
    $post = Post::find(2);
    $post->title = 'New Eloquent title insert';
    $post->content = 'Wow elequent contentasdasdasd';

    $post->save();
});
//
Route::get('/create', function () {
    Post::create(['title' => 'the create method', 'content' => 'WOW I\'am learning a lot with Edwin Diaz']);
});

//Route::get('/update2',function(){
//   Post::where('id',2)->where('is_admin',0)->update(['title'=>'NEW PHP TITLE','content'=>'I LOVE MY NEW PHP TITLE']);
//});
//
//Route::get('/delete',function(){
//    $post=Post::find(2);
//    $post->delete();
//});
//
//Route::get('/delete2',function(){
//    Post::destroy(3);//can be ([4,5]);
//});
//
//Route::get('/softdelete',function (){
//    Post::find(3)->delete();
//});
//
//
//Route::get('/readsoftdelete',function (){
////    $post= Post::find(3);
////    return $post;
//    $post = Post::withTrashed()->where('id',3)->get();
//    return $post;
//
//});
//
//
//Route::get('/readsoftdelete2',function (){
////    $post= Post::find(3);
////    return $post;
//    $post = Post::onlyTrashed('is_admin',0)->get();
//    return $post;
//
//});
//
//
//Route::get('/restore',function(){
//   Post::withTrashed()->where('is_admin',0)->restore();
//});
//
//
////delete all data
//Route::get('/forcedelete',function (){
//    Post::withTrashed()->where('is_admin',0)->forceDelete();
//});
//
////onlytrashed items
//Route::get('/forcedelete',function (){
//    Post::onlyTrashed()->where('is_admin',0)->forceDelete();
//});

/*
---------------
ELOQUENT Relationships
-------------
*/

////one to one relationship
//Route::get('/user/{id}/post',function($id){
//
//    return User::find($id)->post;
//
//});
//
//
//Route::get('/post/{id}/user',function ($id){
//
//    return Post::find($id)->user->name;
//
//});

//ONE TO MANY RELATIONSHIP
//Route::get('/posts',function () {
//
//    $user = User::find(1);
//
//    foreach ($user->posts as $post){
//        echo $post->title . "<br>";
//    }
//
//});


//MANY TO MANY RELATIONSHIP

//Route::get('user/{id}/role',function($id){
//    $user = User::find($id)->roles()->orderBy('id','desc')->get();
//    return $user;
////
////    foreach($user->roles as $role)
////    {
////        return $role->name;
////    }
//});


//MANY TO MANY RELATIONSHIP
//Accessing the intermediate table / pivot
//Route::get('user/pivot',function (){
//
//    $user=User::find(3);
//
//    foreach($user->roles as $role)
//    {
//        return $role->pivot->created_at;
//    }
//
//});
//
//Route::get('/user/country',function (){
//
//    $country = Country::find(3);
//    foreach ($country->posts as $post){
//        return $post->title;
//    }
//});

//POLYMORPIC RELATIONS

//Route::get('/user/photos',function (){
//    $user = User::find(1);
//    foreach($user->photos as $photo)
//    {
//        return $photo->path;
//    }
//});
//
Route::get('/post/photos', function () {
    $post = Post::find(1);
    foreach ($post->photos as $photo) {
        echo $photo->path . '<br>';
    }
});


//CRUD APPLICATION

//Route::resource('/posts','PostsController');

Route::group(['middleware' => 'web'], function () {

    Route::resource('/posts', 'PostsController');

    Route::get('/dates', function () {

        $date = new DateTime('1+week');
        echo $date->format('m-d-Y');

    });
});


Route::get('/dates', function () {

    $date = new DateTime('+1 week');
    echo $date->format('m-d-Y');

    echo '<br>';

    echo Carbon::now()->addDays(10)->diffForHumans();
    echo '<br>';

    echo Carbon::now()->subMonths(5)->diffForHumans();
    echo '<br>';

    echo Carbon::now()->yesterday();

});

Route::get('/getname', function () {

    $user = User::find(1);
    echo $user->name;

});

Route::get('/setname', function () {

    $user = User::find(1);
    $user->name = 'William';
    $user->save();
});

Route::get('/usuarios', function () {
    return 'Usuarios';
});

Route::get('/read/{id}', function ($id) {
    $user = User::FindOrFail($id);
    return $user->name;
});

Route::get('/welcome/{name}/{nickname?}', function ($name, $nickname = null) {

    $name = ucfirst($name);
    $nickname = ucfirst($nickname);
    if ($nickname) {
        return "Welcome {$name}, your nickname is {$nickname}";
    }
//    else{
//        "Welcome {$name}, you dont have nickname";
//    }
});

Route::get('/my-controller-execute', [MyController::class, 'execute']);

Route::get('/my-user-order', [\App\Http\Controllers\UserController::class, 'execute']);


//
//Route::get('/drive', function () {
//    $client = new Client();
//    $client->setClientId('673196264301-65ibo2q7mg0njs31e6051hmdulsej0er.apps.googleusercontent.com');
//    $client->setClientSecret('_fh9LWLk8cH1r1_1KllIuH-t');
//    $client->setRedirectUri('http://localhost:8000/google-drive/callback');
//    $client->setScopes([
//        'https://www.googleapis.com/auth/drive',
//        'https://www.googleapis.com/auth/drive.file',
//    ]);
//    $url = $client->createAuthUrl();
//    return $url;
//});
//
//Route::get('/google-drive/callback', function () {
//    return request('code');
//    // $client = new Client();
//    // $client->setClientId('673196264301-65ibo2q7mg0njs31e6051hmdulsej0er.apps.googleusercontent.com');
//    // $client->setClientSecret('_fh9LWLk8cH1r1_1KllIuH-t');
//    // $client->setRedirectUri('http://localhost:8000/google-drive/callback');
//    // $code = request('code');
//    // $access_token = $client->fetchAccessTokenWithAuthCode($code);
//    // return $access_token;
//});
//
//Route::get('upload', function () {
//    $client = new Client();
//    $access_token = 'ya29.a0ARrdaM8zhppotaylqPVBXM1SirlULNGgjhV6SzXODpR30nVwjreCmSueTHmB_M41wVMpCuecnKud8sIxk6TwCVJUtD7kJYrriCLDcassSozlzePscFtkZx16A8Gkvn__mQU0s-1m3UtLrhdC6KS29_7SwTTX';
//
//    $client->setAccessToken($access_token);
//    $service = new Google\Service\Drive($client);
//    $file = new Google\Service\Drive\DriveFile();
//
//    DEFINE("TESTFILE", 'testfile-small.txt');
//    if (!file_exists(TESTFILE)) {
//        $fh = fopen(TESTFILE, 'w');
//        fseek($fh, 1024 * 1024);
//        fwrite($fh, "!", 1);
//        fclose($fh);
//    }
//
//    $file->setName("Hello World!");
//    $service->files->create(
//        $file,
//        array(
//            'data' => file_get_contents(TESTFILE),
//            'mimeType' => 'application/octet-stream',
//            'uploadType' => 'multipart'
//        )
//    );
//});
