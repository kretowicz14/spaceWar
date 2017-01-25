<?php
/**
 * Created by PhpStorm.
 * User: artur
 * Date: 22.01.17
 * Time: 22:12
 */

require __DIR__.'/vendor/autoload.php';

$clint = new \GuzzleHttp\Client([
    'base_url' => 'http://localhost:8000',
    'defaults' => [
        'exceptions' => false,
    ]
]);

$data = array(
    'email' => 'tester@fasd.com',
    'name' => 'tester',
    'surname' => 'testerownik',
    'password' => '123',
    'username' => 'tester_user'
);

$response = $clint->post('http://localhost:8000/api/register', [
    'body' => json_encode($data)
]);

var_dump($response);
echo "\n\n";