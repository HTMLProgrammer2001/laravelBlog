<?php

namespace App\Http\Controllers;

use App\Mail\SubscribeConfirm;
use App\Subscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SubscribeController extends Controller
{
    public function create(Request $request){
        $this->validate($request, [
            'email' => 'required|email|max:255|unique:subscribe,email'
        ]);

        $subs = Subscribe::add($request->get('email'));

        Mail::to($subs->email)->send(new SubscribeConfirm($subs->token));

        return back()->with('success_message', 'Просмотрите Ваш почтовый ящик');
    }

    public function confirm(Request $request, $token){
        $subs = Subscribe::where('token', $token)->first();

        if(!$subs)
            return abort(404);

        $subs->token = null;
        $subs->save();

        return redirect('/')->with('success_message', 'Ваша почта подтверждена');
    }
}
