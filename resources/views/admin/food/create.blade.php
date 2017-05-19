@extends('layouts.app')

@section('content')
    @include('admin.food.partials.form', ['pageTitle' => $pageTitle])
@endsection