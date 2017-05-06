<div class="x_panel">
    <div class="title_left">
        <h3>{{$pagetitle}}</h3>
    </div>
<div class="x_title"></div>
{!! BootForm::openHorizontal(['xs' => [12,12],'sm' => [3, 6], 'md' => [3, 6]])
->action($item ? route('personal.edit',$item): route('personal.store'))
->addClass('form-horizontal form-groups-bordered text-center')
->multipart() !!}

{{	$item ? BootForm::bind($item) : null }}
{!! $item ? BootForm::hidden('_method')->value('PATCH') : '' !!}

{!! BootForm::text('İsim', 'name')->required() !!}
{!! BootForm::text('Soyisim', 'lastname')->required() !!}
{!! BootForm::text('Ünvan', 'profession')->required() !!}
{!! BootForm::date('Başlangıç Tarihi', 'start_date')->required()->value(\Carbon\Carbon::now()) !!}
{!! BootForm::text('Ev No', 'home_phone') !!}
{!! BootForm::text('Tel No', 'mobile_phone')->required() !!}
{!! BootForm::text('Adres', 'address')->required() !!}

{!! BootForm::submit($submitButton)->addClass('btn btn-success pull-right') !!}
{!! BootForm::close() !!}
</div>