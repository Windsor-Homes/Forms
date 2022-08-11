<?php


class ButtonForm
{
    private $data ;
    private $action ;
    private $inner_html ;
    private $class ;
    private $css_path ;


    ////////////////////////////////////////////////////////////

    public function __construct( array $params ) {

        foreach ( $params AS $param => $value ) :
            $this->$param = $value ;
        endforeach ;
    }

    ////////////////////////////////////////////////////////////

    public function render() {

        $this->validate_construction() ;

        $form[] =
        " <form method='POST' action='$this->action'>
        " ;

        foreach ( $this->data AS $key => $value ) :

            $form[] = "<input type='hidden' name='$key' value='$value'>" ;

        endforeach ;

        $form[] =
        "<input class='$this->class' type='submit' value='$this->inner_html'>" ;

        $form[] = "</form>" ;

        return implode( "\n" , $form ) ;
    }

    ////////////////////////////////////////////////////////////

    private function validate_construction()
    {
        if ( !isset( $this->data ) ) {
            throw new Exception( 'There is no data to supply the Button Form' ) ;
        }

        if ( !isset( $this->action ) ) {
            throw new Exception( 'Cannot POST data without Action' ) ;
        }

        if ( !isset( $this->inner_html ) ) {
            throw new Exception( 'Cannot leave the Button Empty' ) ;
        }
    }


}

?>
