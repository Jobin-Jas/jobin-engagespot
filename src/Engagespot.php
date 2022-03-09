<?php
namespace  Jasjbn\Engagespot;
use Illuminate\Support\Facades\Http;


class Engagespot{

    public function send(){
        $notifcationSpec = [
            'notification' => [
                "title" => $this->title,
                "url" => $this->url,
                "icon" => $this->icon,
            ],
            "recipients" => [
                $this->recipients
            ],
            "override" => [
                "channels" => [
                    $this->channels
                ]
            ]
        ];
        try{
            $response = Http::withHeaders([
                'X-ENGAGESPOT-API-KEY' => config('engagespot.X-ENGAGESPOT-API-KEY'),
                'X-ENGAGESPOT-API-SECRET' => config('engagespot.X-ENGAGESPOT-API-SECRET'),
            ])->post('https://api.engagespot.co/v3/notifications', $notifcationSpec);

            return response()->json([
                'code' => $response->getStatusCode(),
                'message' => $response->getReasonPhrase(),
            ]);    
        }catch(\Exception $e){
            return $e->getMessage();
        }

    }

}