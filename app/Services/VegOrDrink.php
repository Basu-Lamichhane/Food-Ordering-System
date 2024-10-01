<?php

namespace App\Services;
class VegOrDrink
{
    /**
     * Upload Service for All Models
     *
     * @param bool $isveg
     * @param bool $isdrink
     * @return string
     */
    public static function status($status)
    {
        $status= strtolower($status);
        if($status=="pending"){
            return "yellow";
        }
        else if($status=="processing"){
            return "blue";
        }
        else if($status=="cancelled"){
            return "red";
        }
        else{
            return "green";
        }
    }
     public static function icon($isveg, $isdrink)
    {
        if( $isdrink==1)
        {
            return "fa-wine-glass text-primary";
        }
       
        elseif($isveg==0 && $isdrink==0){
            return "fa-drumstick-bite text-danger";
        }
        
        else{
            return "fa-leaf text-success";
        }
       
    }
    public static function img($isveg, $isdrink)
    {
        if( $isdrink==1)
        {
            return "img/drinks.png";
        }
       
        elseif($isveg==0 && $isdrink==0){
            return "https://upload.wikimedia.org/wikipedia/commons/b/ba/Non_veg_symbol.svg";
        }
        
        else{
            return "https://upload.wikimedia.org/wikipedia/commons/7/78/Indian-vegetarian-mark.svg";
        }
       
    }
    
}
