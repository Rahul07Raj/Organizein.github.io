<?php
$url = 'https://script.google.com/macros/s/AKfycbxq9SN5OFC2N_vUdfCMTVF4ZkqQDEw2cdsLssLWJwL4aXYCr1f5dLVqZKNt6v9wrJdr/exec';

$data = [
    'Name' => $_POST['name'],
    'Company' => $_POST['company'],
    'Email' => $_POST['email'],
    'Phone' => $_POST['phone'],
    'Interested Services' => $_POST['service'],
    'Budget' => $_POST['budget'],
    'Message' => $_POST['message'],
    'URL' => $_SERVER['SERVER_NAME']
];
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // follow redirects
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
$response = curl_exec($ch);
$response = json_decode($response, true);
echo $response['result'];