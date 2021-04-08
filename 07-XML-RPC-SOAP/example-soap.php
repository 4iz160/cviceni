<?php
  //ukázka volání SOAP metody pomocí SoapClient - POZOR, NEFUNGUJE NA SERVERU eso.vse.cz

  try {
    //připojení ke službě
    $options = [
      'soap_version'=>SOAP_1_2,
      'exceptions'=>true,
      'trace'=>1,
      'cache_wsdl'=>WSDL_CACHE_NONE,
      'stream_context' => stream_context_create(["ssl"=> ["verify_peer"=>false, "verify_peer_name"=>false, 'crypto_method' => STREAM_CRYPTO_METHOD_TLS_CLIENT]])
    ];
    $calculatorClient = new SoapClient('http://www.dneonline.com/calculator.asmx?wsdl', $options);

    //volání vzdálené metody Add
    $response = $calculatorClient->Add(['intA'=>10,'intB'=>2]);

  } catch (Exception $e) {
    echo "<h2>Exception Error!</h2>";
    echo $e->getMessage();
  }

  var_dump($response);