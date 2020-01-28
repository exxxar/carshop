<?php

namespace AutoKit\Http\Controllers;

use AutoKit\Brand;
use AutoKit\Category;
use AutoKit\Components\Money\Exchanger;
use AutoKit\Menu;
use AutoKit\Product;
use AutoKit\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    const API_URL = "http://portal.moskvorechie.ru/portal.api";
    const LOGIN = "soundon";
    const PASS = "C96BX2cgka8uJfHOi0gqADxyILnSAibvT70a6x0cKvFyLE8nw3vvGCBLC0ibCkkQ";
    /**
     * @var Product
     */
    protected $product;

    /**
     * @var Category
     */
    protected $category;

    /**
     * @var Menu
     */
    protected $menu;

    /**
     * @var Brand
     */
    protected $brand;

    /**
     * @var Review
     */
    protected $review;

    /**
     * @var Exchanger
     */
    protected $exchanger;

    public function __construct(
        Product $product, Category $category, Menu $menu, Brand $brand,
        Review $review, Exchanger $exchanger
    )
    {
        $this->product = $product;
        $this->category = $category;
        $this->menu = $menu;
        $this->brand = $brand;
        $this->review = $review;
        $this->exchanger = $exchanger;
    }

    public function index(Request $request, Menu $menu)
    {
        if ($request->ajax()) {
            return view('partials.products.' . $request->type ?? 'grid')
                ->with('products', $this->product->getWhereMenu(
                    $menu,
                    $request->brand ?? null,
                    $request->sort ?? 'desc',
                    $request->sort ? 'price' : 'id',
                    $request->price
                ));
        }

        return view('products')
            ->with('breadcrumb', $menu->load('products'))
            ->with('products', $this->product->getWhereMenu($menu))
            ->with('categories', $this->category->getWhereMenu($menu))
            ->with('brands', $this->brand->getForMenuWithCountProducts($menu))
            ->with('maxPrice', $this->product->getMaxPrice($menu, $this->exchanger));


    }

    public function showByCategory(Request $request, Menu $menu, Category $category)
    {
        if ($request->ajax()) {
            return view('partials.products.' . $request->type ?? 'grid')
                ->with('products', $this->product->getWhereCategory(
                    $category,
                    $request->brand ?? null,
                    $request->sort ?? 'desc',
                    $request->sort ? 'price' : 'id',
                    $request->price
                ));
        }


        $menu->load('products.brand');


        if (count($this->product->getWhereCategory($category)) > 0)

            return view('products')
                ->with('breadcrumb', $category->load('menu'))
                ->with('products', $this->product->getWhereCategory($category))
                ->with('categories', $this->category->getWhereMenu($menu))
                ->with('brands', $this->brand->getForCategoryWithCountProducts($category))
                ->with('maxPrice', $this->product->getMaxPrice($menu, $this->exchanger, $category));


        return redirect()
            ->route("products.index", ["menu" => "parts"]);
    }

    public function show(Request $request, Product $product)
    {
        if ($request->ajax()) {
            return view('partials.product.reviews_list')
                ->with('reviews', $this->review->getForProduct($product, $request->page));
        }


        $client = new \GuzzleHttp\Client();


        $response = $client->request('GET', $this::API_URL, ['query' => [
            "l" => $this::LOGIN,
            "p" => $this::PASS,
            "act" => "price_by_nr_firm",
            "nr" => $product->manufacturer_number,
            "alt" => "",
            "gid" => "",
            "cs" => "utf8"
        ]]);


        return view('product')
            ->with('product', $product->load('reviews'))
            ->with('reviews', $this->review->getForProduct($product))
            ->with('maxOffset', $this->review->getMaxOffset($product))
            ->with("analogs", json_decode($response->getBody(), true)["result"]);
    }
}