<div class="container">
    <div id="ct">
        <div class="top">
            <div class="logo"><img src="{{ asset('img/pdf/logo.png') }}" alt=""></div>
            <div class="top-right">
                <table>
                    <tr>
                        <th>TARİH :</th>
                        <td>{{ \Carbon\Carbon::parse($offer->created_at)->format('d.m.Y') }}</td>
                    </tr>
                    <tr>
                        <th>PROJE NO :</th>
                        <td>{{ $offer->id }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="contact">
            <table>
                <tr>
                    <th>KONU</th>
                    <th>:</th>
                    <td>Zip Perde Fiyat Teklifi</td>
                </tr>
                <tr>
                    <th>Proje Adı</th>
                    <th>:</th>
                    <td>Zip Perde</td>
                </tr>
                <tr>
                    <th>Firma</th>
                    <th>:</th>
                    <td>Ye{{ $company->name }}</td>
                </tr>
                <tr>
                    <th>Firma</th>
                    <th>:</th>
                    <td>{{ $company->address }}</td>
                </tr>
                <tr>
                    <th>Yetkili Kişi</th>
                    <th>:</th>
                    <td>{{ $company->official }}</td>
                </tr>
                <tr>
                    <th>Telefon</th>
                    <th>:</th>
                    <td>{{ $company->phone_number }}</td>
                </tr>
                <tr>
                    <th>E-Mail</th>
                    <th>:</th>
                    <td><a href="mailto:{{ $company->email }}">{{ $company->email }}</a></td>
                </tr>
            </table>
        </div>

        <div class="offer">
            <p>Sayın yetkili, Uygulanması planlanan ürünlerimiz ile ilgili teklifimiz, ürün bilgileri ile birlikte
                aşağıda belirtilmiştir</p>
            <p>Teklifimizi uygun bulmanızı umar, iyi çalışmalar dileriz.</p>

            <table>
                <tr>
                    <th colspan="6">ÜRÜN TANIM VE ÖZELLİKLERİ</th>
                </tr>
                <tr>
                    <th class="no">NO</th>
                    <th>ÜRÜN ADI</th>
                    <th class="olcu">ÜRÜN <br>
                        ÖLÇÜLERİ
                    </th>
                    <th class="adet">ADET</th>
                    <th class="birimf">BİRİM <br>
                        FİYAT
                    </th>
                    <th class="toplam">TOPLAM</th>
                </tr>
                @php($i = 1)
                @foreach($offerProducts as $offerProduct)
                    <tr>
                        <th>{{ $i }}</th>
                        <td>TK 100 Zip System</td>
                        <td>{{ number_format($offerProduct->width * 10, 0, '.', '.') . 'x' . number_format($offerProduct->height * 10, 0, '.', '.') . ' mm' }}</td>
                        <td>1</td>
                        <td>{{ number_format($offerProduct->product_price, 2, ',', '.') . ' €' }}</td>
                        <td>{{ number_format($offerProduct->product_price, 2, ',', '.') . ' €' }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td rowspan="3" colspan="4">
                        @if(!$offerProduct->is_warranty_applicable)
                            <div class="col-sm-12 col-12 order-sm-0 order-1">
                                <p class="text-danger">***Ürünün teslim süresi taleplerinize bağlı olarak
                                    değişkenlik gösterebilir.</p>
                            </div>
                        @endif
                    </td>
                    <th>ARA TOPLAM:</th>
                    <th>{{ number_format($offer->total_price, 2, ',', '.') . ' €' }}</th>
                </tr>
                <tr>
                    <th>KDV</th>
                    <th>{{ number_format($offer->total_price * 18 / 100, 2, ',', '.') . ' €' }}</th>
                </tr>
                <tr>
                    <th>TOPLAM</th>
                    <th>{{ number_format($offer->total_price + ($offer->total_price * 18 / 100), 2, ',', '.') . ' €' }}</th>
                </tr>
            </table>
        </div>
        <div class="other-lists">
            <ul class="list1">
                <li>NOTLAR
                    <div class="notes">
                        <ul>
                            <li><span class="bold">Motor</span></li>
                            <li><span class="bold">Kumaş</span></li>
                            <li><span class="bold">Kumanda</span></li>
                        </ul>
                        <ul class="no-type">
                            <li>{{ $offerProduct->motor_name }} (5 Yıl Garantili)</li>
                            <li>{{ $offerProduct->fabric_name . ' - ' . $offerProduct->fabric_type }}</li>
                            <li>{{ (3 == $offerProduct->motor_type && 0 == $offerProduct->remote_price) ? 'Ücretsiz Kumanda ' : '' }}{{ $offerProduct->remote_name  }}</li>
                        </ul>
                    </div>
                </li>
                <li>AÇIKLAMALAR
                    <ul>
                        <li>Teslim süresi 7 iş günüdür</li>
                        <li>Teklifimizin geçerlilik süresi, düzenlendiği tarih itibariyle 3 gündür.</li>
                    </ul>
                </li>
                <li>ÖDEME ŞEKLİ
                    <ul>
                        <li style="list-style-type: none; margin-left: 0px;">Sipariş ile birlikte ödeme peşindir</li>
                    </ul>
                </li>
                <li>BANKA HESAP BİLGİLERİ
                    <div class="bank-account-list">
                        <ul class="bank-account-list-1">
                            <li><span class="bold">Banka Bilgisi:</span> Ziraat Bankası - Belediye/Adana Şubesi</li>
                            <li><span class="bold">Türk Lirası (₺) IBAN#:</span> TR 6000 0100 1783 8538 8841 5008</li>
                            <li><span class="bold">Dolar ($) IBAN#:</span> TR 3300 0100 1783 8538 8841 5009</li>
                            <li><span class="bold">Euro (€) IBAN#:</span> TR 0600 0100 1783 8538 8841 5010</li>
                        </ul>
                        <ul class="bank-account-list-2">
                            <li><span class="bold">Türk Lirası (₺) Hesap No :</span> 415008</li>
                            <li><span class="bold">Dollar ($) Account Number :</span> 415009</li>
                            <li><span class="bold">Euro (€) Account Number :</span> 415010</li>
                        </ul>
                        <ul class="bank-account-list-3">
                            <li><span class="bold">Swift kodu:</span> TCZBTR2A</li>
                            <li><span class="bold">Swift kodu:</span> TCZBTR2A</li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>

        <div class="line"></div>

        <div class="info">

            <div class="info-left">
                <img src="{{ asset('img/pdf/logo.png') }}" alt="">
            </div>
            <div class="info-mid">
                <p><span class="bold">Üşenmez Proje İthalat İhracat Anonim Şirketi</span></p>
                <p><span class="bold">Merkez : </span> Efer 3 San. Sit D Blok Yeşiloba Mah. 46301 Sokak No: 4/H Seyhan
                    Adana
                </p>
                <p><span class="bold">Şube : </span> İMÇ 1. Blok No: 1404 Unkapanı İstanbul</p>
                <p><span class="bold">Fabrika : </span> Veliköy Organize Sanayi Bölgesi Sanayi Bulvarı No:21/1 Veliköy
                    Çerkezköy Tekirdağ</p>
                <p><span class="bold">Fabrika2 : </span> Çıplaklı mah. 2163 sok. No:18 Döşemealtı / Antalya</p>
                <p><span class="bold">Gsm : </span> +90 <span class="bold">(532) 660 75 23 / Tel : </span> +90 <span
                        class="bold">(242) 606 12 92</span></p>
                <p><span class="bold">info@usenmezproje.com / www.usenmezproje.com</span></p>
            </div>
            <div class="info-right">
                <img src="{{ asset('img/pdf/logo.png') }}" alt="">
            </div>


        </div>
    </div>
</div>
