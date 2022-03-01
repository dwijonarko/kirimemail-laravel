# kirimemail-laravel

[Kirimemail transactional](https://kirim.email/transactional) package for Laravel Framework

## How To Use

### Install
To install kirim.email as a Composer package to be used with Laravel , simply run:

    composer require "dwijonarko/kirimemail-laravel"

### Setup
Just simple, add your API Key , SMTP Username and Domain in your Laravel .env
 
    KIRIMEMAIL_SMTP_API_KEY=your-transactional-api-key
    KIRIMEMAIL_SMTP_USERNAME=your-smtp-user-name
    KIRIMEMAIL_SMTP_DOMAIN=your-domain
### Send Email

    <?php
    namespace  App\Http\Controllers;
    use  Dwijonarko\Kirimemail\Kirimemail;
    use  Illuminate\Http\Request;
    
    class  KirimemailController  extends  Controller{
	    public  function  index()
	    {
		    $to =  'dwi.wijonarko@gmail.com';
		    $subject =  'Test Kirimemail';
		    $body =  '<h1>KIRIM.EMAIL Transactional</h1><p>Transactional email service with superior deliverability, easy integration, and scalable infrastructure</p>';
		    return  Kirimemail::send($to, $subject, $body);
	    }
    
    }


