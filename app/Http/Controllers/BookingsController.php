<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Room;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::paginate();
        $rooms = Room::all();
        return view('bookings.index', compact('bookings', 'rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param null $id
     * @return \Illuminate\Http\Response
     */
    public function create($id = null)
    {
        $rooms = Room::lists('number', 'id');
        $customers = \App\Customer::lists('name', 'id');

        if(!empty($id)) {
            $room = Room::findOrFail($id);
        } else {
            $room = Room::all()->first();
        }
        return view('bookings.create', compact('rooms', 'customers', 'room'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $room = Room::findOrFail($data['room_id']);
        $available_room = Booking::where('room_id', '=', $room->id)
            ->where('checkin', '>=', $data['checkin'])
            ->orWhere('room_id', '=', $room->id)
            ->where('checkout', '>=', $data['checkout'])
            ->count();

        if($available_room > 0) {
            \Session::flash('message_type', 'danger');
            \Session::flash('message', 'Não foi possível reservar o quarto na data desejada!');
            return redirect('bookings');
        }

        \App\Booking::create($data);
        $room->status = 'occupied';
        $room->save();

        \Session::flash('message_type', 'success');
        \Session::flash('message', 'Reserva cadastrada com sucesso!');

        return redirect('bookings');
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

    public function getCheckout($id)
    {
        $room = Room::findOrFail($id);
        $booking = Booking::where('room_id', '=', $room->id)
            ->get();
        dd($booking);
        return view('bookings.checkout', compact('booking'));
    }
}
