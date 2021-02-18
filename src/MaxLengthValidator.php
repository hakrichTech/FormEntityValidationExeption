<?php
namespace FormEntityValidationExeption;

use ObjectAddOn\AddInObject\Object_;

/**
 *
 */
class MaxLengthValidator extends Object_
{
  protected static $maxLength = -1;
  protected static $maxLength_error=false;

  function __construct()
  {
    
  }
  
  public static function IS_MAX_LENGTH_VALID($value){
    if(strlen($value) <= self::$maxLength){
      return true;
    }else{
      if (self::$maxLength_error != false && isset(self::$maxLength_error['length'])) {
        return self::$maxLength_error['length'];
        
      }else{
        return "Error: CODE 8962085295798";
      }

    }
  }

 public static function SET_MAXLENGTH($maxLength){
   $maxLength = (int) $maxLength;
   if ($maxLength > 0){
     self::$maxLength = $maxLength;
   }else {
     self::$maxLength_error['length']="The minumum max length must be more than 0!";
   }
 }
}

 ?>
