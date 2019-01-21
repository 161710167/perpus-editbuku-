<?php

namespace App\Traits;

/**
 *  Author : Ari Ardiansyah
 */
trait Icon
{
    public function Document($type)
    {
        // switch ($type) {
        //     case 'doc'||'odt'||'docx':$icon = 'DOC.png';break;
        //     case 'pdf':$icon = 'PDF.png';break;
        //     case 'png':$icon = 'PNG.png';break; 
        //     case 'jpg'||'jpeg'||'bmp':$icon = 'JPG.png';break;
        //     default:$icon = 'TXT.png';break;
        // }
        $icon = '';
        if($type == "doc" || $type == "docx" || $type == "odt"){
            $icon = "DOC.png";
        }else if($type == "pdf"){
            $icon = "PDF.png";
        }else if($type == "png"){
            $icon = "PNG.png";
        }else if($type == "jpg" || $type == "jpeg" || $type == "bmp"){
            $icon = "JPG.png";
        }else{
            $icon = "TXT.png";
        }
        return  $icon;
    }

}
