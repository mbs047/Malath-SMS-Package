<?php

namespace Devhereco\MalathSMS;

use GuzzleHttp\Client;
use Devhereco\MalathSMS\Models\SmsHistory;

class MalathSMS
{
    public static function sendOneSide(int $phone, ?string $message)
    {
        $query = new Client();
        $url = 'http://sms.malath.net.sa/httpSmsProvider.aspx?username=' . config('malathsms.username') . '&password=' . config('malathsms.password') . '&mobile=' . $phone . '&unicode=E&message='.$message . '&sender=' . config('malathsms.sender');

        $res = $query->get($url);
        $body = $res->getBody();

        SmsHistory::create([
            'provider'  => 'MalathSMS',
            'phone'     => $phone,
            'sender'    => config('malathsms.sender'),
            'message'   => $message,
            'status'    => $body->read(6),
        ]);

        return redirect()->back();
    }

    public static function getBalance()
    {
        $client = new Client();
        $url = 'http://sms.malath.net.sa/api/getBalance.aspx?username=' . config('malathsms.username') . '&password=' . config('malathsms.password');

        $res = $client->get($url);
        $body = $res->getBody();
        $smsBalance = $body->read(3);

        return $smsBalance;
    }

}
