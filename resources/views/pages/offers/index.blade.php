@extends('layout.admin')

@section('page-title')
    {{ __('page-title.offers') }}
@endsection

@section('page-breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">{{ __('sidebar.dashboard') }}</a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">{{ __('sidebar.offers') }}</li>
@endsection

@section('page-content')
    <div class="col-lg-6 col-sm-12 col-xs-12 layout-spacing">
        <div class="d-grid gap-2 mx-auto">
            <a class="btn btn-light-primary btn-rounded mb-2 me-4 new-offer"
                    href="{{ route('companies.create') }}">
                {{ __('pages/offers-index.buttons.new-offer') }}
            </a>
        </div>
    </div>
    <div class="col-lg-6 col-sm-12 col-xs-12 layout-spacing">
        <div class="d-grid gap-2 mx-auto">
            <a class="btn btn-light-secondary btn-rounded mb-2 me-4 new-offer-to-existing-company"
                    href="{{ route('offers.create') }}">
                {{ __('pages/offers-index.buttons.new-offer-for-existing-firm') }}
            </a>
        </div>
    </div>
    <div id="tableCustomMixed" class="col-lg-12 col-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>{{ __('page-title.offers') }}</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                        <tr>
                            <th scope="col" width="5%">
                                <div class="form-check form-check-primary">
                                    <input class="form-check-input" id="custom_mixed_parent_all" type="checkbox">
                                </div>
                            </th>
                            <th scope="col">{{ __('pages/offers-index.table.header.company-name') }}</th>
                            <th scope="col">{{ __('pages/offers-index.table.header.product-count') }}</th>
                            <th class="text-center" scope="col">{{ __('pages/offers-index.table.header.price') }}</th>
                            <th class="text-center" scope="col">{{ __('pages/offers-index.table.header.date') }}</th>
                            <th class="text-center" scope="col">{{ __('pages/offers-index.table.header.status') }}</th>
                            <th class="text-center" scope="col"></th>
                        </tr>
                        <tr aria-hidden="true" class="mt-3 d-block table-row-hidden"></tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <div class="form-check form-check-primary">
                                    <input class="form-check-input custom_mixed_child" type="checkbox">
                                </div>
                            </td>
                            <td>
                                <div class="media">
                                    <div class="avatar me-2">
                                        <img alt="avatar" src="../src/assets/img/profile-7.jpeg"
                                             class="rounded-circle"/>
                                    </div>
                                    <div class="media-body align-self-center">
                                        <h6 class="mb-0">Shaun Park</h6>
                                        <span>shaun.park@mail.com</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="mb-0">CEO</p>
                                <span class="text-success">Management</span>
                            </td>
                            <td class="text-center">
                                <p class="mb-0">CEO</p>
                                <span class="text-success">Management</span>
                            </td>
                            <td class="text-center">
                                <p class="mb-0">CEO</p>
                                <span class="text-success">Management</span>
                            </td>
                            <td class="text-center">
                                <span class="badge badge-light-success">Online</span>
                            </td>
                            <td class="text-center">
                                <div class="action-btns">
                                    <a href="javascript:void(0);" class="action-btn btn-view bs-tooltip me-2"
                                       data-toggle="tooltip" data-placement="top" title="View">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                            <circle cx="12" cy="12" r="3"></circle>
                                        </svg>
                                    </a>
                                    <a href="javascript:void(0);" class="action-btn btn-edit bs-tooltip me-2"
                                       data-toggle="tooltip" data-placement="top" title="Edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-edit-2">
                                            <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                        </svg>
                                    </a>
                                    <a href="javascript:void(0);" class="action-btn btn-delete bs-tooltip"
                                       data-toggle="tooltip" data-placement="top" title="Delete">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-trash-2">
                                            <polyline points="3 6 5 6 21 6"></polyline>
                                            <path
                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-css')
    <link href="{{ asset('src/assets/css/light/scrollspyNav.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('src/assets/css/dark/scrollspyNav.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('page-js')
    <script src="{{ asset('src/assets/js/scrollspyNav.js') }}"></script>
    <script>
        checkall('custom_mixed_parent_all', 'custom_mixed_child');
    </script>
@endsection
