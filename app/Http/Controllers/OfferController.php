<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Fabric;
use App\Models\Motor;
use App\Models\MotorDirection;
use App\Models\Offer;
use App\Models\RalCode;
use App\Models\Remote;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index(): View|Factory|Application
    {
        return view('pages.offers.index');
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

        return view('pages.offers.new-offer', compact('companies', 'selected', 'fabrics', 'motors', 'ralCodes', 'motorDirections'));
    }

    public function store(Request $request)
    {
        dd($request->all());
    }

    public function show(Offer $offer)
    {
        //
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
