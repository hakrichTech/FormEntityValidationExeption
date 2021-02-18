<?php
namespace FormEntityValidationExeption;

use FormEntityValidationExeption\MaxLengthValidator;
use FormEntityValidationExeption\Postdata\Verification\MailVerification\MailVerification;

/**
 *
 */
class MailValidator extends MaxLengthValidator
{
  
  function __construct()
  {
    parent::__construct();
  }
  public static function IS_EMAIL_VALID($value){

        $cals=new MailVerification($value);
        $cals::Checkvalidity($cals::CHECK_VALIDITY);

    return $cals::response_return_by_validity();
  }
}

 ?>