<?php
namespace FormEntityValidationExeption\Postdata\Verification\InputVerif;

/**
 *
 */

use ObjectAddOn\AddInObject\Object_;

class Tel extends Object_

{
  protected static $error = false;
  protected static $data_expected=array('tel');


  function __construct()
  {
  }

  protected static function AN_AUTHORISED_CHARACTER($string)
  {

    $string = str_replace( "\\", " ", $string );
    $string = str_replace( ";", " ", $string );
    $string = str_replace( "'", " ", $string );
    $string = str_replace( ".", " ", $string );
    $string = str_replace( "=", " ", $string );
    if ( strpos( $string, ';' ) ) exit ( "$string is an invalid value for variety!" );
    return $string ;

  }

  public static function IS_TEL_VALID($request)
  {
     
     foreach ($request as $key => $value) {
       if (in_array($key,self::$data_expected)) {
           if ($key=="tel") {
             if (!is_int($value)) {
               self::$error="Error: This field you try to submit is not a number";
               break;
             }else {
               if (strlen((string) $value) == 9) {
                 self::$error = false;
               }else{
                self::$error = "The Telephone number must be 10 degits!";

               }
               break;
             }
           }

         }else {
           self::$error="Error: 1004997";
           break;
         }

     }
  }


  public static function IS_ERROR()
  {
    
    if (is_string(self::$error)) {
      return self::$error;
    }else {
      return "valid!";
    }
  }


}

 ?>
