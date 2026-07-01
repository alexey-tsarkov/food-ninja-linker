<?php

use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/admin');

Route::get('/{short_code}', static function (Request $request) {
    /** @var Link */
    $link = Link::where('short_code', $request->short_code)->firstOrFail();

    $link->clicks()->create([
        'ip_address' => $request->getClientIp() ?? '0.0.0.0',
    ]);

    if (App::hasDebugModeEnabled()) {
        return view('click.debug', $link);
    }

    return redirect($link->original_url);
})->name('click');
