<?php

namespace App\Http\Controllers;

use App\Models\Parcel;
use App\Models\Hotel;
use App\Models\Apartment;
use App\Models\House;
use App\Models\Order;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
   // مثال في الـ Controller
   public function index()
   {
       // تعداد العناصر
       $parcel_count = Parcel::count();
       $hotels_count = Hotel::count();
       $apartments_count = Apartment::count();
       $houses_count = House::count();
   
       // تعداد الطلبات لكل عنصر
       $parcel_orders = Order::where('order_type', 1)->count();
       $house_orders = Order::where('order_type', 2)->count();
       $apartment_orders = Order::where('order_type', 3)->count();
       $hotel_orders = Order::where('order_type', 4)->count();
   
       return view('home', compact(
           'parcel_count',
           'hotels_count',
           'apartments_count',
           'houses_count',
           'parcel_orders',
           'house_orders',
           'apartment_orders',
           'hotel_orders'
       ));
   }
   
}
