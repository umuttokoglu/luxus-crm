<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Fabric;
use App\Models\Motor;
use App\Models\MotorDirection;
use App\Models\Offer;
use App\Models\OfferProduct;
use App\Models\ProductPrice;
use App\Models\RalCode;
use App\Models\Remote;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index(): View|Factory|Application
    {
        $offers = Offer::query()
            ->select('companies.name', 'offers.total_price', 'offers.id', 'offers.created_at')
            ->join('companies', 'offers.company_id', '=', 'companies.id')
            ->withCount('offer_product')
            ->paginate(20);

        return view('pages.offers.index', compact('offers'));
    }

    public function create(Request $request): Factory|View|Application
    {
        if ($request->has('company_id')) {
            $selected = true;
            $companies = Company::find($request->get('company_id'));
        } else {
            $selected = false;
            $companies = Company::all('id', 'name');
        }

        $fabrics = Fabric::all();
        $motors = Motor::all();
        $ralCodes = RalCode::all();
        $motorDirections = MotorDirection::all();
        $offerId = 0;

        return view('pages.offers.new-offer', compact('companies', 'selected', 'fabrics', 'motors', 'ralCodes', 'motorDirections', 'offerId'));
    }

    public function store(Request $request): string|RedirectResponse
    {
        if (0 == $request->get('offer_id')) {
            $offer = Offer::create($request->only('company_id'));

            if (!$offer) {
                return redirect()->back()->withErrors(['Teklif Oluşturulamadı!']);
            }

            $offerId = $offer->id;
        } else {
            $offerId = (int) $request->get('offer_id');
        }

        if (0 == $request->get('fabric')) {
            return redirect()->back()->withErrors(['Lütfen kumaş seçimi yapınız!'])->with(['offerId' => $offerId])->withInput();
        }
        if (0 == $request->get('fabric_type')) {
            return redirect()->back()->withErrors(['Lütfen kumaş seçimi sonrasında çıkan kumaş tiplerinden seçiminizi yapınız!'])->with(['offerId' => $offerId])->withInput();
        }
        if (0 == $request->get('motor_type')) {
            return redirect()->back()->withErrors(['Lütfen motor seçimi yapınız!'])->with(['offerId' => $offerId])->withInput();
        }
        if (0 == $request->get('remote_type')) {
            return redirect()->back()->withErrors(['Lütfen kumanda seçimi yapınız!'])->with(['offerId' => $offerId])->withInput();
        }
        if (0 == $request->get('motor_direction')) {
            return redirect()->back()->withErrors(['Lütfen motor yönü seçimi yapınız!'])->with(['offerId' => $offerId])->withInput();
        }

        $productPrice = ProductPrice::query()
            ->where('fabric_id', $request->get('fabric'))
            ->where('width', '>=', $request->get('width'))
            ->where('height', '>=', $request->get('height'))
            ->first();

        if (null === $productPrice) {
            $fabricPrice = 1434;
        } else {
            $fabricPrice = $productPrice->price;
        }

        $remotePrice = Remote::query()->find($request->get('remote_type'));

        $logoPrice = 0;
        if (1 == $request->get('is_logo')) {
            $logoPrice = 40;
        }
        $ralPrice = 0;
        /*if (0 != $request->get('ral_code')) {
            $ralPrice = $productPrice->price * 5 / 100;
        }*/

        $offerPrice = OfferProduct::query()
            ->where('offer_id', $offerId)
            ->sum('product_price');
        $totalProductPrice = $fabricPrice + $remotePrice->price + $logoPrice + $ralPrice;
        $offerProducts = OfferProduct::query()
            ->create(array_merge($request->except(['_token']), [
                    'offer_id' => $offerId,
                    'product_price' => $totalProductPrice,
                    'is_warranty_applicable' => $productPrice->is_warranty
                ]));

        if (!$offerProducts) {
            return redirect()->back()->withErrors(['Teklif Oluşturulamadı!'])->with(['offerId' => $offerId])->withInput();
        }

        Offer::query()
            ->where('id', $offerId)
            ->update([
                'total_price' => $offerPrice + $totalProductPrice
            ]);

        if (1 == $request->get('is_user_revisit_form')) {
            return redirect()->back()->with(['offerId' => $offerId]);
        }

        return redirect()->route('offers.index');
    }

    public function show(Offer $offer)
    {
        $offerProducts = OfferProduct::query()
            ->select([
                'offer_products.width',
                'offer_products.height',
                'offer_products.product_price',
                'offer_products.motor_type',
                'offer_products.ral_code',
                'offer_products.is_warranty_applicable',
                'offer_products.is_logo',
                'fabric_types.name as fabric_type',
                'fabrics.name as fabric_name',
                'motors.name as motor_name',
                'motor_directions.name as motor_direction',
                'remotes.name as remote_name',
                'remotes.price as remote_price'
            ])
            ->join('fabric_types', 'offer_products.fabric_type', '=', 'fabric_types.id')
            ->join('fabrics', 'fabrics.id', '=', 'fabric_types.fabric_id')
            ->join('motors', 'motors.id', '=', 'offer_products.motor_type')
            ->join('motor_directions', 'motor_directions.id', '=', 'offer_products.motor_direction')
            ->join('remotes', 'remotes.id', '=', 'offer_products.remote_type')
            ->join('offers', 'offers.id', '=', 'offer_products.offer_id')
            ->where('offer_id', $offer->id)
            ->orderByDesc('offer_products.created_at')
            ->get();

        $company = Company::find($offer->company_id);

        return view('pages.offers.show-offer', compact('offer', 'offerProducts', 'company'));
    }

    public function edit(Offer $offer)
    {
        //
    }

    public function update(Request $request, Offer $offer)
    {
        //
    }

    public function destroy(Offer $offer)
    {
        //
    }
}
