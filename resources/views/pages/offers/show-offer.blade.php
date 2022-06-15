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
    <li class="breadcrumb-item active" aria-current="page">{{ 'Teklif Görüntüle' }}</li>
@endsection

@section('page-content')
    <div class="middle-content container-xxl p-0">

        <div class="row invoice layout-top-spacing layout-spacing">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                <div class="doc-container">

                    <div class="row">

                        <div class="col-xl-9">

                            <div class="invoice-container">
                                <div class="invoice-inbox">

                                    <div id="ct" class="">

                                        <div class="invoice-00001">
                                            <div class="content-section">

                                                <div class="inv--head-section inv--detail-section">

                                                    <div class="row">

                                                        <div class="col-sm-6 col-12 mr-auto">
                                                            <div class="d-flex">
                                                                <img class="company-logo" width="500"
                                                                     src="{{ asset('img/pdf/image1.png') }}"
                                                                     alt="company">
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6 text-sm-end">
                                                            <p class="inv-list-number"><span class="inv-title">Teklif No : </span>
                                                                <span class="inv-number">#{{ $offer->id }}</span></p>
                                                            <p class="inv-created-date"><span
                                                                    class="inv-title">Tarih : </span> <span
                                                                    class="inv-date">{{ \Carbon\Carbon::parse($offer->created_at)->format('d/m/Y') }}</span>
                                                            </p>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="inv--detail-section inv--customer-detail-section">

                                                    <div class="row">
                                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                            <p class="inv-email-address">Konu: Zip Perde Fiyat
                                                                Teklifi</p>
                                                            <p class="inv-email-address">Proje Adı: Zip Perde</p>
                                                            <p class="inv-email-address">Firma: {{ $company->name }}</p>
                                                            <p class="inv-email-address">
                                                                Adres: {{ $company->address }}</p>
                                                            <p class="inv-street-addr">Yetkili
                                                                Kişi: {{ $company->official }}</p>
                                                            <p class="inv-email-address">
                                                                Telefon: {{ $company->phone_number }}</p>
                                                            <p class="inv-email-address">
                                                                E-Mail: {{ $company->email }}</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="inv--detail-section inv--customer-detail-section">
                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                        <p class="inv-email-address">Sayın Yetkili, Uygulanması planlanan ürünlerimiz ile
                                                            ilgili teklifimiz, ürün bilgileri ile birlikte aşağıda
                                                            belirtilmiştir. Teklifimizi uygun bulmanızı umar, iyi
                                                            çalışmalar dileriz.</p>
                                                    </div>
                                                </div>
                                                <div class="inv--product-table-section">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead class="">
                                                            <tr>
                                                                <th scope="col">S.No</th>
                                                                <th scope="col">Ürünler</th>
                                                                <th scope="col">Ürün Ölçüleri</th>
                                                                <th class="text-end" scope="col">Adet</th>
                                                                <th class="text-end" scope="col">Fiyat</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @php($i = 1)
                                                            @foreach($offerProducts as $offerProduct)
                                                                <tr>
                                                                    <td>{{ $i }}</td>
                                                                    <td>
                                                                        {{ $offerProduct->fabric_name
                                                                         . ' (' . number_format($offerProduct->width * 10, 0, '.', '.')
                                                                         . 'mm x ' . number_format($offerProduct->height * 10, 0, '.', '.')
                                                                         . 'mm)'
                                                                        }}
                                                                    </td>
                                                                    <td>{{ ' (' . number_format($offerProduct->width * 10, 0, '.', '.')
                                                                         . 'mm x ' . number_format($offerProduct->height * 10, 0, '.', '.')
                                                                         . 'mm)' }}</td>
                                                                    <td class="text-end">1</td>
                                                                    <td class="text-end">{{ number_format($offerProduct->product_price, 2, ',', '.') . ' €' }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="4">
                                                                        <table class="table">
                                                                            <tr>
                                                                                <th class="text-start">Kumaş Tipi</th>
                                                                                <td>{{ $offerProduct->fabric_type }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th class="text-start">Motor</th>
                                                                                <td>{{ $offerProduct->motor_name . ' (' . $offerProduct->motor_quantity . ' Adet)'}}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th class="text-start">Motor Yönü</th>
                                                                                <td>{{ $offerProduct->motor_direction }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th class="text-start">Kumanda</th>
                                                                                <td>{{ (3 == $offerProduct->motor_type && 0 == $offerProduct->remote_price) ? 'Ücretsiz Kumanda ' : '' }}{{ $offerProduct->remote_name . ' (' . $offerProduct->remote_price . ' €)' }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th class="text-start">Logo Baskı</th>
                                                                                <td>{{ (1 == $offerProduct->is_logo) ? 'Logo Baskı Yapılacak (40 €) ' : 'Logo Baskı Yok' }}</td>
                                                                            </tr>
                                                                            @if(0 != $offerProduct->ral_code)
                                                                                <tr>
                                                                                    <th class="text-start">Boya Farkı</th>
                                                                                    <td>Ek Boyama talep edildi.
                                                                                        ({{ number_format($offerProduct->product_price * 5 / 100, 2, ',', '.') . ' €' }}
                                                                                        )
                                                                                    </td>
                                                                                </tr>
                                                                            @endif
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                @php($i += 1)
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                                <div class="inv--total-amounts">

                                                    <div class="row mt-4">
                                                        <div class="col-sm-5 col-12 order-sm-0 order-1">
                                                        </div>
                                                        <div class="col-sm-7 col-12 order-sm-1 order-0">
                                                            <div class="text-sm-end">
                                                                <div class="row">
                                                                    <div class="col-sm-8 col-7">
                                                                        <p class="">Ara Toplam :</p>
                                                                    </div>
                                                                    <div class="col-sm-4 col-5">
                                                                        <p class="">{{ number_format($offer->total_price, 2, ',', '.') . ' €' }}</p>
                                                                    </div>
                                                                    <div class="col-sm-8 col-7">
                                                                        <p class="">KDV (%18) :</p>
                                                                    </div>
                                                                    <div class="col-sm-4 col-5">
                                                                        <p class="">{{ number_format($offer->total_price * 18 / 100, 2, ',', '.') . ' €' }}</p>
                                                                    </div>
                                                                    <div class="col-sm-8 col-7 grand-total-title mt-3">
                                                                        <h4 class="">Toplam : </h4>
                                                                    </div>
                                                                    <div class="col-sm-4 col-5 grand-total-amount mt-3">
                                                                        <h4 class="">{{ number_format($offer->total_price + ($offer->total_price * 18 / 100), 2, ',', '.') . ' €' }}</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                @if(!$offerProduct->is_warranty_applicable)
                                                    <div class="inv--note">

                                                        <div class="row mt-4">
                                                            <div class="col-sm-12 col-12 order-sm-0 order-1">
                                                                <p>Not: Ürünün teslim süresi taleplerinize bağlı olarak
                                                                    değişkenlik gösterebilir.</p>
                                                            </div>
                                                        </div>

                                                    </div>
                                                @endif

                                                <div class="inv--note">
                                                    - AÇIKLAMALAR
                                                    <div class="row mt-4">
                                                        <div class="col-sm-12 col-12 order-sm-0 order-1">
                                                            <p> *	Nakliye Üşenmez Proje'ye  aittir.</p>
                                                            <p> *	Montaj Üşenmez Proje'ye aittir.</p>
                                                            <p> *	Teslim süresi 8 haftadır. Sipariş içeriğine göre değişiklik gösterebilir.</p>
                                                            <p> *	Teklifimizin geçerlilik süresi, düzenlendiği tarih itibariyle 3 gündür.</p>
                                                            <p> *	Fiyatımıza KDV dahildir.</p>
                                                            <p> *	Montaj sırasında gerekli görülürse vinç temini müşteriye aittir..		</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="inv--note">
                                                    - ÖDEME ŞEKLİ
                                                    <div class="row mt-4">
                                                        <div class="col-sm-12 col-12 order-sm-0 order-1">
                                                            <p>* Sipariş ile birlikte ödeme peşindir.</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="inv--note">
                                                    - BANKA HESAP BİLGİLERİ
                                                    <div class="row mt-4">
                                                        <div class="col-sm-12 col-12 order-sm-0 order-1">
                                                            <p> *	Banka Bilgisi :  Ziraat Bankası – Belediye/Adana Şubesi</p>
                                                            <p> *	Türk Lirası (₺) IBAN# : TR 6000 0100 1783 8538 8841 5008      Türk Lirası (₺) Hesap No : 415008</p>
                                                            <p> *	Dolar($) IBAN# : TR 3300 0100 1783 8538 8841 5009                Dollar($) Account Number : 415009     Swift kodu:  TCZBTR2A</p>
                                                            <p> *	Euro(€) IBAN# :  TR 0600 0100 1783 8538 8841 5010                 Euro(€) Account Number : 415010        Swift kodu:  TCZBTR2A</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="inv--note text-center">
                                                    <div class="row mt-4">
                                                        <div class="col-sm-12 col-12 order-sm-0 order-1">
                                                            <div class="d-flex">
                                                                <img class="company-logo" width="150"
                                                                     src="{{ asset('img/pdf/image2.jpeg') }}"
                                                                     alt="company">
                                                                <div class="text-center m-4">
                                                                    <p>Üşenmez Proje İthalat İhracat Anonim Şirketi</p>
                                                                    <p>Merkez : Efer 3 San. Sit. D Blok Yeşiloba Mah. 46301 Sokak No: 4/H Seyhan Adana</p>
                                                                    <p>Şube : İMÇ 1. Blok No: 1404 Unkapanı İstanbul</p>
                                                                    <p>Fabrika : Veliköy Organize Sanayi Bölgesi Sanayi Bulvarı No:21/1 Veliköy Çerkezköy Tekirdağ</p>
                                                                    <p>Gsm : +90 (532) 201 49 39  /  Tel : +90 (322) 457 3 457</p>
                                                                    <p>info@usenmezproje.com / www.usenmezproje.com</p>
                                                                </div>

                                                                <img class="company-logo" width="150"
                                                                     src="{{ asset('img/pdf/image3.jpeg') }}"
                                                                     alt="company">
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

                        <div class="col-xl-3">

                            <div class="invoice-actions-btn">

                                <div class="invoice-action-btn">

                                    <div class="row">
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
    <link href="{{ asset('src/assets/css/dark/apps/invoice-preview.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('page-js')
    <script src="{{ asset('src/assets/js/apps/invoice-preview.js') }}"></script>
@endsection
