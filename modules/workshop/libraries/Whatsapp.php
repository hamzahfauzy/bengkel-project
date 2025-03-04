<?php

namespace Modules\Workshop\Libraries;

use Core\Log;

class Whatsapp
{

    static $target = null;
    static $phoneTarget = null;

    static function to($target)
    {
        self::$target = $target;
        self::$phoneTarget = self::parsePhone($target);

        return new static();
    }

    static function parsePhone($phone)
    {
        return preg_replace('/^\+?0|\|0|\D/', '62', ($phone));
    }

    static function send($content)
    {
        if(env('WHATSAPP_PROVIDER') == 'webisnis')
        {
            return self::webisnisSend($content);
        }

        if(env('WHATSAPP_PROVIDER') == 'log')
        {
            Log::write($content);
            // Log::info($content);
            return ['success'=>true];
        }
        
    }

    static function webisnisSend($content)
    {
        try {
            $apiKey = env('WEBISNIS_API_KEY');
            $deviceId = env('WEBISNIS_DEVICE_ID');
            //code...
            $body = [
                'device_id' => $deviceId,
                'phone' => self::$phoneTarget,
                'content' => $content
            ];
            
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://wa.webisnis.id/api/whatsapp/messages/send",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => $body,
                CURLOPT_HTTPHEADER => array(
                    'Authorization: Bearer '.$apiKey,
                ),
            ));

            $response = curl_exec($curl);

            Log::info($response);

            curl_close($curl);
            return json_decode($response);
        } catch (\Throwable $th) {
            //throw $th;
            return ['error' => $th->getMessage()];
        }
    }
}