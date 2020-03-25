<?php

function getPrice($priceIndecilmals)
{
    $price = floatval($priceIndecilmals)/100;
    return number_format($price,2,',',' ') . ' $';
}
?>
