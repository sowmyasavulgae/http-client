<?php
$url = "https://corednacom.corewebdna.com/assessment-endpoint.php";
$data = array(
  "name" => "Sowmya Savulgae",
  "email" => "s.aus0609@gmail.com",
  "url" => "https://github.com/sowmyasavulgae/http-client.git"
);
$options = array(
	'http' => array(
		'header' => "Content-type: application/x-www-form-urlencoded",
		'method' => 'POST',
		'content' => http_build_query($data)
	)
);

$context = stream_context_create($options);
$resp = file_get_contents($url,false,$context);
var_dump($resp);
?>