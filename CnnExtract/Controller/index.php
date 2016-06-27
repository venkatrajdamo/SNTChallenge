<?php

class Index extends Controller{

    private $viewFile;
    function __construct() {
        parent::__construct();
        $this->viewFile = 'index/index';
        $this->view->render($this->viewFile);
    }

}
