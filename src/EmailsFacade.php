<?php namespace	Nredbugs\Emails;

use Illuminate\Support\Facades\Facade;

class EmailsFacade extends Facade
{
    protected static function getFacadeAccessor() { 
        return 'emails';
    }
}