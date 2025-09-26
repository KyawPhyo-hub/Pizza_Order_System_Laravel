<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookingManageController extends Controller
{
    public function todayBooking(){
        $bookings = Booking::whereDate('created_at', Carbon::today())
                    ->orderBy('created_at','DESC')
                    ->get();
        return view('admin.manageBooking.todayBooking',compact('bookings'));
    }

    //weekly booking
    public function weeklyBooking(){
        $bookings = Booking::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                    ->orderBy('created_at','DESC')
                    ->get();
        return view('admin.manageBooking.weeklyBooking',compact('bookings'));
    }

    //monthly booking
    public function monthlyBooking(){
        $bookings = Booking::whereMonth('created_at', Carbon::now()->month)
                    ->orderBy('created_at','DESC')
                    ->get();
        return view('admin.manageBooking.monthlyBooking',compact('bookings'));
    }

    //overall booking
    public function overallBooking(){
        $bookings = Booking::orderBy('created_at', 'DESC')->get();
        return view('admin.manageBooking.overallBooking',compact('bookings'));
    }

    //update booking status
    public function updateStatus(Request $request)
    {
        // Validate incoming data
        $request->validate([
            'status' => 'required|in:pending,confirm,cancel',
            'bookingId' => 'required|string'
        ]);

        // Find the booking
        $booking = Booking::where('booking_id', $request->bookingId)->first();

        if (!$booking) {
            return response()->json([
                'success' => false,
                'message' => 'Booking not found'
            ], 404);
        }

        // Update status
        $booking->status = $request->status;
        $booking->save();

        return response()->json([
            'success' => true,
            'message' => 'Booking status updated successfully!'
        ]);
    }

    //booking details
    public function bookingDetails($id){
        $booking = Booking::where('id',$id)->first();
        //dd($booking->toArray());
        return view('admin.manageBooking.bookingDetails',compact('booking'));
    }
}
