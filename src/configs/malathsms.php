<?php

return [


  /*
  |--------------------------------------------------------------------------
  | Malath SMS Account Username
  |--------------------------------------------------------------------------
  |
  | This value is the username to your account to malath services.
  |
  */

  'username' => env('MALATH_SMS_USERNAME', Null),

  /*
  |--------------------------------------------------------------------------
  | Malath SMS Account Password
  |--------------------------------------------------------------------------
  |
  | This value is the password to your account to malath services.
  |
  */

  'password' => env('MALATH_SMS_PASSWORD', Null),

  /*
  |--------------------------------------------------------------------------
  | Malath SMS Sender ID
  |--------------------------------------------------------------------------
  |
  | This value is the name of the sender of your messages.
  |
  */

  'sender' => env('MALATH_SMS_SENDER', Null),


];
