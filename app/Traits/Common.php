<?php

namespace App\Traits;

/**
 *  Author : Ari Ardiansyah
 */
trait Common
{
    public function encrypt($id)
    {
        if(config('app.debug') == false){
            return encrypt($id);
        }else{
            return $id;
        }
    }
    public function decrypt($id)
    {
        if(config('app.debug') == false){
            return decrypt($id);
        }else{
            return $id;
        }
    }

}
