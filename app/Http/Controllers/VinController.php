<?php

namespace AutoKit\Http\Controllers;

use AutoKit\Components\Rio\RioApi;
use AutoKit\Disks;
use AutoKit\Http\Traits\Rio;
use AutoKit\Http\Traits\Utilites;
use AutoKit\MoreProducts;
use AutoKit\Tyres;
use AutoKit\Vinrequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class VinController extends Controller
{
    use Utilites, Rio;

    private $month = [
        "Январь",
        "Февраль",
        "Март",
        "Апрель",
        "Май",
        "Июнь",
        "Июль",
        "Август",
        "Сентябрь",
        "Октябрь",
        "Ноябрь",
        "Декабрь"];

    public function __construct(Request $request, RioApi $rio)
    {
        $this->request = $request;
        $this->rio = $rio;
    }


    public function index(Request $request)
    {
        return view("vin.vin")
            ->with("vinrequestlist", $this->getVinRequestList())
            ->with("rio", $this->rio)
            ->with("month", $this->month);
    }


    public function create(Request $request)
    {
        $vin = new Vinrequest($request->all());
        $vin->user_id = Auth::check() ? Auth::id() : null;
        $vin->session = !Auth::check()? $request->getSession()->getId():null;
        $vin->save();

        return redirect()
            ->route("moreproducts", ['id' => $vin->id]);

    }


    public function destroy(Request $request, $id)
    {
        Tyres::where("vinrequest_id", '=', $id)->delete();
        Disks::where("vinrequest_id", '=', $id)->delete();

        MoreProducts::where("vinrequest_id", '=', $id)->delete();

        Vinrequest::where(
            $this->prepareParams(
                [
                    ["id", '=', $id]
                ])
        )->delete();

        return redirect()
            ->route("vin");
    }

    public function tyresAdd(Request $request)
    {

        Tyres::create($request->all());

        return redirect()
            ->route("vin");
    }

    public function discsAdd(Request $request){

        Disks::create($request->all());

        return redirect()
            ->route("vin");
    }
}
