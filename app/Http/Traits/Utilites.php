<?php
/**
 * Created by PhpStorm.
 * User: exxxa
 * Date: 11.07.2019
 * Time: 15:50
 */

namespace AutoKit\Http\Traits;

use AutoKit\MoreProducts;
use AutoKit\Vinrequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

trait Utilites
{

    protected $request;

    protected function prepareParams($args = null)
    {
        $params = [];
        if (Auth::check())
            array_push($params, ['user_id', '=', Auth::id()]);
        else
            array_push($params, ['session', '=', $this->request->session()->getId()]);


        if (isset($args))
            if (is_array($args)) {
                foreach ($args as $arg)
                    array_push($params, $arg);
            }


        return $params;
    }

    public function getVinRequestList()
    {
        return Vinrequest::where($this->prepareParams())->get();
    }

    public function getMoreProductsByVin(){
        $more = [];
        foreach($this->getVinRequestList() as $vin){

            $mp = MoreProducts::where("vinrequest_id","=",$vin->id)->first();
            if ($mp!=null)
                array_push($more,$mp);
        }
        return $more;
    }

    private function isUserHasVin($id = null)
    {

        return Vinrequest::where(
                $this->prepareParams(
                    $id!=null?
                        [
                            ["id", '=', $id]
                        ]:null)
            )->first() != null;

    }
}