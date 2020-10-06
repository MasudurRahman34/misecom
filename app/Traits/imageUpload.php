<?php

namespace App\Traits;
Use File;
Use Image;

trait imageUpload{

    public function updateSingleImage($image,$existImage_path,$savePath){
        if (File::exists($existImage_path)) {
            //File::delete($image_path);
            unlink($existImage_path);
        }
        
            $img=time().'.'.$image->getClientOriginalExtension();
            //$image=Image::make($image);
                 
            $image->move($savePath,$img);
            return $img;
    }
}