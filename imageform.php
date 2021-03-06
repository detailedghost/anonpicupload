<?php
  class ImageUpload{

    function __construct(){} 

    public function build(){?>
<!--The HP tennis team's photoupload-->
      <h1>Highland Park Tennis Photo Upload</h1>
      <h3>Instructions:</h3>
      <p>Click "Choose Files" to upload images.</p><p> Multi-Select is available! (10 images per multiple upload)</p>
      <form action=<?php echo $_SERVER['PHP_SELF']; ?> method="POST" enctype="multipart/form-data">
        <input name="file[]" type="file" multiple="multiple"></input>
        <input id='generateMoreBtns' type='button' value='More...' />
        <input name="submit" type="submit" value="Upload"></input>
      </form> 
<?php
    }
    public function process(){
      if(isset($_FILES['file'])){  

        echo "<h1>The following was Uploaded!</h1>";

        //Using the ip address and the date to categorize where the pictures come from
        $userIP = implode(explode(':',$_SERVER['REMOTE_ADDR']));
        $datefolder = date("d-m-y");

        if(!is_dir('imgs/'.$userIP)){mkdir('imgs/'.$userIP);}
        if(!is_dir('imgs/'.$userIP.'/'.$datefolder)){mkdir('imgs/'.$userIP.'/'.$datefolder);}
        $folderName = 'imgs/'.$userIP.'/'.$datefolder.'/';
        for($i=0; $i < count($_FILES['file']['name']); $i++){
        if($this->validFile($_FILES['file']['name'][$i])){
              $temp = $_FILES['file']['tmp_name'][$i];
            if($temp != ""){
              $filename = pathinfo($_FILES['file']['name'][$i], PATHINFO_FILENAME).
  	  	        md5(rand(0,1000)).'.'.
  	  	        pathinfo($_FILES['file']['name'][$i], PATHINFO_EXTENSION); 
              move_uploaded_file($temp, $folderName.$filename);
              echo "<img src='".$folderName.$filename."'/>"; 
            }
          }
          else {
           echo "<h3 class='error-img'>File ".
                  $_FILES['file']['name'][$i].
                  " was not valid!!</h3>";
          }
       }
     } else{ echo "ERROR! Please reupload files!";}
    }
    public function validFile($target){
      switch(strtolower(pathinfo($target, PATHINFO_EXTENSION))){
        case 'jpg':
	case 'JPG':
        case 'jpeg':
	case 'JPEG':
        case 'png':
	case 'PNG':
        case 'gif':
	CASE 'GIF':
        case 'avi':
	CASE 'AVI':
        case 'mkv':
	CASE 'MKV':
        case 'mpg':
	CASE 'MPG':
        case 'mpeg':
	CASE 'MPEG':
        case 'm4v':
	CASE 'M4V':
        case 'flv':
	case 'FLV':
        case 'h264':
	CASE 'H264':
        case 'mp4':
	case 'MP4':
        case 'wmv':
	case 'WMV':
          return true;
          break;
        default:
          return false;
          break;
      }
  }


  }

?>
