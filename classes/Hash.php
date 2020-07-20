<?php

  class Hash{
    public static function make($string, $salt=''){
      return hash('sha1',$string . $salt);
    }

    public static function salt($length){

      $length = ($length<8)?8:$length;
      $length = ($length>16)?16:$length;
      $keyspace = '1234567890[{!@#$%;&*-+?}]ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz1234567890[{!@#$%;&*-+?}]ABCDEFGHIJKLMNOPQRSTUVWXYZ';
      return substr(str_shuffle($keyspace), 0, $length);
    }

    public static function unique(){
      return self::make(uniqid());
    }
  }

 ?>
