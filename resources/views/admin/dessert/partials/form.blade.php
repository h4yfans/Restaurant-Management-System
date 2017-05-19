<div class="x_panel">
    <div class="title_left">
        <h3>{{$pagetitle}}</h3>
    </div>
<div class="x_title"></div>
{!! BootForm::openHorizontal(['xs' => [12,12],'sm' => [3, 6], 'md' => [3, 6]])
->action($item ? route('dessert.update',$item): route('dessert.store'))
->addClass('form-horizontal form-groups-bordered text-center')
->multipart() !!}

{{	$item ? BootForm::bind($item) : null }}
{!! $item ? BootForm::hidden('_method')->value('PATCH') : '' !!}

{!! BootForm::text('Tatlı ismi', 'name')->required() !!}
{!! BootForm::text('Fiyat', 'price')->required() !!}
{!! BootForm::submit($submitButton)->addClass('btn btn-success pull-right') !!}
{!! BootForm::close() !!}
</div>