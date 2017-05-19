<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>Genel </h3>
        <ul class="nav side-menu">
            <li class="{{App\Helpers\Helper::classActiveRouteName('home')}}"><a href="{{route('home')}}"><i class="fa fa-home"></i> Anasayfa</a></li>
            <li class="{{App\Helpers\Helper::classActiveRouteName(['table.index', 'table.edit', 'table.create'])}}"><a
                        href="{{route('table.index')}}"><i class="fa fa-table"></i> Masa Yönetimi</a></li>
            <li class="{{App\Helpers\Helper::classActiveRouteName(['personel.index', 'personal.edit', 'personal.create'])}}"><a href="{{route('personal.index')}}"><i class="fa fa-user"></i> Personel Yönetimi</a></li>
            <li><a><i class="fa fa-money"></i> Finans Yönetimi</a></li>
        </ul>
    </div>
    <div class="menu_section">
        <h3>Menüler</h3>
        <ul class="nav side-menu">
            <li class="{{App\Helpers\Helper::classActiveRouteName(['food.index', 'food.edit', 'food.create'])}}"><a href="{{route('food.index')}}"><i class="fa fa-cutlery"></i> Yiyecekler</a></li>
            <li class="{{App\Helpers\Helper::classActiveRouteName(['drink.index', 'drink.edit', 'drink.create'])}}"><a href="{{route('drink.index')}}"><i class="fa fa-glass"></i> İçecekler</a></li>
            <li class="{{App\Helpers\Helper::classActiveRouteName(['dessert.index', 'dessert.edit', 'dessert.create'])}}"><a href="{{route('dessert.index')}}"><i class="fa fa-lemon-o"></i> Tatlılar</a></li>
            <li class="{{App\Helpers\Helper::classActiveRouteName(['salad.index', 'salad.edit', 'salad.create'])}}"><a href="{{route('salad.index')}}"><i class="fa fa-pagelines"></i> Tatlılar</a></li>
        </ul>
    </div>
    <div class="menu_section">
        <h3>Rapor</h3>
        <ul class="nav side-menu">
            <li><a><i class="fa  fa-line-chart"></i> Dönemsel Raporlar</a></li>
        </ul>
    </div>
</div>
<!-- /menu footer buttons -->
<div class="sidebar-footer hidden-small">
    <a data-toggle="tooltip" data-placement="top" title="Settings">
        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Lock">
        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
    </a>
</div>
<!-- /menu footer buttons -->