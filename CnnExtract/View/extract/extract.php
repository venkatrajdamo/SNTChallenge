<?php require 'View/header.php';?>
<!--Page where all extracted content displayed-->
<div id="content">
    <!--Headline-->
    <h1><?php echo $this->headline;?> </h1>
    
    <!--Extracted Images-->
    <div id="images-panel">
        <p>
            <?php 
            if(count($this->images)>0){
                foreach($this->images as $img){ ?>
                    <img height="100px" width="100px" src='<?php echo '/CnnExtract/'.$img;?>'/>
            <?php }
            }
            else{
                ?>
                    <p>Warning : Article Pictures Not Found.!</p>
            <?php
            }
            ?>

        </p>
    </div>
    
    <!--Article content-->
    <p><?php echo $this->text;?> </p>
    </div>
<?php require 'View/footer.php';?>