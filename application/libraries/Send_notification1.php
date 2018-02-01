<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Send_notification1{

    function __construct()
    {
        define( 'API_ACCESS_KEY', 'AAAAwNVn9ys:APA91bE5qfRLwntb0QSsh98EOKOq6izr1hykDP1N9l-q8W05DMvR_bbzokYYx2vQlVYsnQJvmywobmzgTLxoS5U6VA923cmTeY5NVfZRU1s_QYV5_sMcaLsDWoFFpI8M-xCazARu3Lbt' );
    }

    function notification_push($token,$message_body,$message_title)
    {
        #API access key from Google API's Console

        $registrationIds = $token;

        #prep the bundle
        $msg = array
        (
            'body' 	=> $message_body,
            'title'	=> $message_title,
            'icon'	=> 'myicon',/*Default Icon*/
            'sound' => 'mySound'/*Default sound*/
        );
        $fields = array
        (
            'registration_ids'		=> $registrationIds,
            'notification'	=> $msg
        );

        $headers = array
        (
            'Authorization: key=' . API_ACCESS_KEY,
            'Content-Type: application/json'
        );
        #Send Reponse To FireBase Server
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
        $result = curl_exec($ch );
        curl_close( $ch );
        return $result;
    }

}
?>