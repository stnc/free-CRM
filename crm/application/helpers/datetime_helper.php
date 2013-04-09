<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('tr_dateTime'))
{


function tr_dateTime($date_,$ayrac="-"){
$tarih = explode($ayrac, $date_); 
$tarih2 = explode(" ", $tarih[2]);
return $tarih2[0].$ayrac.$tarih[1].$ayrac.$tarih[0].' '.$tarih2[1]; 
}


//sql i ekrana basar
function tr_date($date_,$ayrac="-",$c='.'){
$tarih = explode($ayrac, $date_); 
$tarih2 = explode(" ", $tarih[2]);
//return $tarih2[0].$ayrac.$tarih[1].$ayrac.$tarih[0]; //ayrac parametsine göre basma içindir
return $tarih2[0].$c.$tarih[1].$c.$tarih[0]; 

}

//jqery inputlardan gelen deðeri döndürür sql e gönderir
function tr_date_add($date_,$ayrac="."){
$tarih = explode($ayrac, $date_);
$tarih2 = explode(" ", $tarih[2]);//17 02:13:53
return $tarih2[0].'-'.$tarih[1].'-'.$tarih[0]; 
}




}