<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    //
    public function index()
    {
        return Reservation::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $record = new Reservation();
        $record->fill($request->all());
        $record->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $user_id, string $book_id,string $start)
    {
        $reservation = Reservation::where('user_id', $user_id)
        ->where('book_id', $book_id)
        ->where('start', $start)
        //listát ad vissza:
        ->get();
        return $reservation[0];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,string $user_id,string $book_id,string $start)
    {
        $user = $this->show($user_id, $book_id, $start);
        $user->fill($request->all());
        $user->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $user_id,string $book_id,string $start)
    {
        $this->show($user_id, $book_id, $start)->delete();
    }
}
