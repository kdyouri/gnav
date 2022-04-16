<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CompanyController extends Controller {

    /**
     * @return Response
     */
    public function index() {
        return view('companies.index', ['companies' => Company::all()]);
    }

    /**
     * @return Response
     */
    public function create() {
        return view('companies.create');
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function store(Request $request) {
        $request->validate([
            'name' => 'required'
        ]);

        Company::create($request->all());

        return redirect()
            ->route('companies.index')
            ->with('success', __('The :resource was created!', ['resource' => __('Company')]));
    }

    /**
     * @param Company $company
     * @return Response
     */
    public function show(Company $company) {
        return view('companies.show', compact('company'));
    }

    /**
     * @param Company $company
     * @return Response
     */
    public function edit(Company $company) {
        return view('companies.edit', compact('company'));
    }

    /**
     * @param Request $request
     * @param Company $company
     * @return Response
     */
    public function update(Request $request, Company $company) {
        $request->validate([
            'name' => 'required'
        ]);

        $company->update($request->all());

        return redirect()
            ->route('companies.index')
            ->with('success', __('The :resource was updated!', ['resource' => __('Company')]));
    }

    /**
     * @param Company $company
     * @return Response
     */
    public function destroy(Company $company) {
        $company->delete();

        return redirect()
            ->route('companies.index')
            ->with('success', __('The :resource was deleted!', ['resource' => __('Company')]));
    }
}
