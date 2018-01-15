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
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {

    dd(
        \Auth::user(),
        \Auth::guard('wechat')->user()
    );
//    return view('welcome');
});

Route::get('/clear', function (\Illuminate\Http\Request $request) {
    Auth::logout();

    Auth::guard('wechat')->logout();

    $request->session()->invalidate();

    dd('clear ok!');
});

Route::get('/qr_code', function () {
    // 生成二维码
    // QrCode::format('png')->size(80)->margin(0.2)->generate('Make me into a QrCode!', '../public/qrcode.png');

    // 二维码当作 log 放在另一张图的某个位置
    $im = new ImageManager();
    // $im->configure(array('driver' => 'gd'));
    $warter = $im->make("../public/qrcode.png");
    $image = $im->make("../public/qrcode_background.png");
    $image->insert($warter, 'top-left', 70, 55);
    $image->save("../public/new_qrcode.png");
});
