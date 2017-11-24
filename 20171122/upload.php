<?php
extract($_POST);
echo "Height:".$height."<br>";
echo "Weight:".$weight."<br>";
echo "BMI : ".$weight/$height/$height ."<br>";

if($_FILES["file"]["error"]>0){
    echo "error : ".$_FILES["file"]["error"]."(無檔案上傳)";
}else{
    echo "檔案名稱 : ".$_FILES["file"]["name"]."<br/>";
    echo "檔案類型 : ".$_FILES["file"]["type"]."<br/>";
    echo "檔案大小 : ".($_FILES["file"]["size"]/1024)."Kb<br/>";
    echo "暫存名稱 : ".$_FILES["file"]["tmp_name"]."<br/>";

    $filename = $_FILES["file"]["name"];

    // if (!file_exists('upload')) {
    //     mkdir('upload', 0777, true);
    // }    
    $dir = 'upload';
    if(is_dir($dir)){
        move_uploaded_file($_FILES["file"]["tmp_name"],"upload/".$filename);

        $e=(count(glob("$dir/*")) == 0) ? true : false;
        if($e){
            echo "Empty";
            
        }else{
            if(strpos("frank".$_FILES["file"]["type"],"image")>0){
                echo '<img src="upload/'.$filename.'"/>';                
            }else{
                echo "wrong file type";
            }           
        }
    }
    else{
        mkdir("upload");
        move_uploaded_file($_FILES["file"]["tmp_name"],"upload/".$filename);
        $e=(count(glob("$dir/*")) == 0) ? true : false;
        if($e){
            echo "Empty";
            
        }else{
            if(strpos("frank".$_FILES["file"]["type"],"image")>0){
                echo '<img src="upload/'.$filename.'"/>';                
            }else{
                echo "wrong file type";
            }           
        }

    }
}


?>