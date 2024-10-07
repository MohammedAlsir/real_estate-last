@extends('layouts.main')
@section('content')
    {{-- @include('sweetalert::alert') --}}
    <div class="x_panel">
        <div class="x_title">
            <h2> تعديل البيانات الاساسية
                {{-- <small> </small> --}}
            </h2>

            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br />
            <form method="POST" action="{{ route('settings_edit') }}" id="demo-form2" enctype="multipart/form-data"
                class="form-horizontal form-label-left">
                @csrf
                {{ method_field('put') }}
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="trade_name">الاسم التجاري
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="trade_name" value="{{ $setting->trade_name }}" id="trade_name"
                            required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">اسم المستخدم
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="name" value="{{ $setting->name }}" id="name" required="required"
                            class="form-control col-md-7 col-xs-12">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address"> العنوان
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="address" value="{{ $setting->address }}" id="address"
                            required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="license"> الترخيص
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="license" value="{{ $setting->license }}" id="license"
                            required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                </div>


                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone"> رقم الهاتف
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="number" name="phone" value="{{ $setting->phone }}" id="phone"
                            required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="whatsapp_phone"> رقم الواتساب
                        <span class="required"></span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="number" name="whatsapp_phone" value="{{ $setting->whatsapp_phone }}"
                            id="whatsapp_phone" class="form-control col-md-7 col-xs-12">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telegram_phone"> رقم التلغرام
                        <span class="required"></span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="number" name="telegram_phone" value="{{ $setting->telegram_phone }}"
                            id="telegram_phone" class="form-control col-md-7 col-xs-12">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="personal_email"> البريد الالكتروني
                        <span class="required"></span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="email" name="personal_email" value="{{ $setting->personal_email }}"
                            id="personal_email" class="form-control col-md-7 col-xs-12">
                    </div>
                </div>





                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="twitter_account"> حساب تويتر
                        <span class="required"></span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="twitter_account" value="{{ $setting->twitter_account }}"
                            id="twitter_account" class="form-control col-md-7 col-xs-12">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="facebook_account"> حساب الفيسبوك
                        <span class="required"></span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="facebook_account" value="{{ $setting->facebook_account }}"
                            id="facebook_account" class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-4">
                        <img style="width: 150px; height: 150px; object-fit: cover;"
                            src="{{ asset('uploads/agents/logo/' . $setting->logo) }}" alt="لا يوجد شعار حاليا"
                            srcset="">
                    </div>
                </div>


                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12"> الشعار
                        <span class="required"></span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="file" name="logo" class="form-control col-md-7 col-xs-12">
                    </div>
                </div>

                <hr>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="bank_name"> اسم البنك
                        <span class="required"></span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="bank_name" value="{{ $site_setting->bank_name }}" id="bank_name"
                            class="form-control col-md-7 col-xs-12">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="bank_account"> رقم الحساب
                        <span class="required"></span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="bank_account" value="{{ $site_setting->bank_account }}"
                            id="bank_account" class="form-control col-md-7 col-xs-12">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="entry_fee"> رسوم الاشتراك
                        <span class="required"></span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="entry_fee" value="{{ $site_setting->entry_fee }}" id="entry_fee"
                            class="form-control col-md-7 col-xs-12">
                    </div>
                </div>




                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        {{-- <button type="submit" class="btn btn-primary">انصراف</button> --}}
                        <button type="submit" class="btn btn-success btn-block">تعديل </button>
                    </div>
                </div>

            </form>


        </div>
    </div>
@endsection
