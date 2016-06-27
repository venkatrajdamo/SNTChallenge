<?php
class View {

    function __construct() {
        
    }
    
    public function  render($file){
        require 'View/'.$file.'.php';
    }

}
?>
