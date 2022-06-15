<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Models\Company;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::query()->orderByDesc('created_at')->paginate(20);

        return view('pages.companies.index', compact('companies'));
    }

    public function create(): Application|Factory|View
    {
        return view('pages.companies.new-company');
    }

    public function store(StoreCompanyRequest $request)
    {
        $company = Company::create($request->validated());

        if ($company) {
            return redirect()->route('offers.create', ['company_id' => $company->id]);
        }

        return redirect()->back()->withErrors(['Bir hata oluştu!']);
    }

    public function show(Company $company)
    {
        //
    }

    public function edit(Company $company)
    {
        //
    }

    public function update(Request $request, Company $company)
    {
        //
    }

    public function destroy(Company $company)
    {
        //
    }
}
