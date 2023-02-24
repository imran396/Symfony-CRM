<?php

namespace Beon\IntranetBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ExcelImportControllerTest extends WebTestCase
{
    public function testUpload()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/upload');
    }

    public function testSelect()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/select');
    }

}
