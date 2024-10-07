@extends('layouts.main')

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>المكاتب المعتمدة {{ Helper::GeneralSiteSettings('name') }}</h2>
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
                                    <th>اسم المكتب</th>
                                    <th>المدير</th>
                                    <th>العنوان</th>
                                    <th>الهاتف</th>
                                    <th>الواتساب</th>
                                    <th>الشعار</th>
                                    <th>تاريخ الإضافة</th>
                                    <th>العمليات</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($offices as $index => $item)
                                <tr>
                                    <td>{{ ++$index }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->manager }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>{{ $item->phone_number }}</td>
                                    <td>{{ $item->whatsapp_number }}</td>
                                    <td>
                                        @if($item->logo)
                                            <img src="{{ asset('images/logos/' . $item->logo) }}" alt="Logo" style="max-width: 50px;">
                                        @else
                                            لا يوجد شعار
                                        @endif
                                    </td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <form action="{{ route('office.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-primary btn-sm"
                                                data-toggle="modal" data-target="#show-{{ $item->id }}"><i
                                                    class="fa fa-eye"></i>
                                            </button>
                                            <a href="{{ route('office.edit', $item->id) }}"
                                                class="btn btn-sm btn-success"><i
                                                    class="fa fa-edit m-right-xs"></i>&nbsp; </a>
                                            <button type="submit" class="show_confirm btn btn-sm btn-danger"><i
                                                    class="fa fa-remove m-right-xs"></i>&nbsp; </button>
                                        </form>
                                    </td>
                                </tr>
                                <!-- Show Modal -->
                                <div class="modal fade" id="show-{{ $item->id }}" tabindex="-1" role="dialog"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-md">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"><span
                                                        aria-hidden="true">×</span>
                                                </button>
                                                <h4 class="modal-title" id="myModalLabel">بيانات المكتب</h4>
                                            </div>
                                            <div class="modal-body">
                                                <ul class="list-unstyled msg_list">
                                                    <li>
                                                        <a>
                                                            <span>
                                                                <span>اسم المكتب</span>
                                                            </span>
                                                            <span class="message">
                                                                {{ $item->name }}
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a>
                                                            <span>
                                                                <span>المدير</span>
                                                            </span>
                                                            <span class="message">
                                                                {{ $item->manager }}
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a>
                                                            <span>
                                                                <span>العنوان</span>
                                                            </span>
                                                            <span class="message">
                                                                {{ $item->address }}
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
                                                                <span>الشعار</span>
                                                            </span>
                                                            <span class="message">
                                                                @if($item->logo)
                                                                    <img src="{{ asset('images/logos/' . $item->logo) }}" alt="Logo" style="max-width: 100px;">
                                                                @else
                                                                    لا يوجد شعار
                                                                @endif
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a>
                                                            <span>
                                                                <span>تاريخ الإضافة</span>
                                                            </span>
                                                            <span class="message">
                                                                {{ $item->created_at }}
                                                            </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">إغلاق</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- End Show Modal -->
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
