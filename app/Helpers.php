<?php
function getPrice($price){

    // dd(floatval($price) );

    $price = doubleval($price)/100;

    return number_format($price, 3,'.',' ').' FCFA';
}

function Price($price){

    $price = doubleval($price)/100;

    return number_format($price, 3,'',' ');
}
