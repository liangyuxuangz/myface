<?php


/* curl -X POST --header 'Content-Type: application/json' --header 'Accept: application/json' -d '{
  "secret": "9ld2fq1g2n3pt1sat4cts7060nkndaisql9fjoo7",
  "expiresIn": 3600
}' 'https://api.bi.tuputech.com/v1/auth/token/tgr3cu3qlr63ib85k71brcchp1vu1elolbpbqrgl' */
$data=array(
  "secret"=>"9ld2fq1g2n3pt1sat4cts7060nkndaisql9fjoo7",
  "expiresIn"=>3600
);
$data = json_encode($data);
$headerArray = array("Content-type:application/json;charset='utf-8'", "Accept:application/json");
$curl = curl_init();
$url='https://api.bi.tuputech.com/v1/auth/token/tgr3cu3q1r63ib85k7lbrcchp1vu1elolbpbqrgl';
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headerArray);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec($curl);
echo $output;
curl_close($curl);
json_decode($output，true);


?>




