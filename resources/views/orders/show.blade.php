@extends('layouts.main')

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2> 
                    تفاصيل الطلب 
                </h2>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">

                            <div class="modal-body">
                                <ul class="list-unstyled msg_list">
                                    <li>
                                        <a>
                                            <span>
                                                <span>الولاية</span>
                                            </span>
                                            <span class="message">
                                                {{$item->city->state->name}}
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <span>
                                                <span>المدينة</span>
                                            </span>
                                            <span class="message">
                                                {{$item->city->name}}
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <span>
                                                <span>الحي</span>
                                            </span>
                                            <span class="message">
                                                {{$item->neighborhood}}
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <span>
                                                <span>الفندق</span>
                                            </span>
                                            <span class="message">
                                                {{$item->name}}
                                            </span>
                                        </a>
                                    </li>

                                    <li>
                                        <a>
                                            <span>
                                                <span>النوع </span>
                                            </span>
                                            <span class="message">
                                                @if ($item->type == 1)
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
                                                {{number_format($item->price)}}
                                            </span>
                                        </a>
                                    </li>

                                    <li>
                                        <a>
                                            <span>
                                                <span>المميزات</span>
                                            </span>
                                            <span class="message">
                                                {{$item->features}}
                                            </span>
                                        </a>
                                    </li>

                                    <li>
                                        <a>
                                            <span>
                                                <span>الصورة</span>
                                            </span>
                                            @isset ($item->image->photo)
                                                <img style="width: 60%" src="{{ asset('uploads/hotels/'.$item->image->photo)}}">
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
                                                {{$item->created_at}}
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                         
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
