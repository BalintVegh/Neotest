<?php

namespace App\Helpers;



use Illuminate\Support\Facades\Session;

class NotificationHelper
{
    private $message;
    private $type;
    private $hasNotification = false;

    public function __construct()
    {
        if($this->checkNotification()){
           $this->hasNotification = true;
           $this->setData();

        }
    }

    public function checkNotification()
    {
        return (Session::has('success') || Session::has('error'));
    }

    private function setData(){
        if(Session::has('success')){
            $this->type = 'success';
            $this->message = session('success');
        } else if(Session::has('error')){
            $this->type = 'danger';
            $this->message = session('error');
        }
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function getType()
    {
        return $this->type;
    }


    public function isHasNotification()
    {
        return $this->hasNotification;
    }


}