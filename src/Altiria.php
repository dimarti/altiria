<?php

namespace Usckuro\Altiria;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ServerException;
use Exception;

class Altiria
{
    public function sendMessage($message, $phone)
    {
        try {
            $client = new Client(['base_uri' => config('altiria.domain', 'http://www.altiria.net')]);
            $message = (substr($message,0,160));

            if(is_array($phone))
                $phone = implode(',', $phone);

            $phone = $phone_number = preg_replace('/[+()\s-]/', '', $phone);

            $options = [
                "form_params" => [
                    //command used
                    'cmd' => 'sendsms',
                    //destination number
                    'dest' => $phone,
                    //message body (max 160 characters)
                    'msg' => $message,
                    //encoding neccessary to emojis
                    'encoding' => 'unicode',
                    //account
                    'login' => config('altiria.user'),
                    //password
                    'passwd' => config('altiria.password'),
                    //domain_id
                    'domainId' => config('altiria.domain_id'),
                ],
                "headers" => [
                    //this header is necessary
                    'Content-Type' => 'application/x-www-form-urlencoded'
                ]
            ];

            if (config('altiria.sender_id')) {
                //sender_id (if present)
                $options['form_params']['senderId'] = config('altiria.sender_id');
            }

            $resp = $client->request('post', '/api/http', $options);

            return [$resp->getBody()->getContents(), $resp->getStatusCode()];
        }catch(ClientException $e){
            return [$e->getMessage(), $e->getCode()];
        }
        catch(ServerException $e){
            return [$e->getMessage(), $e->getCode()];
        }
        catch(Exception $e){
            return [$e->getMessage(), $e->getCode()];
        }
    }

    //TODO function to send messages to multiple destinations
    public function sendMultilpleMessages($phones){

    }

    //TODO function to return the remaining number of sms in the account
    public function reviewCredit(){

    }
}
