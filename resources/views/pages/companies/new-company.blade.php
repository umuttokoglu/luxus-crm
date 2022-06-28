@extends('layout.admin')

@section('page-title')
    {{ __('page-title.company-create') }}
@endsection

@section('page-breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">{{ __('sidebar.dashboard') }}</a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">{{ __('page-title.company-create') }}</li>
@endsection

@section('page-content')
    <div id="tableCustomMixed" class="col-lg-12 col-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>{{ __('page-title.company-create') }}</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                @if($errors->any())
                    <div class="alert alert-light-danger alert-dismissible fade show border-0 mb-4" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-bs-dismiss="alert"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                        </button>
                        @foreach($errors->all() as $error)
                            - {{ $error }}<br>
                        @endforeach
                    </div>
                @endif
                <form class="row g-3" action="{{ route('companies.store') }}" method="post">
                    @csrf
                    <div class="col-md-12">
                        <label for="name" class="form-label">{{ __('pages/company-create.form.labels.name') }}</label>
                        <input type="text" class="form-control" id="name" name="name" required value="{{ old('name') }}">
                    </div>
                    <div class="col-md-12">
                        <label for="official" class="form-label">{{ __('pages/company-create.form.labels.official') }}</label>
                        <input type="text" class="form-control" id="official" name="official" required value="{{ old('official') }}">
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">{{ __('pages/company-create.form.labels.email') }}</label>
                        <input type="email" class="form-control" id="email" name="email" required value="{{ old('email') }}">
                    </div>
                    <div class="col-md-6">
                        <label for="phone_number" class="form-label">{{ __('pages/company-create.form.labels.phone-number') }}</label>
                        <input type="tel" class="form-control" id="phone_number" name="phone_number" required value="{{ old('phone_number') }}">
                    </div>
                    <div class="col-md-6">
                        <label for="tax_no" class="form-label">{{ __('pages/company-create.form.labels.tax-no') }}</label>
                        <input type="text" class="form-control" id="tax_no" name="tax_no" required value="{{ old('tax_no') }}">
                    </div>
                    <div class="col-md-6">
                        <label for="tax_administration" class="form-label">{{ __('pages/company-create.form.labels.tax-administration') }}</label>
                        <input type="text" class="form-control" id="tax_administration" name="tax_administration" required value="{{ old('tax_administration') }}">
                    </div>
                    <div class="col-12">
                        <label for="address" class="form-label">{{ __('pages/company-create.form.labels.address') }}</label>
                        <textarea type="text" class="form-control" id="address" name="address" required rows="5">{{ old('address') }}</textarea>
                    </div>
                    <div class="col-12">
                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">{{ __('pages/company-create.form.labels.billing-type.label') }}</legend>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="billing_type" id="billing_type_e_archive" value="1" checked>
                                    <label class="form-check-label" for="billing_type_e_archive">
                                        {{ __('pages/company-create.form.labels.billing-type.e-archive') }}
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="billing_type" id="billing_type_e_bill" value="2">
                                    <label class="form-check-label" for="billing_type_e_bill">
                                        {{ __('pages/company-create.form.labels.billing-type.e-bill') }}
                                    </label>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">{{ __('pages/company-create.form.buttons.save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('page-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('src/assets/css/light/elements/alert.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('src/assets/css/dark/elements/alert.css') }}">
@endsection
