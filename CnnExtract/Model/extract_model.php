<?php
class Extract_Model extends Model {

    function __construct() {
        parent::__construct();
    }
    function extract($url) {
        $data = array();
        $images = array();
        
        //Get html content from the URL
        $html = file_get_contents( $url);
        libxml_use_internal_errors( true);
        $doc = new DOMDocument;
        $doc->loadHTML( $html);
        $xpath = new DOMXpath( $doc);
        
        //Extract Headline From The HTML content
        $headline =  "";
        $headlineNode = $xpath->query( '//h1[@class="pg-headline"]')->item(0);
        if(!empty($headlineNode) ){
            $headline =  $headlineNode->textContent."</br>";
        }
        else{
            $headline =  "Warning : Headline Not Found";
        }
        
        //Extract Article Content From The HTML content
        $textNodes = $xpath->query( '//div[@class="zn-body__paragraph"]');
        $text = "";
        if(!empty($textNodes) ){
            for($i=0; $i<$textNodes->length;$i++ ){
                $text = $text."</br>".$textNodes->item($i)->textContent;
            }
        }
        if($text == "" ){
            $text =  "Warning : Article Content Not Found";
        }
        
        //Delete All Previous Images From Image Folder
        $files = glob('Images/*');
        foreach($files as $file){ 
          if(is_file($file))
            unlink($file);
        }
        
        //Extract Article Pictures From The HTML content
        $imageNodes = $xpath->query('//img[@class="media__image"]');
        if(!empty($imageNodes) ){
            $i = 1;
            foreach ($imageNodes as $img) {
                    $iurl = $img->getAttribute('src');
                    $name = explode('/', $iurl);
                    $image = 'Images/'.$name[count($name)-1];
                    if (!in_array($image, $images)) {            
                    array_push($images, $image);
                    file_put_contents($image, file_get_contents($iurl));
                }
            }
        }        
           
        //Store all contents into data container
        array_push($data, $headline);
        array_push($data, $images);
        array_push($data, $text);
        
        return $data;
    }

}
?>
