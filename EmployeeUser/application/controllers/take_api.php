<?php

class take_api{
    public static function API($request, $urlset, $data=null){
        $url=$urlset;
        $ch=null;
        switch($request){
            case 'get':
                $ch = curl_init($url);
                break;
            case 'delete':
                $ch=curl_init($url);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                break;
            case 'post':
                $postvars='';
                foreach($data as $key=> $value){
                    $postvars.=$key.'='.$value.'&';
                }
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars);
                curl_setopt($ch, CURLOPT_POST, true);
                break;
            case 'put':
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_VERBOSE, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
                break;
            }
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
            $response = curl_exec($ch);
            $result = json_decode($response, true);
            return $result;
    }
}