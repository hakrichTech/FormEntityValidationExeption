<?php
namespace FormEntityValidationExeption;

use FormEntityValidationExeption\MailValidator;


/**
 *
 */
class NotEmptyValidator extends MailValidator
{

  function __construct()
  {
    parent::__construct();
  }
  public static function IS_EMPTY($value){
    return trim($value) == "";
  }
}

 ?>