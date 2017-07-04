<?php

use Illuminate\Http\Request;

return [

    /*
     * Set trusted proxy IP addresses.
     *
     * Both IPv4 and IPv6 addresses are
     * supported, along with CIDR notation.
     *
     * The "*" character is syntactic sugar
     * within TrustedProxy to trust any proxy;
     * a requirement when you cannot know the address
     * of your proxy (e.g. if using Rackspace balancers).
     */
    //    'proxies' => [
    //        '192.168.1.10',
    //    ],

    /*
     * Or, to trust all proxies, uncomment this:
     */
    'proxies' => '*',

    /*
     * Default Header Names
     *
     * Change these if the proxy does
     * not send the default header names.
     *
     * Note that headers such as X-Forwarded-For
     * are transformed to HTTP_X_FORWARDED_FOR format.
     *
     * The following are Symfony defaults, found in
     * \Symfony\Component\HttpFoundation\Request::$trustedHeaders
     */
    'headers' => [
        Request::HEADER_X_FORWARDED_FOR   => 'cloudfront-forwarded-For',
        Request::HEADER_X_FORWARDED_HOST  => 'cloudfront-forwarded-Host',
        Request::HEADER_X_FORWARDED_PROTO => 'cloudfront-forwarded-proto',
        Request::HEADER_X_FORWARDED_PORT  => 'cloudfront-forwarded-Port',
    ],
];
