<?php
/**
 * Invoice Ninja (https://invoiceninja.com).
 *
 * @link https://github.com/invoiceninja/invoiceninja source repository
 *
 * @copyright Copyright (c) 2021. Invoice Ninja LLC (https://invoiceninja.com)
 *
 * @license https://opensource.org/licenses/AAL
 */

namespace App\Utils\HostedPDF;

use GuzzleHttp\RequestOptions;

class NinjaPdf
{

    private $url = 'https://pdf.invoicing.co/api/';

    public function build($html)
    {

nlog("building remotely");


        $client =  new \GuzzleHttp\Client(['headers' => 
            [ 
            'X-Ninja-Token' => 'test_token_for_now',        
            ]
        ]);

        $response = $client->post($this->url,[
            RequestOptions::JSON => ['html' => $html]
        ]);

        return $response->getBody();
    }

}