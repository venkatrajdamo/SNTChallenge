<?php
class Extract extends Controller {

    private $viewFile;
    function __construct() {
        parent::__construct();
        $this->viewFile = 'extract/extract';
    }

    //Extract Contents From Web Page
    function extract() {
        if(isset($_POST['cnnUrl'])){
            $url = $_POST['cnnUrl'];
            require 'Model/extract_model.php';
            $model = new Extract_Model($url);
            $data = $model->extract($_POST['cnnUrl']);
            $this->view->headline = $data[0];
            $this->view->images = $data[1];
            $this->view->text = $data[2];
            $this->view->render($this->viewFile);
        }
        
    }

}
?>