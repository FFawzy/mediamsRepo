<?php

class Posthelper {
    public function arrayfrompost($post){
        $array = array();
        foreach($post as $key => $value){
            $array[$key] = $value;
        }
    }
}
