<?php
/**
 * @author Petr Grishin <petr.grishin@grishini.ru>
 */
 

namespace PetrGrishin\Fias\Entity;


use CActiveRecord;

class ActiveRecord extends CActiveRecord {

    public static function className() {
        return get_called_class();
    }

    public static function model($className = null) {
        return parent::model($className ? : get_called_class());
    }
}
