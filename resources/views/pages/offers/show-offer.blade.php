@extends('layout.admin')

@section('page-title')
    {{ __('page-title.offer-create') }}
@endsection

@section('page-breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">{{ __('sidebar.dashboard') }}</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('offers.index') }}">{{ __('sidebar.offers') }}</a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">{{ $company->name .  ' Fiyat Teklifi' }}</li>
@endsection

@section('page-content')
    <div class="middle-content container-xxl p-0">
        <div class="row invoice layout-top-spacing layout-spacing">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="doc-container">
                    <div class="row">
                        <div class="col-xl-9 pb-3 ">
                            @include('pages.offers.partial.offer-pdf', ['offer' => $offer, 'company' => $company, 'offerProducts' => $offerProducts])
                        </div>
                        <div class="col-xl-3">
                            <div class="invoice-actions-btn">
                                <div class="invoice-action-btn">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-3 col-sm-6">
                                            <a href="{{ route('download-pdf', $offer->id) }}"
                                               class="btn btn-primary btn-print">PDF İndir</a>
                                        </div>
                                        <div class="col-xl-12 col-md-3 col-sm-6">
                                            <a href="javascript:void(0);"
                                               class="btn btn-secondary btn-print  action-print">Yazdır</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-css')
    <link href="{{ asset('src/assets/css/light/apps/invoice-preview.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/offer-pdf.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('src/assets/css/dark/apps/invoice-preview.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('page-js')
    <script src="{{ asset('src/assets/js/apps/invoice-preview.js') }}"></script>
@endsection
