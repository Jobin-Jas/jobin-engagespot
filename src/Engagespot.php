<?php

namespace  Jasjbn\Engagespot;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class Engagespot
{

    public function send()
    {
        $notifcationSpec = [
            'notification' => [
                "title" => $this->title,
                "message" => $this->message ?? null,
                "url" => $this->url ?? null,
                "icon" => $this->icon ?? null
            ],
            "recipients" => array($this->recipients),
            "category" => $this->category ?? null,
            "override" => [
                "channels" => $this->channels ?? null,
                "sendgrid_email" => $this->SendGridObject ?? null,
            ],
        ];
        try {
            $response = Http::withHeaders([
                'X-ENGAGESPOT-API-KEY' => config('engagespot.X-ENGAGESPOT-API-KEY'),
                'X-ENGAGESPOT-API-SECRET' => config('engagespot.X-ENGAGESPOT-API-SECRET'),
            ])->post('https://api.engagespot.co/v3/notifications', $notifcationSpec);

            return response()->json([
                'code' => $response->getStatusCode(),
                'message' => $response->body(),
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
