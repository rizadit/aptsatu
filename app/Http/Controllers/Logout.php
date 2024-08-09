<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class Logout extends Controller
{
    protected Constant $constant;
    public function __construct(Constant $constant)
    {
        $this->constant = $constant;
    }

    public function logout(Request $request)
    {
        $uri = config('kemenkeu_id.base_uri') . config('kemenkeu_id.endsession.endpoint');

        $id_token = Session::get('id_token');
        //$post_logout_redirect_uri = route( 'ppid.landing');
        // $post_logout_redirect_uri = route('cms.login');
        $post_logout_redirect_uri = route('logout');

        $endsession_url = $uri . '?id_token_hint=' . $id_token . '&post_logout_redirect_uri=' . $post_logout_redirect_uri;

        Session::flush();
        // print_r($endsession_url);
        return response()
            ->redirectTo($endsession_url);
    }

}
