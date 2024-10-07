@extends('layouts.main')

@section('content')
{{-- @include('sweetalert::alert') --}}
<div class="x_panel">
    <div class="x_title">
        <h2>إضافة مكتب جديد</h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <br />
        <form method="POST" action="{{ route('office.store') }}" enctype="multipart/form-data" class="form-horizontal form-label-left">
            @csrf

            {{-- إذا كنت تستخدم Livewire لاختيار الدولة أو أي مكون آخر، يمكنك إضافته هنا --}}
            {{-- @livewire('select-state') --}}

            {{-- اسم المكتب --}}
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">اسم المكتب<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="name" id="name" required="required" class="form-control col-md-7 col-xs-12" value="{{ old('name') }}">
                </div>
            </div>

            {{-- رقم الواتساب --}}
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="whatsapp_number">رقم الواتساب</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="whatsapp_number" id="whatsapp_number" class="form-control col-md-7 col-xs-12" value="{{ old('whatsapp_number') }}">
                </div>
            </div>

            {{-- رقم الهاتف --}}
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone_number">رقم الهاتف</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="phone_number" id="phone_number" class="form-control col-md-7 col-xs-12" value="{{ old('phone_number') }}">
                </div>
            </div>

            {{-- العنوان --}}
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">العنوان</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="address" id="address" class="form-control col-md-7 col-xs-12" value="{{ old('address') }}">
                </div>
            </div>

            {{-- المدير --}}
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="manager">المدير</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="manager" id="manager" class="form-control col-md-7 col-xs-12" value="{{ old('manager') }}">
                </div>
            </div>

            {{-- الشعار (اللوغو) --}}
            <div class="form-group" >
                <label class="control-label col-md-3 col-sm-3 col-xs-12" >الشعار (اللوغو)</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input style="padding-top: 5px !important" type="file" name="logo" class="form-control col-md-7 col-xs-12" >
                </div>
            </div>

            {{-- زر الإضافة --}}
            <div class="ln_solid"></div>
            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button type="submit" class="btn btn-success btn-block">إضافة</button>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection
