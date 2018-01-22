<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Send_notification{

    function __construct()
    {
        define( 'API_ACCESS_KEY', 'AAAApj6zYT4:APA91bG7kikxGt7fnXaZhq5t28FcYM85FbPjL8V8yXOpXy56nYP80U4jZibFkCZG6FmSsCiazdUbwwTavQ-agqT-gs_tJUPyM15nft6YqaRhgO_vrAOzxj9u2JtkIXc-W0Vi_QRGGkgA' );
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
            'to'		=> $registrationIds,
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