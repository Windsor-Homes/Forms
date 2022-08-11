<?php

require_once "classes/View/Forms/Elements/FormElement.php" ;

class SelectElem extends FormElement {

    protected $attr_arr ;
    protected $default_option ;
    protected $options ;


    /////////////////////////////////////////////

    public function __construct( array $param_arr ) {

        $this->validate_construction( $param_arr ) ;

        $this->dynamic_assignment( $param_arr ) ;

    }

    /////////////////////////////////////////////

    public function render() {

        $attr_str = $this->populate_attributes() ;
        $html[] = "<select $attr_str>" ;

        $html[] =
        "<option value=''>$this->default_option</option>\n" ;

        $html[] = $this->populate_options() ;

        $html[] = "</select>" ;

        $output = implode( "\n" , $html ) ;

        return $output ;
    }

    ////////////////////////////////////////////////////////////

    protected function validate_construction( array $param_arr ) {

        extract( $param_arr ) ;

        assert( is_array( $column_map ) ) ;
        assert( is_string( $column_map['value'] ) ) ;
        assert( is_string( $column_map['inner_html'] ) ) ;

        assert( is_string( $default_option ) ) ;

        assert( is_array( $attr_arr ) ) ;
        assert( isset( $attr_arr['name'] ) );
    }

    ////////////////////////////////////////////////////////////



    /////////////////////////////////////////////

    protected function populate_options()
    {
        foreach (
            $this->options AS $value => $inner_html
        ) {
            $options_arr .=
            " <option value='$value'>
                $inner_html
              </option>\n
            " ;
        }
        return $options_arr ;
    }

    /////////////////////////////////////////////

    protected function dynamic_assignment( $param_arr ) {
        foreach ( $param_arr AS $prop => $value ) {
            // assert( property_exists( self , $prop ) , "Property: '$prop' does not exist" ) ;
            $this->$prop = $value ;
        }
    }

}

?>
