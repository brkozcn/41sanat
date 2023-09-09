<?php

$URL = 'data.json';
$JSON = file_get_contents($URL);
$data = json_decode($JSON, TRUE);
$ilk = $data["id0"];
echo $ilk['name'];
