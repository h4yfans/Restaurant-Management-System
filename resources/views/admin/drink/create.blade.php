@extends('layouts.app')

@section('content')
    @include('admin.drink.partials.form', ['pageTitle' => $pageTitle])
@endsection