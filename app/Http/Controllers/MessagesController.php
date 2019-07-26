<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\DB;
use Session;
use Mail;
use URL;

class MessagesController extends Controller
{
    public function index(Request $request)
    {
        $messages = DB::table('messages');

        $filter = Session::get('appliedFilters');
        if (empty($filter)) {
            $filter = [];
        }

        if ($request->has('filter')) {
            foreach ($request->get('filter') as $field => $value) {
                if (!empty($value)) {
                    $filter[$field] = $value;
                } else {
                    unset($filter[$field]);
                }
            }

            Session::put('appliedFilters', $filter);
        }

        foreach ($filter as $field => $value) {
            if ($field != 'id') {
                $value = '%' . $value . '%';
            }

            $messages = $messages->where($field, 'like', $value);
        }

        $orderBy = 'id';
        $orderByType = 'desk';

        if ($request->has('order')) {
            $orderBy = $request->get('order');
            $orderByType = $request->get('order_type');
        }

        $messages = $messages->orderBy($orderBy, $orderByType)->paginate(5);

        return view('messages.index', [
            'messages' => $messages,
            'filter' => $filter,
            'adminEmail' => $this->getAdminEmail()
        ]);
    }

    public function show($id)
    {
        $message = App\Message::find($id);

        return view('messages.show', [
            'message' => $message
        ]);
    }

    public function save(Request $request)
    {
        $data = $request->get('contact');
        $data['site_id'] = parse_url(URL::previous(), PHP_URL_HOST);

        $message = new App\Message($data);

        $message->save();

        return redirect(action('MessagesController@index'));
    }

    public function respond(Request $request, $id)
    {
        $response = $request->get('response');
        $message = App\Message::find($id);
        $adminEmail = $this->getAdminEmail();

        Mail::send(['text' => 'messages.mail'], ['response' => $response], function ($mail) use (&$message, &$adminEmail) {
            $mail->to($message->email, 'Just a Name')->subject('Message Response');
            $mail->from($adminEmail, 'Serg Fil');
        });

        return redirect(action('MessagesController@index'));
    }

    protected function getAdminEmail()
    {
        return DB::table('config')->get()->where('config', 'admin_email')->first()->value;
    }
}
