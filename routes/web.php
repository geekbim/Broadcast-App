<?php

use App\Jobs\SendEmail;
use App\Models\Message;
use App\Models\Subscriber;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Route;

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
    $subscribers = Subscriber::all();
    $template = Message::value('message');
    return view('welcome', compact('subscribers', 'template'));
});

Route::post('/send-broadcast', function(HttpRequest $request) {
    // simpan message
    Message::find(1)->update([
        'message' => $request->message
    ]);

    // kirim data subscribers ke job
    $subscribers = new SendEmail($request->subscribers);
    dispatch($subscribers);

    return redirect()->back();
});
