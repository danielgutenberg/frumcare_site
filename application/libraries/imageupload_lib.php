<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * cvesh.singh
 * shivesh@access-keys.com
 */
class Imageupload_lib {

    function __construct(){
        $this->ci = & get_instance();
                error_reporting(0);
    }
    function upload($folder,$thumbsize, $largesize, $replace = false){
        if(isset($_POST)){
            ############ Edit settings ##############
            $ThumbSquareSize        = $thumbsize; //Thumbnail will be 100x100
            $BigImageMaxSize        = $largesize; //Image Maximum height or width
            $ThumbPrefix            = ""; //Normal thumb Prefix
            $ThumbDestinationDirectory = BASEPATH."../images/{$folder}/thumb/"; //specify upload directory ends with / (slash)
            $DestinationDirectory   = BASEPATH."../images/{$folder}/"; //specify upload directory ends with / (slash)
            $Quality                = 90; //jpeg quality
            ##########################################

            if(!file_exists("./images/{$folder}/"))
                mkdir("./images/{$folder}/", 0777);
            if(!file_exists("./images/{$folder}/thumb/"))
                mkdir("./images/{$folder}/thumb/", 0777);
            
            //check if this is an ajax request
            if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])){
                die();
            }


            // Random number will be added after image name
            $RandomNumber   = rand(111111, 999999);
            
            //$ImageName      = str_replace(' ','-',strtolower($_FILES['0']['name'])); //get image name
            $ImageName      = $_FILES['0']['name']; //get image name
            $ImageSize      = $_FILES['0']['size']; // get original image size
            $TempSrc        = $_FILES['0']['tmp_name']; // Temp name of image file stored in PHP tmp folder
            $ImageType      = $_FILES['0']['type']; //get file type, returns "image/png", image/jpeg, text/plain etc.

            //Let's check allowed $ImageType, we use PHP SWITCH statement here
            switch(strtolower($ImageType))
            {
                case 'image/png':
                    //Create a new image from file 
                    $CreatedImage =  imagecreatefrompng($_FILES['0']['tmp_name']);
                    break;
                case 'image/gif':
                    $CreatedImage =  imagecreatefromgif($_FILES['0']['tmp_name']);
                    break;          
                case 'image/jpeg':
                case 'image/pjpeg':
                    $CreatedImage = imagecreatefromjpeg($_FILES['0']['tmp_name']);
                    break;
                default:
                    die('Unsupported File!'); //output error and exit
            }
            
            //PHP getimagesize() function returns height/width from image file stored in PHP tmp folder.
            //Get first two values from image, width and height. 
            //list assign svalues to $CurWidth,$CurHeight
            list($CurWidth,$CurHeight)=getimagesize($TempSrc);
            
            //Get file extension from Image name, this will be added after random name
            $ImageExt = end(explode(".",$ImageName));
            
            //remove extension from filename
            $ImageName      = preg_replace("/\\.[^.\\s]{3,4}$/", "", $ImageName); 
            
            //Construct a new name with random number and extension.
            $NewImageName = 'photo'.'_'.$RandomNumber.'.'.$ImageExt;
            
            //set the Destination Image
            $thumb_DestRandImageName    = $ThumbDestinationDirectory.$ThumbPrefix.$NewImageName; //Thumbnail name with destination directory
            $DestRandImageName          = $DestinationDirectory.$NewImageName; // Image with destination directory
            
            //Resize image to Specified Size by calling resizeImage function.
            if($this->cropImage($CurWidth,$CurHeight,$BigImageMaxSize,$DestRandImageName,$CreatedImage,$Quality,$ImageType))
            { 
                //Create a square Thumbnail right after, this time we are using cropImage() function
                if(!$this->cropImage($CurWidth,$CurHeight,$ThumbSquareSize,$thumb_DestRandImageName,$CreatedImage,$Quality,$ImageType))
                    {
                        $data = array('error' =>'Error Creating Thumbnail');
                    }
                /*
                We have succesfully resized and created thumbnail image
                We can now output image to user's browser or store information in the database
                */
                $thumb = $NewImageName;
                $html = '<div><img src="'.site_url("images/{$folder}/thumb/{$thumb}").'" alt="Thumbnail"></div>';
                $data =array('files' => $thumb, 'html'=> $html, 'type' => 1);
                if ($replace) {
                    return $thumb;
                }
                echo json_encode($data);
                /*
                // Insert info into database table!
                mysql_query("INSERT INTO myImageTable (ImageName, ThumbName, ImgPath)
                VALUES ($DestRandImageName, $thumb_DestRandImageName, 'uploads/')");
                */

            }else{
                $data = array('error' => 'Resize error'); //output error
            }
        }
    }

    function resizeImage($CurWidth,$CurHeight,$MaxSize,$DestFolder,$SrcImage,$Quality,$ImageType)
    {
        //Check Image size is not 0
        if($CurWidth <= 0 || $CurHeight <= 0) 
        {
            return false;
        }
        
        //Construct a proportional size of new image
        $ImageScale         = min($MaxSize/$CurWidth, $MaxSize/$CurHeight); 
        $NewWidth           = ceil($ImageScale*$CurWidth);
        $NewHeight          = ceil($ImageScale*$CurHeight);
        $NewCanves          = imagecreatetruecolor($NewWidth, $NewHeight);
        
        // Resize Image
        if(imagecopyresampled($NewCanves, $SrcImage,0, 0, 0, 0, $NewWidth, $NewHeight, $CurWidth, $CurHeight))
        {
            switch(strtolower($ImageType))
            {
                case 'image/png':
                    imagepng($NewCanves,$DestFolder);
                    break;
                case 'image/gif':
                    imagegif($NewCanves,$DestFolder);
                    break;          
                case 'image/jpeg':
                case 'image/pjpeg':
                    imagejpeg($NewCanves,$DestFolder,$Quality);
                    break;
                default:
                    return false;
            }
        //Destroy image, frees memory   
        if(is_resource($NewCanves)) {imagedestroy($NewCanves);} 
        return true;
        }

    }

    //This function corps image to create exact square images, no matter what its original size!
    function cropImage($CurWidth,$CurHeight,$iSize,$DestFolder,$SrcImage,$Quality,$ImageType)
    {    
        //Check Image size is not 0
        if($CurWidth <= 0 || $CurHeight <= 0) 
        {
            return false;
        }
        
        //abeautifulsite.net has excellent article about "Cropping an Image to Make Square bit.ly/1gTwXW9
        if($CurWidth>$CurHeight)
        {
            $y_offset = 0;
            $x_offset = ($CurWidth - $CurHeight) / 2;
            $square_size    = $CurWidth - ($x_offset * 2);
        }else{
            $x_offset = 0;
            $y_offset = ($CurHeight - $CurWidth) / 2;
            $square_size = $CurHeight - ($y_offset * 2);
        }
        
        $NewCanves  = imagecreatetruecolor($iSize, $iSize); 
        if(imagecopyresampled($NewCanves, $SrcImage,0, 0, $x_offset, $y_offset, $iSize, $iSize, $square_size, $square_size))
        {
            switch(strtolower($ImageType))
            {
                case 'image/png':
                    imagepng($NewCanves,$DestFolder);
                    break;
                case 'image/gif':
                    imagegif($NewCanves,$DestFolder);
                    break;          
                case 'image/jpeg':
                case 'image/pjpeg':
                    imagejpeg($NewCanves,$DestFolder,$Quality);
                    break;
                default:
                    return false;
            }
        //Destroy image, frees memory   
        if(is_resource($NewCanves)) {imagedestroy($NewCanves);} 
        return true;

        }
          
    }
}
