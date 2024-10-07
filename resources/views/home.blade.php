@extends('layouts.main')
@section('content')
    <style>
        .icon_style {
            display: block !important;
            text-align: center;
            font-size: 40px !important;
        }
    </style>

    <div class="row top_tiles">
        <!-- المقاييس الجديدة -->
        <!-- عدد الأراضي -->
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-tree"></i></div>
                <div class="count">{{ number_format($parcel_count) }}</div>
                <h3>الأراضي</h3>
            </div>
        </div>

        <!-- عدد الفنادق -->
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-bed"></i></div>
                <div class="count">{{ number_format($hotels_count) }}</div>
                <h3>الفنادق</h3>
            </div>
        </div>

        <!-- عدد الشقق السكنية -->
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-building"></i></div>
                <div class="count">{{ number_format($apartments_count) }}</div>
                <h3>الشقق السكنية</h3>
            </div>
        </div>

        <!-- عدد المنازل -->
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-home"></i></div>
                <div class="count">{{ number_format($houses_count) }}</div>
                <h3>المنازل</h3>
            </div>
        </div>
    </div>

    <!-- إضافة المخططين داخل بطاقات -->
    <div class="row">
        <!-- المخطط الأول داخل بطاقة -->
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>مقارنة عدد الطلبات</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div id="echart1" style="height:400px;"></div>
                </div>
            </div>
        </div>
        <!-- المخطط الثاني داخل بطاقة -->
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>مقارنة عدد العقارات</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div id="echart2" style="height:400px;"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- تحميل مكتبة ECharts من CDN -->
    <script src="https://cdn.jsdelivr.net/npm/echarts/dist/echarts.min.js"></script>

    <script>
        // تحديد ألوان متناسقة لكل فئة
        var colors = {
            'الأراضي': '#2E86C1',         // أزرق داكن
            'المنازل': '#5DADE2',        // أزرق متوسط
            'الشقق السكنية': '#85C1E9',  // أزرق فاتح
            'الفنادق': '#AED6F1'         // أزرق باهت
        };

        // المخطط الأول: مقارنة عدد الطلبات (مخطط دائري)
        var chartDom1 = document.getElementById('echart1');
        var myChart1 = echarts.init(chartDom1);
        var option1;

        option1 = {
            tooltip: {
                trigger: 'item'
            },
            legend: {
                orient: 'vertical',
                left: 'left',
                data: ['الأراضي', 'المنازل', 'الشقق السكنية', 'الفنادق']
            },
            series: [
                {
                    name: 'عدد الطلبات',
                    type: 'pie',
                    radius: '50%',
                    avoidLabelOverlap: false,
                    label: {
                        show: true,
                        position: 'outside'
                    },
                    labelLine: {
                        show: true
                    },
                    data: [
                        { value: {{ $parcel_orders }}, name: 'الأراضي', itemStyle: { color: colors['الأراضي'] } },
                        { value: {{ $house_orders }}, name: 'المنازل', itemStyle: { color: colors['المنازل'] } },
                        { value: {{ $apartment_orders }}, name: 'الشقق السكنية', itemStyle: { color: colors['الشقق السكنية'] } },
                        { value: {{ $hotel_orders }}, name: 'الفنادق', itemStyle: { color: colors['الفنادق'] } }
                    ]
                }
            ]
        };

        option1 && myChart1.setOption(option1);

        // المخطط الثاني: مقارنة عدد العقارات (مخطط عمودي)
        var chartDom2 = document.getElementById('echart2');
        var myChart2 = echarts.init(chartDom2);
        var option2;

        option2 = {
            tooltip: {
                trigger: 'axis'
            },
            xAxis: {
                type: 'category',
                data: ['الأراضي', 'المنازل', 'الشقق السكنية', 'الفنادق']
            },
            yAxis: {
                type: 'value'
            },
            series: [
                {
                    type: 'bar',
                    barWidth: '50%',
                    data: [
                        { value: {{ $parcel_count }}, itemStyle: { color: colors['الأراضي'] } },
                        { value: {{ $houses_count }}, itemStyle: { color: colors['المنازل'] } },
                        { value: {{ $apartments_count }}, itemStyle: { color: colors['الشقق السكنية'] } },
                        { value: {{ $hotels_count }}, itemStyle: { color: colors['الفنادق'] } }
                    ]
                }
            ]
        };

        option2 && myChart2.setOption(option2);
    </script>
@endsection
