<?php

namespace FOO;

class MAC_Enricher extends Enricher {
    public static $TYPE = 'mac';

    public static function process($data) {
        $curl = new Curl;
        $raw_data = $curl->get(sprintf('https://macvendors.co/api/%s', $data));
        if($curl->httpStatusCode != 200) {
            throw new EnricherException('Error retrieving data');
        }

        return $raw_data['result'];
    }
}
