
<?php
Route::group(['middleware' => ['web']],function(){

   Route::get('/',function() {
       return view('welcome');
   })->name('login');

   Route::post('/signup',[
       'uses'=>'UserController@postSignUp',
       'as'=>'signup'
   ]);

      Route::post('/signin',[
       'uses'=>'UserController@postSignin',
       'as'=>'signin'
   ]);

      Route::get('/logout',[
       'uses'=>'UserController@getLogout',
       'as'=>'logout'
   ]);

    Route::get('/account',[
       'uses'=>'UserController@getAccount',
       'as'=>'account'
   ])->middleware('auth');

    Route::get('/info',[
        'uses'=>'UserController@getInfo',
        'as'=>'info'
    ])->middleware('auth');

Route::post('/updateaccount', [
    'uses' => 'UserController@postSaveAccount',
    'as' => 'account.save',
])->middleware('auth');

    Route::post('/age', [
        'uses' => 'UserController@postSaveAge',
        'as' => 'account.age',
    ])->middleware('auth');

    Route::post('/location', [
        'uses' => 'UserController@postSaveLocation',
        'as' => 'account.location',
    ])->middleware('auth');

    Route::post('/bio', [
        'uses' => 'UserController@postSaveBio',
        'as' => 'account.bio',
    ])->middleware('auth');

    Route::post('/img', [
        'uses' => 'UserController@postSaveImg',
        'as' => 'account.img',
    ])->middleware('auth');

Route::get('uploads/{filename}', [
    'uses' => 'UserController@getUserImage',
    'as' => 'account.image',
])->middleware('auth');
  

   Route::get('/dashboard', [
    'uses' => 'PostController@getDashboard',
    'as' => 'dashboard',
  ])->middleware('auth');

    Route::get('/getUsername/{id}', [
        'uses' => 'UserController@getUsername',
        'as' => 'user.name',
    ])->middleware('auth');

   Route::post('/createpost',[
       'uses'=>'PostController@postCreatePost',
       'as'=>'post.create'
   ])->middleware('auth');

    Route::post('/createmessage/{id}',[
        'uses'=>'MessageController@createChat',
        'as'=>'message.createChat'
    ])->middleware('auth');

    Route::post('/createmessage/',[
        'uses'=>'MessageController@createChat',
        'as'=>'message.create'
    ])->middleware('auth');

   Route::get('/delete-post/{post_id}', [
    'uses' => 'PostController@getDeletePost',
    'as' => 'post.delete',
  ])->middleware('auth');

   Route::post('/edit', [
    'uses' => 'PostController@postEditPost',
    'as' => 'edit',
   ])->middleware('auth');

   Route::post('/like', [
    'uses' => 'PostController@postLikePost',
    'as' => 'like',
   ])->middleware('auth');

    Route::get('/online',[
    'uses'=>'PagesController@online',
    'as'=>'online',
    ])->middleware('auth');

    Route::get('/profile',[
        'uses'=>'PagesController@profile',
        'as'=>'profile',
    ])->middleware('auth');

    Route::get('/register',[
        'uses'=>'PagesController@register',
        'as'=>'register',
    ])->middleware('auth');

    Route::get('/messages',[
        'uses'=>'UserController@messages',
        'as'=>'messages',
    ])->middleware('auth');

    Route::get('/chat/{id}',[
        'uses'=>'MessageController@getChat',
        'as'=>'getChat',
    ])->middleware('auth');

    Route::get('/users/{user_id}', [
        'uses' => 'UserController@getUser',
        'as' => 'users',
    ])->middleware('auth');

    Route::post('/update',[
        'uses'=>'UserController@update',
        'as'=>'update'
    ])->middleware('auth');
});