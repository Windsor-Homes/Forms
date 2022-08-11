<?php

namespace Lib\Forms;

abstract class FormElement {

    protected $wrapper;

    protected $attributes = [
        'name' => null,
        'id' => null
    ];



    abstract function errorCheck(array $param_arr);
    abstract function render(): string;

    //////////////////////////////////////////////////

    public function setName(string $name)
    {
        $this->attributes['name'] = $name;
        return $this;
    }


    public function setID(string $id)
    {
        $this->attributes['id'] = $id;
        return $this;
    }


    public function setClass(string $class)
    {
        $this->attributes['class'] = $class;
        return $this;
    }


    public function setAttr(string $attr, $value)
    {
        $this->attributes[$attr] = $value;
        return $this;
    }


    public function setLabel(string $label)
    {
        $this->label = $label;
        return $this;
    }


    public function setWrapper(string $css_wrapper)
    {
        $this->wrapper = $css_wrapper;
        return $this;
    }


    //////////////////////////////////////////////////

    protected function populate_attributes() {
        foreach ( $this->attributes AS $attr => $value ) {
            $attributes[$attr] = "$attr='$value'" ;
        }
        return implode( "\n\t" , $attributes ) ;
    }



}

?>
