<?php

namespace Lib\Forms;

require_once "FormElement.php" ;
use Lib\Forms\FormElement;


class Input extends FormElement
{
    const ACCEPTED_TYPES = [
        "button" ,
        "checkbox" , "color" ,
        "date" , "datetime-local" ,
        "email" ,
        "file" ,
        "hidden" ,
        "image" ,
        "month" ,
        "number" ,
        "password" ,
        "radio" , "range" , "reset" ,
        "search" , "submit" ,
        "tel" , "text" , "time" ,
        "url" ,
        "week"
    ];

    const SUPPORTED_ATTR = [
        'accept',
        'alt',
        'autocomplete',
        'autofocus',
        'checked',
        'dirname',
        'disabled',
        'form',
        'formaction',
        'formmethod',
        'formnovalidate',
        'formtarget',
        'height',
        'list',
        'max',
        'maxlength',
        'min',
        'minlength',
        'multiple',
        'name',
        'pattern',
        'placeholder',
        'readonly',
        'required',
        'size',
        'src',
        'step',
        'type',
        'value',
        'width'
    ];


    //////////////////////////////////////////////////

    public function __construct( array $attr_arr )
    {

        $this->errorCheck( $attr_arr ) ;
        $this->attr_arr = $attr_arr ;
    }


    public function setType(string $type)
    {
        if (! in_array($type, self::ACCEPTED_TYPES)) {
            throw new \Exception("$type is unsupported as a 'type attribute'");
        }

        $this->attributes['type'] = $type;
        return $this;
    }


    public function setValue($value)
    {
        $this->attributes['value'] = $value;
        return $this;
    }


    //////////////////////////////////////////////////

    public function errorCheck()
    {
        if (!isset($this->attributes['name'])) {
            throw new \Exception("Attribute 'name' MUST be set");
        }
    }

    //////////////////////////////////////////////////

    public function render()
    {

        $attr_str = $this->populate_attributes() ;
        $output = "<input $attr_str>" ;
        return $output ;
    }

    //////////////////////////////////////////////////




}




?>
