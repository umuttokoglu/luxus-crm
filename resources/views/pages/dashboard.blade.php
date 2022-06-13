@extends('layout.admin')

@section('page-breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">
        <a href="{{ route('dashboard') }}">{{ __('sidebar.dashboard') }}</a>
    </li>
@endsection

@section('page-content')

@endsection
