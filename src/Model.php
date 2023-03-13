<?php

namespace MonsterCat;

/**
 * Description of Model
 *
 * @author darius
 */
class Model {

    public function __construct($jsonObj = []) {
        if($jsonObj){
            $this->populate($jsonObj);
        }
    }

    /**
     * Magic property filler
     * 
     * @param type $jsonObj
     */
    public function populate($jsonObj) {

        $jsonObj = is_array($jsonObj) ? (object) $jsonObj : $jsonObj;

        foreach ($jsonObj as $property => $value) {
            if (property_exists(static::class, $property)) {
                $this->{$property} = $value;
            }
        }
    }
}