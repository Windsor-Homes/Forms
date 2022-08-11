<?php

namespace Lib\Forms;

class Form
{
    const SUPPORTED_ATTR = [
        'accept-charset',
        'action',
        'autocomplete',
        'enctype',
        'method',
        'name',
        'novalidate',
        'rel',
        'target'
    ];


    private $attributes = []; // array of html attributes
    private $elements = []; // array of objects


    //////////////////////////////////////////////////

    public function __construct(array $attributes = null)
    {
        if ($attributes == null) {
            return ;
        }

        foreach ( $attributes AS $attr => $value ) :
            if (in_array($attr, self::SUPPORTED_ATTR)) {
                $this->attributes[$attr] = $value ;
            }
        endforeach ;
    }


    public function setAction($action)
    {
        $this->attributes['action'] = $action;
        return $this;
    }


    public function setEncoding($enctype)
    {
        $this->attributes['enctype'] = $enctype;
        return $this;
    }


    public function setName($name)
    {
        $this->attributes['name'] = $name;
        return $this;
    }


    /////////////////////////////////////////////

    public function render()
    {
        // parse attributes into a string
        $attr_str = $this->process_attributes( $this->attributes ) ;

        ob_start() ;

        echo "<form $attr_str>" ;
        foreach ($this->elements as $element):
            echo $element->render();
        endforeach;
        echo "</form>" ;

        $output = ob_get_contents() ;
        ob_end_clean() ;

        return $output ;
    }


    ////////////////////////////////////////////////////////////

    public function addInput(array $params)
    {
        $input = new Input($params);
        $this->elements[] = $input;

        return $input;
    }


    ////////////////////////////////////////////////////////////

    public function addSelect(array $params)
    {
        $select = new FormSelect($params);
        $this->elements[] = $select;

        return $select;
    }


    ////////////////////////////////////////////////////////////

    public function addSubmit( array $arg_arr )
    {
        $attr_str = $this->process_attributes( $arg_arr ) ;

        $html = "<input type='submit' $attr_str>" ;

        $this->elem_arr[] = $html ;
    }


    ////////////////////////////////////////////////////////////

    private function process_attributes( array $attr_arr )
    {
        // parse each element of the array into a key-value string
        // put each element into a new array
        foreach ( $attr_arr AS $attr => $value ) :
            $attr_str = "$attr='$value'" ;
            $attr_str_arr[] = $attr_str ;
        endforeach ;

        // implode the $attr_str array separated by a new line character
        $attr_str = implode( "\n" , $attr_str_arr ) ;

        // echo Test::print( $attr_str ) ;

        return $attr_str ;
    }


}

 ?>
