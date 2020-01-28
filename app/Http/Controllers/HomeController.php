<?php

namespace AutoKit\Http\Controllers;

use AutoKit\Events\UserEditInfo;
use AutoKit\Http\Requests\UserRequest;
use AutoKit\Http\Traits\Utilites;
use AutoKit\Order;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    use Utilites;
    /**
     * @var Order
     */
    protected $order;

    /**
     * Create a new controller instance.
     *
     * @param Order $order
     * @return void
     */
    public function __construct(Request $request, Order $order)
    {
        $this->middleware('auth');
        $this->order = $order;
        $this->request = $request;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('partials.home.main');
    }

    public function orders()
    {
        return view('partials.home.orders')
            ->with('orders', $this->order->getForUser());
    }

    public function vins()
    {
        return view('partials.home.vins')
            ->with("vinrequestlist", $this->getVinRequestList());
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function order(Request $request)
    {
        return response()->json([
            'content' => view('partials.ajax.order')
                ->with('order', Order::findOrFail($request->order))
                ->render()
        ]);
    }

    public function update(UserRequest $request)
    {
        $request->user()->update($request->all());
        event(new UserEditInfo($request->user()));
        return back();
    }

    public function contentUpdate(Request $request){

        return back();
    }

    public function admin()
    {
        return view('partials.home.admin');
    }
}
