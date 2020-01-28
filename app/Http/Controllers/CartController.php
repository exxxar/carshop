<?php

namespace AutoKit\Http\Controllers;

use AutoKit\Brand;
use AutoKit\Components\Cart\Cart;
use AutoKit\Exceptions\QuantityOverstated;
use AutoKit\Http\Traits\Utilites;
use AutoKit\MoreProducts;
use AutoKit\Product;
use AutoKit\Vinrequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Lang;
use Vin;

class CartController extends Controller
{
    use Utilites;

    const API_URL = "http://portal.moskvorechie.ru/portal.api";
    const LOGIN = "soundon";
    const PASS = "C96BX2cgka8uJfHOi0gqADxyILnSAibvT70a6x0cKvFyLE8nw3vvGCBLC0ibCkkQ";

    /**
     * @var Cart
     */
    protected $cart;


    public function __construct(Request $request, Cart $cart)
    {
        $this->cart = $cart;
        $this->request = $request;
    }

    public function index(Request $request)
    {
        return view('cart')
            ->with("moreproducts", $this->getMoreProductsByVin())
            ->with("vinrequestlist", $this->getVinRequestList());

    }
    public function analogAdd(Request $request){
        $gid = $request->get("gid");

        $client = new \GuzzleHttp\Client();

        $response = $client->request('GET', $this::API_URL, ['query' => [
            "l" => $this::LOGIN,
            "p" => $this::PASS,
            "act" => "g_info",
            "key"=>$gid,
            "cs" => "utf8"
        ]]);

        $result = json_decode($response->getBody(), true)["result"];


        $brand = Brand::where("title",$result[0]["brand"])->first();
        if ($brand==null){
            $brand = Brand::create([
                'title' => $result[0]["brand"],
                'alias' => strtolower($result[0]["brand"])
            ]);
        }


        $productId = Product::where([
           ["title",$result[0]["name"]],
           ["manufacturer_number",$result[0]["nr"]],
           ["price",$result[0]["price"]],


        ])->first();



        if ($productId==null){
            $productId = Product::create([
                'title'=>$result[0]["name"],
                'price'=>$result[0]["price"],
                'manufacturer_number'=>$result[0]["nr"],
                'original_number'=>'',
                'units'=>'шт',
                'min_in_pack'=>$result[0]["minq"],
                'quantity'=>$result[0]["stock"],
                'description'=>'',
                'is_top'=>1,
                'is_new'=>1,
                'img'=>'',
                'category_id'=>1,
                'brand_id'=>$brand->id,
                'weight' => 0,
                'width' => 1,
                'height' => 1,
                'length' => 1
            ]);
        }
        Log::info($productId->id);
        $product = Product::find($productId->id);
        try {
            $this->cart->add($product, 1);
        } catch (QuantityOverstated $e) {
            return response()->json(['message' => Lang::get('cart.quantity_overstated')], 422);
        }
        $productInCart = $this->cart->get($product);
        return response()->json([
            'totalQuantity' => $this->cart->totalQuantity(),
            'totalPrice' => $this->cart->totalPrice()->format(),
            'item' => $productInCart,
            'amount' => $productInCart ? $productInCart->getAmount()->format() : 0
        ]);
    }

    public function incrementOrDecrementItem(Request $request)
    {
        $product = Product::find($request->product);
        try {
            $this->cart->add($product, $request->quantity);
        } catch (QuantityOverstated $e) {
            return response()->json(['message' => Lang::get('cart.quantity_overstated')], 422);
        }
        $productInCart = $this->cart->get($product);
        return response()->json([
            'totalQuantity' => $this->cart->totalQuantity(),
            'totalPrice' => $this->cart->totalPrice()->format(),
            'item' => $productInCart,
            'amount' => $productInCart ? $productInCart->getAmount()->format() : 0
        ]);
    }

    public function remove(Request $request)
    {
        $this->cart->remove(Product::find($request->product));
        return response()->json([
            'totalQuantity' => $this->cart->totalQuantity(),
            'totalPrice' => $this->cart->totalPrice()->format()
        ]);
    }
}
