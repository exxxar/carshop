<?php
/**
 * Created by PhpStorm.
 * User: exxxa
 * Date: 11.07.2019
 * Time: 23:38
 */

namespace AutoKit\Http\Traits;


trait Rio
{

    protected $rio;

    public function marks($id){
        return $this->rio->getMarks($id);
    }

    public function models($id,$markId){
        return $this->rio->getModels($id,$markId);
    }

    public function body($id){
        return $this->rio->getBodyStyles($id);
    }

    public function drive($id){
        return $this->rio->getDriverType($id);
    }

    public function gear($id){
        return $this->rio->getGearboxes($id);
    }
}