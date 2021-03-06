<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderItemRequest;
use App\Order;
use App\OrderItem;
use App\Product;

class OrderItemsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('order-items.create');
    }

    public function store(Order $order, OrderItemRequest $request)
    {
        $product = Product::findOrFail($request->input('product_id'));
        $amount = $request->input('amount');

        return $order->items()->create([
            'product_id' => $product->id,
            'price' => $product->price,
            'amount' => $amount,
        ]);
    }

    public function destroy(OrderItem $orderItem)
    {
        $orderItem->delete();

        return $orderItem;
    }
}
