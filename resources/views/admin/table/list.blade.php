@extends('layouts.app')

@section('content')
    <div class="x_panel">
        <div class="pull-right">
            <h2></h2>
            <div class="right">
                {!! BootForm::openHorizontal(['xs' => [1,11],'sm' => [1, 11], 'md' => [1, 11]])->action(route('table.store'))!!}
                {!! BootForm::submit('Yeni Masa Ekle')->addClass('btn btn-success btn-icon icon-left') !!}
                {!! BootForm::close() !!}
            </div>
        </div>
        <div class="x_title">
            <h2>{{$pageTitle}}</h2>

            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <table id="datatable-buttons" class="table table-striped table-bordered table-responsive">
                <thead>
                <tr>
                    <th>Masa NO</th>
                    <th>Aksiyonlar</th>
                </tr>
                </thead>


                <tbody class="row">
                @foreach($tables as $table)
                    <tr>
                        <td>Masa {{ $table->id }}</td>
                        <td>
                            <a href="{{route('table.destroy', $table->id)}}"
                               class="btn btn-danger btn-sm destroyButton" data-destroypersonal="{{$table->name}}">
                                <i class="fa fa-remove"></i>
                                Sil
                            </a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('header_css')
    <link rel="stylesheet" href="{{asset('css/datatables/dataTables.bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/datatables/buttons.bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/datatables/fixedHeader.bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/datatables/fixedHeader.bootstrap.min.css')}}">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.7/css/bootstrap-dialog.min.css">
    <link rel="stylesheet" href="{{asset('css/pnotify.css')}}">
    <link rel="stylesheet" href="{{asset('css/pnotify.buttons.css')}}">
    <link rel="stylesheet" href="{{asset('css/pnotify.nonblock.css')}}">
@endsection

@section('footer_js')
    <script src="{{asset('js/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/datatables/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('js/datatables/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('js/datatables/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('js/datatables/buttons.html5.min.js')}}"></script>
    <script src="{{asset('js/datatables/buttons.print.min.js')}}"></script>
    <script src="{{asset('js/datatables/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{asset('js/datatables/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('js/datatables/responsive.bootstrap.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.7/js/bootstrap-dialog.min.js"></script>
    <script src="{{asset('js/pnotify.js')}}"></script>
    <script src="{{asset('js/pnotify.buttons.js')}}"></script>
    <script src="{{asset('js/pnotify.nonblock.js')}}"></script>



    <script>
        $(document).ready(function () {
            $('#datatable-buttons').DataTable({
                responsive: true,
                select: true,
                order: [],
            });
        });

        $('.destroyButton').on('click', function (e) {
            e.preventDefault();
            var ajaxurl = $(this).attr("href");
            var parentline = $(this).parents("tr");


            BootstrapDialog.confirm({
                title: 'Silinecek Öğe: ' + $(this).data('destroypersonal'),
                message: 'Seçmiş olduğunuz öğeyi silmek istediğinize emin misiniz?',
                type: BootstrapDialog.TYPE_DANGER, // <-- Default value is BootstrapDialog.TYPE_PRIMARY
                // closable: true, // <-- Default value is false
                // draggable: true, // <-- Default value is false
                btnOKClass: 'btn-warning', // <-- If you didn't specify it, dialog type will be used,
                btnCancelLabel: 'İptal', // <-- Default value is 'Cancel',
                btnOKLabel: 'Onay', // <-- Default value is 'OK',

                callback: function (result) {

                    if (result) {
                        $.ajax({
                            url: ajaxurl,
                            data: {"_token": '{{csrf_token()}}', '_method': 'delete'},
                            type: 'POST',
                            success: function (result) {
                                if (result.is_action_successful === 1) {
                                    parentline.fadeOut();
                                    new PNotify({
                                        title: 'Başarılı',
                                        text: 'Başarıyla silindi',
                                        type: 'success',
                                        styling: 'bootstrap3'
                                    });
                                } else {
                                    console.log('silinmedi')
                                }
                            }
                        });
                    }
                }
            });

            return false;
        });

    </script>


@endsection