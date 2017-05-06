@extends('layouts.app')

@section('content')
    <div class="x_panel">

        <div class="x_title">
            <h2>{{-- TODO VİEW DATA --}}
                <small>Users</small>
            </h2>

            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <table id="datatable-buttons" class="table table-striped table-bordered table-responsive">
                <thead>
                <tr>
                    <th>İsim</th>
                    <th>Soyisim</th>
                    <th>Ünvan</th>
                    <th>Başlangıç Tarihi</th>
                    <th>Ev No</th>
                    <th>Cep No</th>
                    <th>Adres</th>
                    <th>Aksiyonlar</th>

                </tr>
                </thead>


                <tbody>
                <tr>
                    <td>Tiger Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011/04/25</td>
                    <td>2011/04/25</td>
                    <td>$320,800</td>
                    <td><a href="" class="btn btn-info btn-sm btn-icon icon-left">
                            <i class="fa fa-edit"></i>
                            Düzenle</a>
                        <a href="" class="btn btn-danger btn-sm btn-icon icon-left">
                            <i class="fa fa-remove"></i>
                            Sil</a></td>
                </tr>
                <tr>
                    <td>Garrett Winters</td>
                    <td>Accountant</td>
                    <td>Tokyo</td>
                    <td>Tokyo</td>
                    <td>63</td>
                    <td>2011/07/25</td>
                    <td>$170,750</td>
                    <td><a href="" class="btn btn-info btn-sm btn-icon icon-left">
                            <i class="fa fa-edit"></i>
                            Düzenle</a>
                        <a href="" class="btn btn-danger btn-sm btn-icon icon-left">
                            <i class="fa fa-remove"></i>
                            Sil</a></td>
                </tr>
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


    <script>
        $(document).ready(function () {
            console.log('test')
            $('#datatable-buttons').DataTable({
                responsive: true,
                select: true,
                order: [],
            });
        });
    </script>
@endsection