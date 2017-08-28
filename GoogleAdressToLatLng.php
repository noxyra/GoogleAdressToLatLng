<?php
    class GeocodingGoogle
    {

        const API_KEY = 'YOURAPIKEY';
        const URL1 = 'https://maps.googleapis.com/maps/api/geocode/json?address=';
        const URL2 = '&key=';

        public static function geocode($addresse){

            $addresse = str_replace(' ', '+', $addresse);
            $addresse = str_replace(',', '+', $addresse);
            $addresse = str_replace(';', '+', $addresse);
            $addresse = str_replace('-', '+', $addresse);
            $addresse = str_replace('_', '+', $addresse);

            $query = self::URL1 . $addresse . self::URL2 . self::API_KEY;
            $result = file_get_contents($query);

            $decode = json_decode($result);

            $return = [
                'lat' => $decode->{'results'}[0]->{'geometry'}->{'location'}->{'lat'},
                'lon' => $decode->{'results'}[0]->{'geometry'}->{'location'}->{'lng'}
            ];

            return $return;
        }
    }
