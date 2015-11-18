<?php

namespace AppBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class APITest extends WebTestCase
{
    public function test_it_lists_students()
    {
        $client = static::createClient([], [
            'X-Token' => 'MyApiToken' // à changer !
        ]);

        $crawler = $client->request('GET', '/api/students');

        // ...
    }
}
