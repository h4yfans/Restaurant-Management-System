@extends('layouts.app')


@section('content')

    <!-- top tiles -->
    <div class="row tile_count">
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Müşteri Sayısı</span>
            <div class="count">2500</div>
            <span class="count_bottom">Geçen haftaya göre <i class="green">4% </i></span>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Yeni Müşteri</span>
            <div class="count">124</div>
            <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>23%</i> Bu hafta</span>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-clock-o"></i> Oturma Süresi</span>
            <div class="count">40 dk</div>
            <span class="count_bottom">Geçen haftaya göre <i class="green"><i class="fa fa-sort-asc"></i>3% </i></span>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-sun-o"></i> Günlük Kazanç</span>
            <div class="count">7,325₺</div>
            <span class="count_bottom"> Düne göre <i class="green"><i class="fa fa-sort-asc"></i>34% </i></span>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count text-center">
            <span class="count_top"><i class="fa fa-cutlery"></i> Yemek Çeşit</span>
            <div class="count">53</div>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count text-center">
            <span class="count_top"><i class="fa fa-glass"></i> İçecek Çeşit</span>
            <div class="count">25</div>
        </div>

    </div>
    <!-- /top tiles -->


    <!-- page content -->
    <div class="" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>Anasayfa</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Plain Page</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->

@endsection