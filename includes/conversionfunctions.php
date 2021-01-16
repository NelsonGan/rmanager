<?php
function numToMonth($num){
    if ($num == "1"){
        echo "January";
    } elseif (($num == "2")){
        echo "February";
    } elseif (($num == "3")){
        echo "March";
    } elseif (($num == "4")){
        echo "April";
    } elseif (($num == "5")){
        echo "May";
    } elseif (($num == "6")){
        echo "June";
    } elseif (($num == "7")){
        echo "July";
    } elseif (($num == "8")){
        echo "August";
    } elseif (($num == "9")){
        echo "September";
    } elseif (($num == "10")){
        echo "October";
    } elseif (($num == "11")){
        echo "November";
    } elseif (($num == "12")){
        echo "December";
    }
}

function monthToNum($mth){
    $month = strtolower($mth);
    if ($month == "january"){
        echo "1";
    } elseif ($month == "february"){
        echo "2";
    } elseif ($month == "march"){
        echo "3";
    } elseif ($month == "april"){
        echo "4";
    } elseif ($month == "may"){
        echo "5";
    } elseif ($month == "june"){
        echo "6";
    } elseif ($month == "july"){
        echo "7";
    } elseif ($month == "august"){
        echo "8";
    } elseif ($month == "september"){
        echo "9";
    } elseif ($month == "october"){
        echo "10";
    } elseif ($month == "november"){
        echo "11";
    } elseif ($month == "december"){
        echo "12";
    }
}

function ReturnMonthToNum($mth){
    $month = strtolower($mth);
    if ($month == "january"){
        return 1;
    } elseif ($month == "february"){
        return 2;
    } elseif ($month == "march"){
        return 3;
    } elseif ($month == "april"){
        return 4;
    } elseif ($month == "may"){
        return 5;
    } elseif ($month == "june"){
        return 6;
    } elseif ($month == "july"){
        return 7;
    } elseif ($month == "august"){
        return 8;
    } elseif ($month == "september"){
        return 9;
    } elseif ($month == "october"){
        return 10;
    } elseif ($month == "november"){
        return 11;
    } elseif ($month == "december"){
        return 12;
    }
}

function ReturnNumToMonth($num){
    if ($num == "1"){
        return "January";
    } elseif (($num == "2")){
        return "February";
    } elseif (($num == "3")){
        return "March";
    } elseif (($num == "4")){
        return "April";
    } elseif (($num == "5")){
        return "May";
    } elseif (($num == "6")){
        return "June";
    } elseif (($num == "7")){
        return "July";
    } elseif (($num == "8")){
        return "August";
    } elseif (($num == "9")){
        return "September";
    } elseif (($num == "10")){
        return "October";
    } elseif (($num == "11")){
        return "November";
    } elseif (($num == "12")){
        return "December";
    }
}