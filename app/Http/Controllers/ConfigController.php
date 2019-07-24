<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\DB;

class ConfigController extends Controller
{
    public function save(Request $request)
    {
        $config = $request->get('config');

        if (!empty($config)) {
            foreach ($config as $key => $value) {
                DB::table('config')
                    ->where('config', $key)
                    ->update(['value' => $value]);
            }
        }

        return redirect(action('MessagesController@index'));
    }
}
