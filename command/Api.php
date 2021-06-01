<?php
    function getChat($chat)
    {
        $curl               =   curl_init();
        
        curl_setopt($curl, CURLOPT_URL, "https://fdciabdul.tech/api/ayla/?pesan=".$chat);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        
        $result             =   curl_exec($curl);

        curl_close($curl);

        $data               =   json_decode($result, true);
        $pesan              =   $data['jawab'];

        return $pesan;
    }