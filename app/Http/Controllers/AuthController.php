<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function install(Request $request)
    {
        $shopAddress = $request->query('shop');
        $apiKey = env('API_KEY');
        $scope = 'read_products';

        $redirectUri = env('APP_URL') . '/auth/callback';
        $installUrl = 'https://' . $shopAddress . '/admin/oauth/authorize?client_id=' . $apiKey . '&scope=' . $scope . '&redirect_uri=' . $redirectUri;

        return redirect($installUrl);
    }

    public function callback()
    {
        return redirect(action('MessagesController@index'));
    }
}
