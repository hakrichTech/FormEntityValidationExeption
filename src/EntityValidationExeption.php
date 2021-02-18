<?php  
namespace FormEntityValidationExeption;

use FormEntityValidationExeption\Validator;
use FormEntityValidationExeption\NotNullValidator;
use FormEntityValidationExeption\Postdata\Verification\InputVerif\Tel;


class EntityValidationExeption extends Validator
{
    private static $data;
    private static $checking;
    private static $error;
    private static $validator;
    private static $app;
    private static $tel;
  

    function __construct(array $data_type)
    {  
        parent::__construct("");
        self::$data = $data_type;
        self::$app = $this;
        self::$tel = new Tel();
        self::$validator = new NotNullValidator();
    }

    public static function CHECK(array $var):void
    {
        self::$checking = $var;
    }


    public static function LENGTH($y, $x)
    {
        if(self::$validator::IS_NULL(self::$data[$x])){
            self::$error[$x]['null'] = true;
           }else{
            self::$validator::SET_MAXLENGTH($y);
            $boolen = self::$validator::IS_MAX_LENGTH_VALID(self::$data[$x]);
            self::$error[$x]['length'] = $boolen;
           }
    }

    public static function TYPE($x, $y)
    {
        switch ($x) {
            case 'email':
                self::$error[$y]['email'] = self::$validator::IS_EMAIL_VALID(self::$data[$y]);
                break;
            case "tel":
                self::$tel::IS_TEL_VALID(array("tel"=>(int) self::$data[$y]));
                self::$error[$y]['tel'] = self::$tel::IS_ERROR();
                break;
        }
    }

    public static function ANALYSE():void
    {
       
       
       foreach (self::$checking as $key => $value) {
       
          foreach ($value as $ke => $valu) {
             $method = strtoupper($ke);
             if (!is_callable(array(self::$app, $method))){
                throw new \RuntimeException('Action "'.$ke.'"is not define!');
             }else {
                 self::$method($valu, $key);
             }
          }

         
       }
    }

    public static function ANALYSE_RESULT()
    {
        return self::$error;
    }

    public static function IS_VALID($value)
    {
        
    }

    
}



?>