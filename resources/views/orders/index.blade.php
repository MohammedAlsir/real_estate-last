@extends('layouts.main')

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2> الطلبات {{ Helper::GeneralSiteSettings('name') }}
                    {{-- <small>کاربران</small> --}}

                </h2>

                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">

                            <table id="datatable-keytable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>الرقم</th>
                                        <th>الاسم</th>
                                        <th>العنوان</th>
                                        <th>رقم الإثبات</th>
                                        <th>رقم الهاتف</th>
                                        <th>رقم الواتساب</th>
                                        <th>تاريخ الطلب</th>
                                        <th>نوع الطلب</th>
                                        <th>الطلب</th> <!-- العمود الجديد -->
                                        <th>العمليات</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($orders as $index => $item)
                                        <tr>
                                            <td>{{ ++$index }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->adress }}</td>
                                            <td>{{ $item->iden }}</td>
                                            <td>{{ $item->phone_number }}</td>
                                            <td>{{ $item->whatsapp_number }}</td>
                                            <td>{{ $item->created_at }}</td>
                                            <td>
                                                @if ($item->order_type == 1)
                                                    قطع أراضي
                                                @elseif ($item->order_type == 2)
                                                    منازل
                                                @elseif ($item->order_type == 3)
                                                    شقق سكنية
                                                @elseif ($item->order_type == 4)
                                                    فنادق
                                                @endif
                                            </td>
                                            <!-- زر عرض بيانات الطلب -->
                                            <td>
                                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                    data-target="#order-details-{{ $item->id }}"><i
                                                        class="fa fa-file-text-o"></i>
                                                </button>
                                            </td>
                                            <td>
                                                <form action="{{ route('orders.destroy', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-primary btn-sm"
                                                        data-toggle="modal" data-target="#show-{{ $item->id }}"><i
                                                            class="fa fa-eye"></i>
                                                    </button>

                                                    <button type="submit" class="show_confirm btn btn-sm btn-danger"><i
                                                            class="fa fa-remove m-right-xs"></i>&nbsp; </button>
                                                </form>
                                            </td>
                                        </tr>
                                        <!-- مودال عرض بيانات الطلب -->
                                        <div class="modal fade" id="order-details-{{ $item->id }}" tabindex="-1"
                                            role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">

                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"><span
                                                                aria-hidden="true">×</span>
                                                        </button>
                                                        <h4 class="modal-title" id="myModalLabel">تفاصيل الطلب</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <ul class="list-unstyled msg_list">
                                                            <li>
                                                                <a>
                                                                    <span>
                                                                        <span>المستخدم</span>
                                                                    </span>
                                                                    <span class="message">
                                                                        @if ($item->user)
                                                                            {{ $item->user->name }}
                                                                        @else
                                                                            {{ $item->user_name }}
                                                                        @endif
                                                                    </span>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a>
                                                                    <span>
                                                                        <span>رقم الهاتف</span>
                                                                    </span>
                                                                    <span class="message">
                                                                        {{ $item->user_phone_number??'' }}
                                                                    </span>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a>
                                                                    <span>
                                                                        <span>رقم الواتساب</span>
                                                                    </span>
                                                                    <span class="message">
                                                                        {{ $item->user_whatsapp_number??'' }}
                                                                    </span>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a>
                                                                    <span>
                                                                        <span>العنوان</span>
                                                                    </span>
                                                                    <span class="message">
                                                                        {{ $item->user_address }}
                                                                    </span>
                                                                </a>
                                                            </li>


                                                            <li>
                                                                <a>
                                                                    <span>
                                                                        <span>رقم الهوية</span>
                                                                    </span>
                                                                    <span class="message">
                                                                        {{ $item->user_iden }}
                                                                    </span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                        @if ($item->order_type == 1)
                                                            <!-- تفاصيل قطع الأراضي -->
                                                            @php
                                                                $parcel = App\Models\Parcel::find($item->order_id);
                                                            @endphp
                                                            @if ($parcel)
                                                            <ul class="list-unstyled msg_list">

                                                                <li>
                                                                    <a>
                                                                        <span>
                                                                            <span>الولاية</span>
                                                                        </span>
                                                                        <span class="message">
                                                                            {{$parcel->city->state->name}}
                                                                        </span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a>
                                                                        <span>
                                                                            <span>المدينة</span>
                                                                        </span>
                                                                        <span class="message">
                                                                            {{$parcel->city->name}}
                                                                        </span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a>
                                                                        <span>
                                                                            <span>الحي</span>
                                                                        </span>
                                                                        <span class="message">
                                                                            {{$parcel->neighborhood}}
                                                                        </span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a>
                                                                        <span>
                                                                            <span>المربع</span>
                                                                        </span>
                                                                        <span class="message">
                                                                            {{$parcel->square}}
                                                                        </span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a>
                                                                        <span>
                                                                            <span>نوع القطعة</span>
                                                                        </span>
                                                                        <span class="message">
                                                                            {{$parcel->type->name}}
                                                                        </span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a>
                                                                        <span>
                                                                            <span>الدرجة</span>
                                                                        </span>
                                                                        <span class="message">
                                                                            {{$parcel->degree}}
                                                                        </span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a>
                                                                        <span>
                                                                            <span>مساحة القطعة</span>
                                                                        </span>
                                                                        <span class="message">
                                                                            {{number_format($parcel->space)}} {{$parcel->spaceType->name}}
                                                                        </span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a>
                                                                        <span>
                                                                            <span>السعر</span>
                                                                        </span>
                                                                        <span class="message">
                                                                            {{number_format($parcel->price)}}
                                                                        </span>
                                                                    </a>
                                                                </li>

                                                                <li>
                                                                    <a>
                                                                        <span>
                                                                            <span>المميزات</span>
                                                                        </span>
                                                                        <span class="message">
                                                                            {{$parcel->features}}
                                                                        </span>
                                                                    </a>
                                                                </li>

                                                                <li>
                                                                    <a>
                                                                        <span>
                                                                            <span>تصنيف القطعة</span>
                                                                        </span>
                                                                        <span class="message">
                                                                            {{$parcel->category->name}}
                                                                        </span>
                                                                    </a>
                                                                </li>

                                                                <li>
                                                                    <a>
                                                                        <span>
                                                                            <span>الصورة</span>
                                                                        </span>
                                                                        @isset ($parcel->image->photo)
                                                                            <img style="width: 60%" src="{{ asset('uploads/parcels/'.$parcel->image->photo)}}">
                                                                        @else
                                                                            <span class="message">
                                                                                لا يوجد صورة حاليا
                                                                            </span>

                                                                        @endisset


                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a>
                                                                        <span>
                                                                            <span>تاريخ الاضافة</span>
                                                                        </span>
                                                                        <span class="message">
                                                                            {{$parcel->created_at}}
                                                                        </span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                            @else
                                                                <p>لم يتم العثور على تفاصيل الأرض.</p>
                                                            @endif
                                                        @elseif ($item->order_type == 2)
                                                            <!-- تفاصيل المنازل -->
                                                            @php
                                                                $house = App\Models\House::find($item->order_id);
                                                            @endphp
                                                            @if ($house)
                                                            <ul class="list-unstyled msg_list">
                                                                <li>
                                                                    <a>
                                                                        <span>
                                                                            <span>الولاية</span>
                                                                        </span>
                                                                        <span class="message">
                                                                            {{$house->city->state->name}}
                                                                        </span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a>
                                                                        <span>
                                                                            <span>المدينة</span>
                                                                        </span>
                                                                        <span class="message">
                                                                            {{$house->city->name}}
                                                                        </span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a>
                                                                        <span>
                                                                            <span>الحي</span>
                                                                        </span>
                                                                        <span class="message">
                                                                            {{$house->neighborhood}}
                                                                        </span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a>
                                                                        <span>
                                                                            <span>المربع</span>
                                                                        </span>
                                                                        <span class="message">
                                                                            {{$house->square}}
                                                                        </span>
                                                                    </a>
                                                                </li>

                                                                <li>
                                                                    <a>
                                                                        <span>
                                                                            <span>رقم المنزل</span>
                                                                        </span>
                                                                        <span class="message">
                                                                            {{$house->house_number}}
                                                                        </span>
                                                                    </a>
                                                                </li>

                                                                <li>
                                                                    <a>
                                                                        <span>
                                                                            <span>الدرجة</span>
                                                                        </span>
                                                                        <span class="message">
                                                                            {{$house->degree}}
                                                                        </span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a>
                                                                        <span>
                                                                            <span>مساحة المنزل</span>
                                                                        </span>
                                                                        <span class="message">
                                                                            {{number_format($house->space)}}
                                                                        </span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a>
                                                                        <span>
                                                                            <span>النوع </span>
                                                                        </span>
                                                                        <span class="message">
                                                                            @if ($house->type == 1)
                                                                                ايجار
                                                                            @else
                                                                                بيع
                                                                            @endif
                                                                        </span>
                                                                    </a>
                                                                </li>

                                                                <li>
                                                                    <a>
                                                                        <span>
                                                                            <span>السعر</span>
                                                                        </span>
                                                                        <span class="message">
                                                                            {{number_format($house->price)}}
                                                                            @if ($house->type == 1)
                                                                                @switch($house->rental)
                                                                                    @case('daily')
                                                                                        يوميا
                                                                                        @break
                                                                                    @case('monthly')
                                                                                        شهريا
                                                                                        @break
                                                                                    @case('yearly')
                                                                                        سنويا
                                                                                        @break

                                                                                @endswitch
                                                                            @endif
                                                                        </span>
                                                                    </a>
                                                                </li>

                                                                <li>
                                                                    <a>
                                                                        <span>
                                                                            <span>المميزات</span>
                                                                        </span>
                                                                        <span class="message">
                                                                            {{$house->features}}
                                                                        </span>
                                                                    </a>
                                                                </li>

                                                                <li>
                                                                    <a>
                                                                        <span>
                                                                            <span>الصورة</span>
                                                                        </span>
                                                                        @isset ($house->image->photo)
                                                                            <img style="width: 60%" src="{{ asset('uploads/houses/'.$house->image->photo)}}">
                                                                        @else
                                                                            <span class="message">
                                                                                لا يوجد صورة حاليا
                                                                            </span>
                                                                        @endisset
                                                                    </a>
                                                                </li>

                                                                <li>
                                                                    <a>
                                                                        <span>
                                                                            <span>تاريخ الاضافة</span>
                                                                        </span>
                                                                        <span class="message">
                                                                            {{$house->created_at}}
                                                                        </span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                            @else
                                                                <p>لم يتم العثور على تفاصيل المنزل.</p>
                                                            @endif
                                                        @elseif ($item->order_type == 3)
                                                            <!-- تفاصيل الشقق السكنية -->
                                                            @php
                                                                $apartment = App\Models\Apartment::find(
                                                                    $item->order_id,
                                                                );
                                                            @endphp
                                                            @if ($apartment)
                                                            <ul class="list-unstyled msg_list">
                                                                <li>
                                                                    <a>
                                                                        <span>
                                                                            <span>الولاية</span>
                                                                        </span>
                                                                        <span class="message">
                                                                            {{$apartment->city->state->name}}
                                                                        </span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a>
                                                                        <span>
                                                                            <span>المدينة</span>
                                                                        </span>
                                                                        <span class="message">
                                                                            {{$apartment->city->name}}
                                                                        </span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a>
                                                                        <span>
                                                                            <span>الحي</span>
                                                                        </span>
                                                                        <span class="message">
                                                                            {{$apartment->neighborhood}}
                                                                        </span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a>
                                                                        <span>
                                                                            <span>المربع</span>
                                                                        </span>
                                                                        <span class="message">
                                                                            {{$apartment->square}}
                                                                        </span>
                                                                    </a>
                                                                </li>

                                                                <li>
                                                                    <a>
                                                                        <span>
                                                                            <span>رقم الشقة</span>
                                                                        </span>
                                                                        <span class="message">
                                                                            {{$apartment->apartment_number}}
                                                                        </span>
                                                                    </a>
                                                                </li>

                                                                <li>
                                                                    <a>
                                                                        <span>
                                                                            <span>مساحة الشقة</span>
                                                                        </span>
                                                                        <span class="message">
                                                                            {{number_format($apartment->space)}}
                                                                        </span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a>
                                                                        <span>
                                                                            <span>النوع </span>
                                                                        </span>
                                                                        <span class="message">
                                                                            @if ($apartment->type == 1)
                                                                                ايجار عادي
                                                                            @else
                                                                                ايجار مفروش
                                                                            @endif
                                                                        </span>
                                                                    </a>
                                                                </li>

                                                                <li>
                                                                    <a>
                                                                        <span>
                                                                            <span>السعر</span>
                                                                        </span>
                                                                        <span class="message">
                                                                            {{number_format($apartment->price)}}
                                                                                @switch($apartment->rental)
                                                                                    @case('daily')
                                                                                        يوميا
                                                                                        @break
                                                                                    @case('monthly')
                                                                                        شهريا
                                                                                        @break
                                                                                    @case('yearly')
                                                                                        سنويا
                                                                                        @break
                                                                                @endswitch
                                                                        </span>
                                                                    </a>
                                                                </li>

                                                                <li>
                                                                    <a>
                                                                        <span>
                                                                            <span>المميزات</span>
                                                                        </span>
                                                                        <span class="message">
                                                                            {{$apartment->features}}
                                                                        </span>
                                                                    </a>
                                                                </li>

                                                                <li>
                                                                    <a>
                                                                        <span>
                                                                            <span>الصورة</span>
                                                                        </span>
                                                                        @isset ($apartment->image->photo)
                                                                            <img style="width: 60%" src="{{ asset('uploads/apartments/'.$apartment->image->photo)}}">
                                                                        @else
                                                                            <span class="message">
                                                                                لا يوجد صورة حاليا
                                                                            </span>
                                                                        @endisset
                                                                    </a>
                                                                </li>

                                                                <li>
                                                                    <a>
                                                                        <span>
                                                                            <span>تاريخ الاضافة</span>
                                                                        </span>
                                                                        <span class="message">
                                                                            {{$apartment->created_at}}
                                                                        </span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                            @else
                                                                <p>لم يتم العثور على تفاصيل الشقة.</p>
                                                            @endif
                                                        @elseif ($item->order_type == 4)
                                                            <!-- تفاصيل الفنادق -->
                                                            @php
                                                                $hotel = App\Models\Hotel::find($item->order_id);
                                                            @endphp
                                                            @if ($hotel)
                                                            <ul class="list-unstyled msg_list">
                                                                <li>
                                                                    <a>
                                                                        <span>
                                                                            <span>الولاية</span>
                                                                        </span>
                                                                        <span class="message">
                                                                            {{$hotel->city->state->name}}
                                                                        </span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a>
                                                                        <span>
                                                                            <span>المدينة</span>
                                                                        </span>
                                                                        <span class="message">
                                                                            {{$hotel->city->name}}
                                                                        </span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a>
                                                                        <span>
                                                                            <span>الحي</span>
                                                                        </span>
                                                                        <span class="message">
                                                                            {{$hotel->neighborhood}}
                                                                        </span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a>
                                                                        <span>
                                                                            <span>الفندق</span>
                                                                        </span>
                                                                        <span class="message">
                                                                            {{$hotel->name}}
                                                                        </span>
                                                                    </a>
                                                                </li>

                                                                <li>
                                                                    <a>
                                                                        <span>
                                                                            <span>النوع </span>
                                                                        </span>
                                                                        <span class="message">
                                                                            @if ($hotel->type == 1)
                                                                                شقة
                                                                            @else
                                                                                جناح
                                                                            @endif
                                                                        </span>
                                                                    </a>
                                                                </li>

                                                                <li>
                                                                    <a>
                                                                        <span>
                                                                            <span>السعر</span>
                                                                        </span>
                                                                        <span class="message">
                                                                            {{number_format($hotel->price)}}
                                                                        </span>
                                                                    </a>
                                                                </li>

                                                                <li>
                                                                    <a>
                                                                        <span>
                                                                            <span>المميزات</span>
                                                                        </span>
                                                                        <span class="message">
                                                                            {{$hotel->features}}
                                                                        </span>
                                                                    </a>
                                                                </li>

                                                                <li>
                                                                    <a>
                                                                        <span>
                                                                            <span>الصورة</span>
                                                                        </span>
                                                                        @isset ($hotel->image->photo)
                                                                            <img style="width: 60%" src="{{ asset('uploads/hotels/'.$hotel->image->photo)}}">
                                                                        @else
                                                                            <span class="message">
                                                                                لا يوجد صورة حاليا
                                                                            </span>
                                                                        @endisset
                                                                    </a>
                                                                </li>

                                                                <li>
                                                                    <a>
                                                                        <span>
                                                                            <span>تاريخ الاضافة</span>
                                                                        </span>
                                                                        <span class="message">
                                                                            {{$hotel->created_at}}
                                                                        </span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                            @else
                                                                <p>لم يتم العثور على تفاصيل الفندق.</p>
                                                            @endif
                                                        @endif
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">إغلاق</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- نهاية مودال عرض بيانات الطلب -->

                                        <!-- مودال عرض بيانات العميل (المودال الأصلي) -->
                                        <div class="modal fade" id="show-{{ $item->id }}" tabindex="-1" role="dialog"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-md">
                                                <div class="modal-content">

                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"><span
                                                                aria-hidden="true">×</span>
                                                        </button>
                                                        <h4 class="modal-title" id="myModalLabel">بيانات العميل</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <ul class="list-unstyled msg_list">
                                                            <li>
                                                                <a>
                                                                    <span>
                                                                        <span>الاسم</span>
                                                                    </span>
                                                                    <span class="message">
                                                                        {{ $item->name }}
                                                                    </span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a>
                                                                    <span>
                                                                        <span>العنوان</span>
                                                                    </span>
                                                                    <span class="message">
                                                                        {{ $item->adress }}
                                                                    </span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a>
                                                                    <span>
                                                                        <span>رقم الإثبات</span>
                                                                    </span>
                                                                    <span class="message">
                                                                        {{ $item->iden }}
                                                                    </span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a>
                                                                    <span>
                                                                        <span>رقم الهاتف</span>
                                                                    </span>
                                                                    <span class="message">
                                                                        {{ $item->phone_number }}
                                                                    </span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a>
                                                                    <span>
                                                                        <span>رقم الواتساب</span>
                                                                    </span>
                                                                    <span class="message">
                                                                        {{ $item->whatsapp_number }}
                                                                    </span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a>
                                                                    <span>
                                                                        <span>تاريخ الطلب</span>
                                                                    </span>
                                                                    <span class="message">
                                                                        {{ $item->created_at }}
                                                                    </span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a>
                                                                    <span>
                                                                        <span>نوع الطلب</span>
                                                                    </span>
                                                                    <span class="message">
                                                                        @if ($item->order_type == 1)
                                                                            قطع أراضي
                                                                        @elseif ($item->order_type == 2)
                                                                            منازل
                                                                        @elseif ($item->order_type == 3)
                                                                            شقق سكنية
                                                                        @elseif ($item->order_type == 4)
                                                                            فنادق
                                                                        @endif
                                                                    </span>
                                                                </a>
                                                            </li>
                                                            {{-- يمكنك إضافة المزيد من الحقول هنا إذا لزم الأمر --}}
                                                        </ul>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">إغلاق</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- نهاية مودال عرض بيانات العميل -->
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
