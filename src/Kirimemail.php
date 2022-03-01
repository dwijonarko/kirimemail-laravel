<?php

namespace Dwijonarko\Kirimemail;

class Kirimemail
{
    protected static $base_url =  'https://app.kirim.email/api/v3/';
    protected static $api_key;
    protected static $username ;
    protected static $domain;

    public static function hello()
    {
        return 'Hello Kirimemail';
    }

    public static function set_auth()
    {
        self::$api_key = env('KIRIMEMAIL_SMTP_API_KEY', '');
        self::$username = env('KIRIMEMAIL_SMTP_USERNAME', '');
        self::$domain = env('KIRIMEMAIL_SMTP_DOMAIN', '');
    }
    /** Send email with kirim email transactaional
     *
     * @param string $email
     * @param string $subject
     * @param string $body
     */
    public static function send($email, $subject, $body)
    {
        self::set_auth();

        $client = new \GuzzleHttp\Client([
            'base_uri' => self::$base_url . 'transactional/',
        ]);

        $envelope = [
            'from' => self::$username,
            'to' => $email,
            'subject' => $subject,
            'text' => $body,
        ];

        try {
            $response = $client->request('POST', 'messages', [
                'form_params' => $envelope,
                'auth' => [
                    'api',
                    self::$api_key
                ],
                'headers' => [
                    'domain' => self::$domain,
                ]
            ]);
            return $response->getBody()->getContents();
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
            return $response->getBody()->getContents();
        }
    }
}
