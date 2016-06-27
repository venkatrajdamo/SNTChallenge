<?php require 'View/header.php';?>
<div id="content">
    <div align="center" style="padding:50px;" >
        <div id="mid-panel" >
                <form action="extract/extract" method="post">
                    CNN Article URL: 
                    <input style="width:380px" type="url" name="cnnUrl" placeholder="Starts with http://www.cnn.com/<some article>" pattern="http?://www.cnn.com.+" required/></br>
                    <input type="submit" value="Submit"/>
                </form> 
        </div>
        
    </div>   
    <h6>Tested Input URLs: </br>
            http://www.cnn.com/2016/06/24/us/oakland-police-scandals/index.html</br>
            http://www.cnn.com/2016/06/25/politics/differences-brexit-donald-trump/index.html
    </h6>
</div>
<?php require 'View/footer.php';?>