<?php

public function input_label( $for , $label ) {

    $output = "<label for='$for'>$label</label>" ;
    $output .= "<br>" ;

    return $output ;
}

?>
