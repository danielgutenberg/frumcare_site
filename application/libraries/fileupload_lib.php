<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * cvesh.singh
 * shivesh@access-keys.com
 */
class Fileupload_lib {

    function __construct(){
        $this->ci = & get_instance();
    }

    function upload($folder){
        $data = array();

        if(isset($_GET['files']))
        {   
            $error = false;
            $files = array();

            $uploaddir = BASEPATH."../uploads/{$folder}/";
            foreach($_FILES as $file)
            {
                if(move_uploaded_file($file['tmp_name'], $uploaddir .basename($file['name'])))
                {
                    $files[] = $uploaddir .$file['name'];
                    $filename = $file['name'];
                }
                else
                {
                    $error = true;
                }
            }
            $data = ($error) ? array('error' => 'There was an error uploading your files') : array('files' => $filename, 'type' => 2);
        }
        else
        {
            $data = array('success' => 'Form was submitted', 'formData' => $_POST);
        }

        echo json_encode($data);
    }
}
