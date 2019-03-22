<?php

namespace vtc\Http\Controllers;

use Illuminate\Http\Request;
use Kagga\Telco\facades\Telco;

class SmsCtrl extends Controller
{
    public function sms() {
      return view('send');
    }

    public function smsPost(Request $request) {
      $mobile = $request->input('mobile');

      $name = $request->input('name');

      $message = ('Hi '.$name.', Transnzoia County welcomes you to the ministry of education and ICT, we are happy to serve');

      Telco::send($mobile, $message);

      return redirect()->back();
    }
}
