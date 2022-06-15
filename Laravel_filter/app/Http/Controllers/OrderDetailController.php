<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['title'] = 'Order Detail';
        $data['txt_search'] = $request->get('txt_search');
        $data['categories'] = Category::all();
        $data['category_id'] = $request->get('category_id');

        $query = OrderDetail::join('products', 'products.product_id', '=', 'order_details.product_id')
            ->join('orders', 'orders.order_id', '=', 'order_details.order_id')
            ->join('customers', 'customers.customer_id', '=', 'orders.customer_id')
            ->join('categories', 'categories.category_id', '=', 'products.category_id')
            ->where(function ($query) use ($data) {
                if ($data['txt_search'] != null) {
                    $query->where('product_name', 'like', '%' . $data['txt_search'] . '%')
                        ->orWhere('customer_name', 'like', '%' . $data['txt_search'] . '%')
                        ->orWhere('category_name', 'like', '%' . $data['txt_search'] . '%');
                }
            });

        if ($data['category_id']){
            $query->where('categories.category_id', $data['category_id']);
        }

        $data['order_details'] = $query->paginate(10)->withQueryString();
            return view('order-detail.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
