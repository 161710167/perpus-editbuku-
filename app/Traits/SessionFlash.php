<?php

namespace App\Traits;

use Session;
/**
 *  Author : Ari Ardiansyah
 */
trait SessionFlash
{   
    public function NotifFlash($type,$icon,$title,$message)
    {
        return  Session::flash("notif", [
                    "type"    => $type,
                    "icon"    => $icon,
                    "title"   => $title,
                    "message" => $message,
                ]);
    }

}
