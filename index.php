<?php
require_once 'client.php';

/**
 * GET request with parameters.
 */
function getRequest($url)
{
  return client::get($url.'/get', ['name' => 'bar', 'email' => 's.aus0609@gmail.com', 'url' => 'https://github.com/sowmyasavulgae/http-client']);
}

/**
 * OPTIONS request.
 */
function optionsRequest()
{
  return client::options($url);
}

/**
 * Submit assessment.
 */
function postRequest($url)
{
  $tokenResponse = client::options($url);

  return client::post(
    $url,
    [
      'name' => 'Sowmya Savulgae',
      'email' => 's.aus0609@gmail.com',
      'url' => 'https://github.com/sowmyasavulgae/http-client',
    ],
    [
      'Authorization' => 'Bearer ' . $tokenResponse->getBody(),
      'content-type' => 'application/json',
    ]
  );
}

/**
 * Client call.Print response.
 */
$url = "https://corednacom.corewebdna.com/assessment-endpoint.php";

try {
    $response = postRequest($url);
    echo '<h1>Response header:</h1><pre>';
    print_r($response->getHeaders());
    echo '<h1>Response payload:</h1><pre>';
    print_r($response->getBody());
} catch (Exception $e) {
    echo 'Error: ';
    var_dump($e);
}
