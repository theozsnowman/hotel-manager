<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Http\Requests\ConsumptionRequest;
use Illuminate\Http\Request;

class ConsumptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activeRooms = Booking::with('room')
            ->whereNotNull('checkin_at')
            ->whereNull('checkout_at')
            ->get();

        $consumptions = \App\Consumption::orderBy('created_at', 'desc')->get();

        return view('consumption.index', compact('activeRooms', 'consumptions'));
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
    public function store(ConsumptionRequest $request)
    {
        $data = $request->all();

        $product = \App\Product::findOrFail($data['product_id']);

        $consumption = \App\Consumption::create($data + [
            'price' => $product->price,
        ]);

        return response()->json($consumption);
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
