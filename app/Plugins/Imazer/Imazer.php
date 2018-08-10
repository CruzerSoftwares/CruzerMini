<?php

namespace App\Plugins\Imazer;

/**
* This plugin provide several useful image manipulation functions
*
* Resizes image to required dimensions within aspect ratio
*
* @copyright Cruzer Softwares
*
* @author RN Kushwaha <Rn.kushwaha022@gmail.com>
* @since v1.0.0
* @date 10th Aug, 2018
*/
class Imazer {

    $accepted_extensions = array( 'jpg', 'jpeg', 'png' );
    // set final size of cropped image
    $image_size_width = 400;
    $image_size_height = 300;
    
    function __construct($imgurl){
        $this->imgurl = $imgurl;
        $this->imgsize = @getImageSize($imgurl);
        if (!$this->imgsize){
            return false;
        }
        if ( substr(strtolower($imgurl), -4) == "jpeg" || substr(strtolower($imgurl), -3) == "jpg"){
            $this->orig_im = ImageCreateFromJPEG($imgurl);
        } else {
            $this->orig_im = ImageCreateFromPNG($imgurl);
        }
    }
    
    function crop($w, $h){
        $newim = $this->resizeImage($this->orig_im, $this->imgsize[0], $this->imgsize[1], $w, $h);
        
        if ($newim[1] < $w || $newim[2] < $h){
            //add more width or height
            
            //create new white image
            $paddedimg = imagecreatetruecolor($w, $h);
            $white = imagecolorallocate($paddedimg,255,255,255);
            imagefill($paddedimg, 0, 0, $white);
            //stick the thumb in the middle of the new white image
            $pastex = floor(($w - $newim[1]) / 2);
            $pastey = floor(($h - $newim[2]) / 2);
            
            imagecopy($paddedimg, $newim[0], $pastex, $pastey, 0, 0, $newim[1], $newim[2]);
            //imagefill($paddedimg, 0, 0, $white);
            return $paddedimg;
        } else {
            return $newim[0];
        }
    }
    
    function resizeImage($image, $iw, $ih, $maxw, $maxh){
        if ($iw > $maxw || $ih > $maxh){
            if ($iw>$maxw && $ih<=$maxh){//too wide, height is OK
                $proportion=($maxw*100)/$iw;
                $neww=$maxw;
                $newh=ceil(($ih*$proportion)/100);
            } else if ($iw<=$maxw && $ih>$maxh){//too high, width is OK
                $proportion=($maxh*100)/$ih;
                $newh=$maxh;
                $neww=ceil(($iw*$proportion)/100);
            } else {//too high and too wide
                if ($iw/$maxw > $ih/$maxh){//width is the bigger problem
                    $proportion=($maxw*100)/$iw;
                    $neww=$maxw;
                    $newh=ceil(($ih*$proportion)/100);
                } else {//height is the bigger problem
                    $proportion=($maxh*100)/$ih;
                    $newh=$maxh;
                    $neww=ceil(($iw*$proportion)/100);
                }
            }
        } else {//copy image even if not resizing
            $neww=$iw;
            $newh=$ih;
        }
        
        if (function_exists("imagecreatetruecolor")){//GD 2.0=good!
            $newImage=imagecreatetruecolor($neww, $newh);
            imagecopyresampled($newImage, $image, 0,0,0,0, $neww, $newh, $iw, $ih);
        } else {//GD 1.8=only 256 colours
            $newImage=imagecreate($neww, $newh);
            imagecopyresized($newImage, $image, 0,0,0,0, $neww, $newh, $iw, $ih);
        }
        return Array($newImage, $neww, $newh);
    }
}