<?php

namespace App\Traits;
Use File;

trait imageUpload{

    public function updateSingleImage($image,$existImage_path,$savePath){
        if (File::exists($existImage_path)) {
            //File::delete($image_path);
            unlink($existImage_path);
        }
            $img=time().'.'.$image->getClientOriginalExtension();
                 
            $image->move($savePath,$img);
            return $img;
    }
}