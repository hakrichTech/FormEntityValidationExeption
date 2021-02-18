<?php

namespace FormEntityValidationExeption;

use DatabaseManagers_space\Entity;
use FormEntityValidationExeption\Field;

/**
 *
 */
class Form
{
  protected static $entity;
  protected static $fields;
  protected static $app;

  function __construct(Entity $entity)
  {
    self::SET_ENTITY($entity);
    self::$app=$this;
  }
  public static function ADD(Field $field)
  {
    $attr = $field::NAME();
    $field::SET_VALUE(self::$entity::$attr());
    self::$fields[] = $field;
    return self::$app;
  }

  public static function CREATE_VIEW()
  {
    $view = '';

    foreach (self::$fields as $field)
    {
    $view .= $field::BUILD_WIDGET().'<br />';
    }
    return $view;
  }

  public static function IS_VALID()
  {
    $valid = true;


    foreach (self::$fields as $field)
    {
        if (!$field::IS_VALID())
          {
             $valid = false;
          }
    }
    return $valid;

  }

  public static function ENTITY(){return self::$entity;}
  public static function SET_ENTITY(Entity $entity){self::$entity = $entity;}
}


 ?>
