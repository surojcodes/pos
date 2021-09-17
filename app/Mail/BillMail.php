<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BillMail extends Mailable
{
    use Queueable, SerializesModels;
    public function __construct($client,$billName)
    {
        $this->client = $client;
        $this->billName = $billName;
    }

    public function build()
    {
        $address = 'noreply@eprimatech.com';
        $name = 'E-Prima Technology';
        $subject= 'New Bill from Eprima Technology Pvt.Ltd..';
        if($this->billName!='N/A'){
            $location = storage_path("app/public/bill_images/".$this->billName);
            return $this->view('mails.billMail')
                    ->from($address, $name)
              		->subject($subject)
              		->attach($location)
              		->with('client',$this->client);
        }
        return $this->view('mails.billMail')
                    ->from($address, $name)
              		->subject($subject)
              		->with('client',$this->client);
        
    }
}
