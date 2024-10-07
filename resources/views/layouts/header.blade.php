<div class="col-md-3 left_col hidden-print">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>سوداكود</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="{{ asset('uploads/profile/' . auth()->user()->photo) }}"
                    style="width: 56px; height: 56px;object-fit: cover;" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>مرحبا بك</span>
                <h2>{{ Auth()->user()->name }}</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>القائمة الرئيسية</h3>
                <ul class="nav side-menu">
                    <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>الصفحة الرئيسية</a></li>

                    <li><a href="{{ route('city.index') }}"><i class="fa fa-map-marker"></i> الولايات و المدن</a></li>

                    <!-- الوكلاء العقاريون -->
                    {{--  <li><a><i class="fa fa-users"></i>الوكلاء العقاريون<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('agent.index') }}">كل الوكلاء</a></li>
                            <li><a href="{{ route('agent.create') }}">إضافة وكيل جديد</a></li>
                        </ul>
                    </li>  --}}

                    <li><a><i class="fa fa-tree"></i>قطع اراضي<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('parcel.index') }}">كل قطع الاراضي</a></li>
                            <li><a href="{{ route('parcel.create') }}">إضافة قطعة ارض جديدة</a></li>
                        </ul>
                    </li>

                    <li><a><i class="fa fa-home"></i>المنازل<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('houses.index') }}">كل المنازل</a></li>
                            <li><a href="{{ route('houses.create') }}">إضافة منزل جديد</a></li>
                        </ul>
                    </li>

                    <li><a><i class="fa fa-building-o"></i>الشقق السكنية<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('apartments.index') }}">كل الشقق</a></li>
                            <li><a href="{{ route('apartments.create') }}">إضافة شقة جديدة</a></li>
                        </ul>
                    </li>

                    <li><a><i class="fa fa-bed"></i>الفنادق<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('hotels.index') }}">كل الفنادق</a></li>
                            <li><a href="{{ route('hotels.create') }}">إضافة فندق جديد</a></li>
                        </ul>
                    </li>

                    <li><a><i class="fa fa-shopping-cart"></i>الطلبات <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('orders.index') }}">كل الطلبات</a></li>
                        </ul>
                    </li>

                    <li><a><i class="fa fa-building"></i>مكاتبنا<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('office.index') }}">كل المكاتب</a></li>
                            <li><a href="{{ route('office.create') }}">إضافة مكتب جديد</a></li>
                        </ul>
                    </li>

                    <li><a><i class="fa fa-bullhorn"></i>الاعلانات<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('ads.index') }}">كل الاعلانات</a></li>
                            <li><a href="{{ route('ads.create') }}">إضافة اعلان جديد</a></li>
                        </ul>
                    </li>

                    <li><a><i class="fa fa-file-text-o"></i>التقارير<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('agents') }}">الوكلاء</a></li>
                        </ul>
                    </li>

                    <!-- Hotels -->

                    {{-- <li><a><i class="fa fa-arrow-up"></i> إدارة المشتريات <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('purchases.index')}}">كل المشتريات</a></li>
                            <li><a href="{{route('purchases.create')}}">إضافة مشتريات جديدة</a></li>
                        </ul>
                    </li>

                    <li><a><i class="fa fa-dot-circle-o"></i> إدارة المخزن <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('store.index')}}">المخزن الرئيسي </a></li>
                            <li><a href="{{route('store.kitchen')}}">المطبخ</a></li>
                        </ul>
                    </li> --}}

                </ul>
            </div>
            <div class="menu_section">
                <h3>بيانات الموقع</h3>
                <ul class="nav side-menu">
                    <li><a href="{{ route('settings') }}"><i class="fa fa-cogs"></i>البيانات الاساسية</a></li>
                </ul>
            </div>

        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">

            <a data-toggle="tooltip" data-placement="top" title="شاشة كاملة" onclick="toggleFullScreen();">
                <span class="fa fa-arrows-alt" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="قفل" class="lock_btn">
                <span class="fa fa-eye-slash" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="تسجيل الخروج" href="{{ route('logout') }}">
                <span class="fa fa-sign-out" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>
