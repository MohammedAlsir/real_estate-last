@extends('layouts.main')

{{-- --}}


@section('content')
{{-- @include('sweetalert::alert') --}}
<div class="x_panel">
    <div class="x_title">
        <h2>تعديل بيانات  قطعة الارض
            {{-- <small> </small> --}}
        </h2>

        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <br />
        <form method="POST" action="{{route('parcel.update',$parcel->id)}}"  enctype="multipart/form-data" class="form-horizontal form-label-left">
            @csrf
            @method('put')

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="neighborhood"> المستخدم
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input  value="{{$parcel->user->name??$parcel->user_name}}" readonly
                        class="form-control col-md-7 col-xs-12">
                </div>
            </div>

            {{-- @livewire('edit-select-state',['parcel_id' => $parcel->id]) --}}

            @livewire('edit-select-state',['model'=> 'Parcel','item_id' => $parcel->id])


            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="neighborhood"> الحي
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="neighborhood" value="{{$parcel->neighborhood}}" id="neighborhood" required="required"
                        class="form-control col-md-7 col-xs-12" value="">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="square"> المربع
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="square" value="{{$parcel->square}}" id="square" required="required"
                        class="form-control col-md-7 col-xs-12" value="">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="parcel_type_id">نوع القطعة
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <select name="parcel_type_id" required="required" class="form-control col-md-7 col-xs-12">
                        <option value="">اختر نوع القطعة</option>
                        @foreach ($parcelType as $item)
                            <option  {{$parcel->parcel_type_id == $item->id ? "selected":""}} value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="parcels_number">رقم القطعة
                    <span class="required"></span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="parcels_number" value="{{$parcel->parcels_number}}" id="parcels_number"
                        class="form-control col-md-7 col-xs-12" value="">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="degree"> الدرجة
                    <span class="required"></span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="degree" value="{{$parcel->degree}}" id="degree"
                        class="form-control col-md-7 col-xs-12" value="">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="space">مساحة القطعة
                    <span class="required">*</span>
                </label>
                <div class="col-md-4 col-sm-4 col-xs-6">
                    <input type="number" name="space" value="{{$parcel->space}}" id="space" required="required"
                        class="form-control col-md-7 col-xs-12" value="">
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6">
                    <select type="number" name="space_type_id" required="required"
                        class="form-control col-md-7 col-xs-12">
                        <option value="">اختر المقياس</option>
                        @foreach ($spaceType as $item)
                            <option  {{$parcel->space_type_id == $item->id ? "selected":""}} value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>



            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="price"> السعر
                    <span class="required"></span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="number" name="price" value="{{$parcel->price}}" id="price"
                        class="form-control col-md-7 col-xs-12" value="">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="features"> المميزات
                    <span class="required"></span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea rows="5" name="features"  id="features"
                        class="form-control col-md-7 col-xs-12" >{{$parcel->features}}</textarea>
                </div>
            </div>



             <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="parcel_category_id">تصنيف القطعة
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <select name="parcel_category_id" required="required" class="form-control col-md-7 col-xs-12">
                        <option value="">اختر النوع </option>
                        @foreach ($parcelCategory as $item)
                            <option  {{$parcel->parcel_category_id == $item->id ? "selected":""}} value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="form-group">
                <label class="col-md-3 control-label"></label>
                <div class="col-md-4">
                    <img style="width: 150px; height: 150px; object-fit: cover;"  src="{{$parcel->image ?  asset('uploads/parcels/'.$parcel->image->photo) : ''}}" alt="لا يوجد صورة حاليا" srcset="">
                </div>
            </div>


            <div class="form-group" >
                <label class="control-label col-md-3 col-sm-3 col-xs-12" >  الصورة
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input style="padding-top: 5px !important" type="file" name="photo"
                            class="form-control col-md-7 col-xs-12" >
                </div>
            </div>




            <div class="ln_solid"></div>
            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    {{-- <button type="submit" class="btn btn-primary">انصراف</button> --}}
                    <button type="" id="Swal" class="btn btn-success btn-block">تعديل</button>
                </div>
            </div>

        </form>


    </div>
</div>

@endsection
