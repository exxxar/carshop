<?php

namespace AutoKit\Http\Controllers;

use AutoKit\Components\Cart\Cart;
use AutoKit\Exceptions\QuantityOverstated;
use AutoKit\Http\Requests\MoreProductsRequest;
use AutoKit\Http\Traits\Utilites;
use AutoKit\MoreProducts;
use AutoKit\Product;
use AutoKit\Vinrequest;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Lang;

class MoreProductsController extends Controller
{
    use Utilites;

    protected $cart;

    public function __construct(Request $request,Cart $cart)
    {
        $this->request = $request;
        $this->cart = $cart;
    }

    public function addItem(MoreProductsRequest $request)
    {
        if (!$this->isUserHasVin())
            return redirect()
                ->route("vin");

        MoreProducts::create($request->all());
        return redirect()
            ->back();

    }

    public function removeItem(Request $request, $id)
    {
        if (!$this->isUserHasVin())
            return redirect()
                ->route("vin");

        MoreProducts::where("id", '=', $id)->delete();

        return redirect()
            ->back();
    }

    public function clear(Request $request, $id)
    {
        if (!$this->isUserHasVin())
            return redirect()
                ->route("vin");

        if (!isset($id))
            foreach($this->getMoreProductsByVin() as $vin) {
                MoreProducts::where("vinrequest_id", '=', $vin->id)->delete();
            }
            else
                MoreProducts::where("vinrequest_id", '=', $id)->delete();


        return redirect()
            ->back();
    }

    public function index(Request $request, $id)
    {

        if (!$this->isUserHasVin($id))
            return redirect()
                ->route("vin");

        return view("moreproducts.more")
            ->with("moreproducts", $this->getMoreProductsByVin())
            ->with("id", $id);

    }

}
