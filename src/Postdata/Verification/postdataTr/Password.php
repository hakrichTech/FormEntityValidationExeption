<?php
namespace FormEntityValidationExeption\Postdata\Verification\postdataTr;
/**
 *
 */
class Password
{
  protected static $error=0;
  protected static $password0;
  protected static $password;

  function __construct(array $pswd)
  {
    self::$password = $pswd["password"];
    self::$password0 = $pswd["pswd_Confirm"];
  }
  public static function password($x="none",$y="none")
  {
    if ($x=="none"&&$y=="none") {
      $x=self::$password;
      $y=self::$password0;
    }
    if ($x!=""&&$y!="") {
      if ($x==$y) {
        if (self::passCheck($y)) {
          self::$error=0;
          return 1;
        }else {
          return self::$error;
        }
      }else {
        self::$error="Oops! Password is not match.";
        return self::$error;

      }
    }else {
      self::$error="Oops! Password filed is empty.";
      return self::$error;
    }

  }

 public static function passCheck($x)
 {
  if (strlen($x)>=6) {
    if (preg_match("#[!$()%\.~`:>;&'<*+/\#=},?^_{|@]#",$x)) {
      self::$error=0;
    return 1;
  }else {
    self::$error="Oops! Password is invalid is not contain spacial Characters.";
    return 0;
  }
  }else {
    self::$error="Oops! Password legnth must be 6  character and above.";

  return 0;
  }
 }


}

 ?>
