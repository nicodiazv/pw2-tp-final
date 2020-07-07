<?php
// Clase para subir imagenes
class SubscribeEmail{

    // función estática 
    public static function subscribe($email){
        $email = $email;
        $list_id = '7ab444f725';
        $api_key = '2cb8e437a38bc7ffdde696963c47805a-us10';
        // auidience_id =e6dd674f34
        $data_center = substr($api_key,strpos($api_key,'-')+1);
        
        $url = 'https://'. $data_center .'.api.mailchimp.com/3.0/lists/'. $list_id .'/members';
        
        $json = json_encode([
            'email_address' => $email,
            'status'        => 'subscribed', //pass 'subscribed' or 'pending'
        ]);
        
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $api_key);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        $result = curl_exec($ch);
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return $status_code;
    }

}



