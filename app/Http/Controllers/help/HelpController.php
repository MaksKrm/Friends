<?php

namespace App\Http\Controllers\help;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Constant;
use App\models\Help;
use App\Http\Requests\HelpFormRequest;
use Mail;


class HelpController extends Controller
{
    /**
     * @param HelpFormRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function send(HelpFormRequest $request)
    {
        $all = $request->all();
        unset($all["_token"]);
        Help::create($all);

        Mail::send('emails.default', ['request' => $request], function ($message) use ($request) {
            $message->from($request->email, $request->name);
            $message->to('vlad30101991@gmail.com');
            $message->subject($request->theme);
        });


    }

    public function all()
    {
        $api = new \LiqPay('i89477393687', 'EPXLXJjSQLjNsUsPR1QFkUJh8d7m4iIT9Tc2gQYI');

        $array = $api->api('request',array(
            'action'    => 'reports',
            'version'   => '3',
            'date_from' => '1443161386000',
            'date_to'   => '1443164386000'
        ));
        $all= Constant::all();
        return view('pages.help',['all'=>$all,'array'=>$array]);
    }
}
