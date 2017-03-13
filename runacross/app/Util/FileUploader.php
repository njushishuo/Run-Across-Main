<?php

namespace App\Util;

use Log;

class FileUploader{

    public function uploadPicture(){

        Log::info("loader: start");

        if(isset($_FILES['image'])){
            $errors= array();
            $file_name = $_FILES['image']['name'];

            Log::info("loader: filename".$file_name);

            $file_size = $_FILES['image']['size'];

            Log::info("loader: filesize".$file_size);

            $file_tmp = $_FILES['image']['tmp_name'];
            $file_type = $_FILES['image']['type'];
            $tmp=explode('.',$_FILES['image']['name']);
            $file_ext= end($tmp);

            $expensions= array("jpeg","jpg","png");

            if(in_array($file_ext,$expensions)=== false){
                $errors[]="extension not allowed, please choose a JPEG or PNG file.";
            }

            if($file_size > 2097152) {
                $errors[]='File size must be excately 2 MB';
            }

            if(empty($errors)==true) {
                move_uploaded_file($file_tmp,"uploads/".$file_name);
                echo "Success";
                return $file_name;
            }else{
                print_r($errors);
                return null;
            }
        }

        Log::info("loader: end");
    }
}
