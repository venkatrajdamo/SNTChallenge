<?php

class Error extends Controller{

    private $viewFile;
    function __construct() {
        parent::__construct();
        $this->viewFile = 'error/error';
    }

    //Function to render error with message
    function withMsg($msg) {
        $this->view->msg = $msg;
        $this->view->render($this->viewFile);
    }

}
?>
