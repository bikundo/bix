<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class testContactForm extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testContact()
    {
        $this->visit('/')
            ->press('contact-btn');
    }
}
