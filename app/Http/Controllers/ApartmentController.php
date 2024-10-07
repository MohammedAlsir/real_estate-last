<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ApartmentController extends Controller
{
    private $uploadPath = "uploads/apartments/";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $index = 1;
        $type = 0;

        // >الخاصة بالوكلاء
        if ($request->apartment == 2) {
            $apartments = Apartment::where('user_id', null)->orderBy('id', 'DESC')->get();
            $type = 2;
        }
        // >الخاصة بالشركة و بالوكلاء
        else if ($request->apartment == 3) {
            $apartments = Apartment::orderBy('id', 'DESC')->get();
            $type = 3;
        }
        // الخاصة بالشركة
        else {
            $apartments = Apartment::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
            $type = 1;
        }

        return view('apartments.index', compact('apartments', 'index', 'type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('apartments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'price' => '', //11
            'features' => 'required', //10
            'rental' => 'required', //9
            'type' => 'required', //8
            'space' => 'required', //7
            'apartment_number' => '', //5
            'square' => 'required', //4
            'neighborhood' => 'required', //3
            'city' => '', //2
            'state' => '', //1
        ]);

        $apartment = new Apartment();
        $apartment->price = $request->price;
        $apartment->features = $request->features;
        $apartment->rental_type = $request->rental_type;
        $apartment->rental = $request->rental;
        $apartment->type = $request->type;
        $apartment->space = $request->space;
        $apartment->apartment_number = $request->apartment_number;
        $apartment->square = $request->square;
        $apartment->neighborhood = $request->neighborhood;

        $apartment->state_id = $request->state;
        $apartment->city_id = $request->city;
        $apartment->user_id = Auth::user()->id;
        $apartment->save();

        // Start Photo
        $formFileName = "photo";
        $fileFinalName = "";
        if ($request->$formFileName != "") {
            // Delete file if there is a new one
            $fileFinalName = time() . rand(
                1111,
                9999
            ) . '.' . $request->file($formFileName)->getClientOriginalExtension();
            $path = $this->uploadPath;
            $request->file($formFileName)->move($path, $fileFinalName);
        }

        if ($fileFinalName != "") {
            $image = new Image();
            $image->photo = $fileFinalName;
            $image->apartment_id = $apartment->id;
            $image->save();
        }
        //End Photo

        toastr()->info('تم اضافة الشقة السكنية', 'نجاح');
        return redirect()->route('apartments.index');
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
        $apartment = Apartment::find($id);
        return view('apartments.edit', compact('apartment'));
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
        $request->validate([
            'price' => '', //11
            'features' => 'required', //10
            'rental' => 'required', //9
            'type' => 'required', //8
            'space' => 'required', //7
            'apartment_number' => '', //5
            'square' => 'required', //4
            'neighborhood' => 'required', //3
            'city' => '', //2
            'state' => '', //1
        ]);

        $apartment =  Apartment::find($id);
        $apartment->price = $request->price;
        $apartment->features = $request->features;
        $apartment->rental_type = $request->rental_type;
        $apartment->rental = $request->rental;
        $apartment->type = $request->type;
        $apartment->space = $request->space;
        $apartment->apartment_number = $request->apartment_number;
        $apartment->square = $request->square;
        $apartment->neighborhood = $request->neighborhood;

        $apartment->state_id = $request->state;
        $apartment->city_id = $request->city;
        $apartment->save();

        // Start Photo
        $formFileName = "photo";
        $fileFinalName = "";
        if ($request->$formFileName != "") {
            // Delete file if there is a new one
            if ($apartment->image && $apartment->image->$formFileName != "") {
                File::delete($this->uploadPath . $apartment->image->$formFileName);
            }
            $fileFinalName = time() . rand(
                1111,
                9999
            ) . '.' . $request->file($formFileName)->getClientOriginalExtension();
            $path = $this->uploadPath;
            $request->file($formFileName)->move($path, $fileFinalName);
        }

        if ($fileFinalName != "") {
            if ($apartment->image) {
                $image =  Image::find($apartment->image->id);
                $image->photo = $fileFinalName;
                // $image->parcel_id = $parcel->id;
                $image->save();
            } else {
                $image = new Image();
                $image->photo = $fileFinalName;
                $image->apartment_id = $apartment->id;
                $image->save();
            }
        }
        //End Photo

        toastr()->info('تم تعديل بيانات الشقة السكنية', 'نجاح');
        return redirect()->route('apartments.edit', $apartment->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Apartment::find($id)->delete();
        toastr()->info('تم حذف الشقة السكنية', 'نجاح');
        return redirect()->route('apartments.index');
    }
}
