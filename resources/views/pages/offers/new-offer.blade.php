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
    <li class="breadcrumb-item active" aria-current="page">{{ __('page-title.offer-create') }}</li>
@endsection

@section('page-content')
    @if($companies->count())
        <div id="tableCustomMixed" class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>@if($selected)
                                    {{ $companies->name }} Firmasına
                                @endif {{ __('page-title.offer-create') }}</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    @if($errors->any())
                        <div class="alert alert-light-danger alert-dismissible fade show border-0 mb-4" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-x close" data-bs-dismiss="alert">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </button>
                            @foreach($errors->all() as $error)
                                - {{ $error }}<br>
                            @endforeach
                        </div>
                    @endif
                    <form class="row g-3" action="{{ route('offers.store') }}" method="post">
                        @csrf
                        @if(!$selected)
                            <div class="col-md-12">
                                <label for="company_select2" class="form-label">Teklif Verilecek Firma</label>
                                <select id="company_select2" name="company_id">
                                    @foreach($companies as $company)
                                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @else
                            <input type="hidden" name="company_id" value="{{ $companies->id }}">
                        @endif

                        <input type="hidden" value="{{ session()->get('offerId') }}" name="offer_id">

                        <div class="col-md-3">
                            <label for="height" class="form-label">Yükseklik</label>
                            <div class="mb-4">
                                <input id="height" type="text" value="" name="height">
                            </div>

                        </div>

                        <div class="col-md-3">
                            <label for="width" class="form-label">Genişlik</label>
                            <div class="mb-4">
                                <input id="width" type="text" value="" name="width">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label for="fabric" class="form-label">Kumaş Markası Seçin</label>
                            <select class="form-select" id="fabric" name="fabric" required>
                                <option selected value="0">Kumaş Seçiniz</option>
                                @foreach($fabrics as $fabric)
                                    <option value="{{ $fabric->id }}">{{ $fabric->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="row fabric_types">
                        </div>

                        <div class="col-md-6">
                            <label for="motor_type" class="form-label">Motor Markası Seçin</label>
                            <select class="form-select" id="motor_type" name="motor_type" required>
                                <option selected value="0">Motor Seçiniz</option>
                                @foreach($motors as $motor)
                                    <option value="{{ $motor->id }}">{{ $motor->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="remote_type" class="form-label">Kumanda Tipi Seçin</label>
                            <select class="form-select" id="remote_type" name="remote_type" required>
                                <option selected value="0">Kumanda Seçiniz</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="motor_direction" class="form-label">Motor Yönü Seçin</label>
                            <select class="form-select" id="motor_direction" name="motor_direction"  required>
                                <option selected value="0">Motor Yönü Seçin</option>
                                @foreach($motorDirections as $motorDirection)
                                    <option value="{{ $motorDirection->id }}">{{ $motorDirection->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="ral_code" class="form-label">Ral Kodu Seçin</label>
                            <select class="form-select" id="ral_code" name="ral_code"  required>
                                <option selected value="0">Ral Kodu Seçin</option>
                                @foreach($ralCodes as $ralCode)
                                    <option value="{{ $ralCode->id }}">{{ $ralCode->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 mt-4">
                            <label class="form-check-label" for="customCheck1">Logo Baskısı Olacak mı?</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="is_logo" id="is_logo">
                                <label class="form-check-label" for="is_logo">Logo baskısı olacak</label>
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <label class="form-check-label" for="customCheck1">Tekrar Ürün Ekleyeceğim</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="is_user_revisit_form"
                                       id="is_user_revisit_form">
                                <label class="form-check-label" for="is_user_revisit_form">Tekrar ürün eklemek için
                                    seçiniz. Seçerseniz bu ürün kaydedilecek ve tekrar bu forma döneceksiniz.</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Kaydet</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-light-danger alert-dismissible fade show border-0 mb-4" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="feather feather-x close" data-bs-dismiss="alert">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
            Daha hiç firma oluşturulmadığı için teklif giremiyorsunuz. İlk önce <a
                href="{{ route('companies.create') }}">buraya tıklayarak</a> firma oluşturunuz.
        </div>
    @endif

@endsection

@section('page-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('src/assets/css/light/elements/alert.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('src/assets/css/dark/elements/alert.css') }}">

    <link href="{{ asset('src/assets/css/dark/scrollspyNav.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('src/assets/css/light/scrollspyNav.css') }}" rel="stylesheet" type="text/css"/>

    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/src/vanillaSelectBox/vanillaSelectBox.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('src/plugins/css/light/vanillaSelectBox/custom-vanillaSelectBox.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('src/plugins/css/dark/vanillaSelectBox/custom-vanillaSelectBox.css') }}">

    <link rel="stylesheet" type="text/css"
          href="{{ asset('src/plugins/src/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('src/plugins/css/light/bootstrap-touchspin/custom-jquery.bootstrap-touchspin.min.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('src/plugins/css/dark/bootstrap-touchspin/custom-jquery.bootstrap-touchspin.min.css') }}">

    <link href="{{ asset('src/assets/css/light/elements/color_library.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('src/assets/css/dark//elements/color_library.css') }}" rel="stylesheet" type="text/css"/>
    <style>
        .col {
            min-width: auto;
        }

        body.dark .dark-element {
            display: block;
        }

        .dark-element {
            display: none;
        }

        body.dark .light-element {
            display: none;
        }

        .light-element {
            display: block;
        }
    </style>
@endsection

@section('page-js')
    <script src="{{ asset('src/plugins/src/vanillaSelectBox/vanillaSelectBox.js') }}"></script>
    <script src="{{ asset('src/plugins/src/vanillaSelectBox/custom-vanillaSelectBox.js') }}"></script>

    <script src="{{ asset('src/plugins/src/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
    <script src="{{ asset('src/plugins/src/bootstrap-touchspin/custom-bootstrap-touchspin.js') }}"></script>
    <script src="{{ asset('src/assets/js/scrollspyNav.js') }}"></script>

    <script src="{{ asset('src/assets/js/widgets/modules-widgets.js') }}"></script>

    <script>
        $("#motor_type").change(function () {
            var motorId = $(this).val();

            $.ajax({
                url: '{{ route('motor-remotes') }}',
                type: 'get',
                data: {
                    motor_id: motorId
                },
                dataType: 'json',
                success: function (response) {
                    var len = response.length;

                    $("#remote_type").empty();
                    for (var i = 0; i < len; i++) {
                        var id = response[i]['remote']['id'];
                        var name = response[i]['remote']['name'];

                        $("#remote_type").append("<option value='" + id + "'>" + name + "</option>");

                    }
                }
            });
        });

        $("#fabric").change(function () {
            var fabricId = $(this).val();

            $.ajax({
                url: '{{ route('fabric-types') }}',
                type: 'get',
                data: {
                    fabric_id: fabricId
                },
                dataType: 'json',
                success: function (response) {
                    var len = response.length;

                    $(".fabric").empty();

                    for (var i = 0; i < len; i++) {
                        var id = response[i]['id'];
                        var path = response[i]['image_path'];
                        var name = response[i]['name'];
                        var direction = response[i]['direction'];


                        if(direction === 1) {
                            $(".fabric_types").append('<div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4 fabric-front">' +
                                '<input class="form-check-input" type="radio" name="fabric_type" value="' + id +'" id="' + id +'"> ' +
                                '<label class="form-check-label" for="' + id +'">' +
                                '<img class="card-img-top" src="' + '{{ asset('') }}' + path + '" alt="' + name +'" width="200" height="200">' +
                                '<h5 class="card-title mb-3">' + name +'</h5>' +
                                '</label>' +
                                '</div>');
                        }
                    }
                }
            });
        });
    </script>
@endsection
