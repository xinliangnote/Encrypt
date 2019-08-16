<?php

$param['name'] = 'Tom';
$param['pwd']  = '123456';
$param['age']  = 30;

ksort($param);

$val = http_build_query($param, '', '&xl_', PHP_QUERY_RFC3986);

$secret = '123456789';

$sign = md5(md5($val).md5($secret));

echo 'sign: '.$sign;

//sign: 33b940c8f18ede393ea34cd45c406db4
