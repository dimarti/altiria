<?php

/**
 * This file is part of altiria library
 *
 * Date: 01/12/17
 *
 * (c) Uscanga Josue <luis_josue_uscanga@hotmail.com> <josue@jelp.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return [

    /**
     * Username of the altiria user
     */
    'user' => env('ALTIRIA_USER'),

    /**
     * Password of your altiria user
     */
    'password' => env('ALTIRIA_PASSWORD'),

    /*
     * Domain id from altiria
     */
    'domain_id' => env('ALTIRIA_DOMAINID'),

    /*
     * Sender id from altiria
     */
    'sender_id' => env('ALTIRIA_SENDERID'),

    'domain' => 'http://www.altiria.net',
];
