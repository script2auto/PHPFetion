<!DOCTYPE HTML>
<html>
 <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title> Hwei </title> 
  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
  <meta name="keywords" content="">
  <meta name="description" content="">
 </head>
<body>
<?php
require '../lib/PHPFetion.php';

$f = new SaeFetchurl();
$content_NC = $f->fetch('http://m.weather.com.cn/data/101240101.html');  //南昌（101240101） 
$content_YX = $f->fetch('http://m.weather.com.cn/data/101240206.html');  //永修（101240101）
$content_BJ = $f->fetch('http://m.weather.com.cn/data/101010100.html');  //北京（101010100） 
$content_TJ = $f->fetch('http://m.weather.com.cn/data/101030100.html');  //天津（101030100）
$weather_NC=json_decode($content_NC,true); 
$weather_YX=json_decode($content_YX,true);
$weather_BJ=json_decode($content_BJ,true);
$weather_TJ=json_decode($content_TJ,true);

$info_NC=$weather_NC['weatherinfo'];
$info_YX=$weather_YX['weatherinfo'];
$info_BJ=$weather_BJ['weatherinfo'];
$info_TJ=$weather_TJ['weatherinfo'];

$str_NC = "明天（".date('Y/m/d',strtotime('+1 day'))."），".$info_NC['city']."天气：".$info_NC['weather2']."，气温：".$info_NC['temp2']."，风速：".$info_NC['wind2']."，风力：".$info_NC['fl2']."。【信息来源：中国天气网】";

$str_YX = "明天（".date('Y/m/d',strtotime('+1 day'))."），".$info_YX['city']."天气：".$info_YX['weather2']."，气温：".$info_YX['temp2']."，风速：".$info_YX['wind2']."，风力：".$info_YX['fl2']."。【信息来源：中国天气网】";

$str_BJ = "明天（".date('Y/m/d',strtotime('+1 day'))."），".$info_BJ['city']."天气：".$info_BJ['weather2']."，气温：".$info_BJ['temp2']."，风速：".$info_BJ['wind2']."，风力：".$info_BJ['fl2']."。【信息来源：中国天气网】";

$str_TJ = "明天（".date('Y/m/d',strtotime('+1 day'))."），".$info_TJ['city']."天气：".$info_TJ['weather2']."，气温：".$info_TJ['temp2']."，风速：".$info_TJ['wind2']."，风力：".$info_TJ['fl2']."。【信息来源：中国天气网】";


$fetion = new PHPFetion('', '');	// 手机号、飞信密码

$fetion->send('', $str_NC); //接收方手机号  
$fetion->send('', $str_YX);  
$fetion->send('', $str_TJ); 
$fetion->send('', $str_NC);
$fetion->send('', $str_BJ);
?>
</body>
</html>
