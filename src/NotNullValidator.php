<?php
namespace FormEntityValidationExeption;

use FormEntityValidationExeption\NotEmptyValidator;


/**
 *
 */
final class NotNullValidator extends NotEmptyValidator
{

  function __construct()
  {
    parent::__construct();
  }
  public static function IS_NULL($value){
    return is_null($value);
  }

  public static function ERROR()
  {
    return self::$maxLength_error;
  }
}

 ?>
