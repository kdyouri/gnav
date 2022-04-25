<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Shuttle;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CompanyShuttleController extends Controller {

    /**
     * @return Response
     */
    public function index() {
        $shuttles = Shuttle::all()
            ->where('Vehicle.company_id', Auth::user()->company->id);
        return view('company_shuttles.index', compact('shuttles'));
    }

    /**
     * @return Response
     */
    public function create() {
        $vehicles = Vehicle::all()
            ->where('company_id', Auth::user()->company->id);
        $cities = City::all()->sortBy('name');
        return view('company_shuttles.create', compact('vehicles', 'cities'));
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function store(Request $request) {
        $request->validate(Shuttle::$validationRules);

        Shuttle::create($request->all());

        return redirect()
            ->route('company_shuttles.index')
            ->with('success', __('The :resource was created!', ['resource' => __('Shuttle')]));
    }

    /**
     * @param int $id
     * @return Response
     */
    public function show($id = null) {
        $shuttle = Shuttle::findOrFail($id);
        return view('company_shuttles.show', compact('shuttle'));
    }

    /**
     * @param int $id
     * @return Response
     */
    public function edit($id = null) {
        $shuttle = Shuttle::findOrFail($id);

        $vehicles = Vehicle::all()
            ->where('company_id', Auth::user()->company->id);
        $cities = City::all()->sortBy('name');

        return view('company_shuttles.edit', compact('shuttle', 'vehicles', 'cities'));
    }

    /**
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id) {
        $request->validate(Shuttle::$validationRules);

        $shuttle = Shuttle::findOrFail($id);
        $shuttle->update($request->all());

        return redirect()
            ->route('company_shuttles.index')
            ->with('success', __('The :resource was updated!', ['resource' => __('Shuttle')]));
    }

    /**
     * @param int $id
     * @return Response
     */
    public function destroy($id) {
        if (Shuttle::destroy($id)) {
            $message = 'The :resource was deleted!';
        } else {
            $message = 'The :resource could not be deleted!';
        }
        return redirect()
            ->route('company_shuttles.index')
            ->with('success', __($message, ['resource' => __('Shuttle')]));
    }
}
