<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VehicleController extends Controller {

    /**
     * @return Response
     */
    public function index() {
        return view('vehicles.index', ['vehicles' => Vehicle::all()]);
    }

    /**
     * @return Response
     */
    public function create() {
        $companies = Company::all();
        return view('vehicles.create', compact('companies'));
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function store(Request $request) {
        if (!$request->has('air_condition'))
            $request->merge(['air_condition' => 0]);

        $request->validate([
            'model_name' => 'required',
            'color' => 'required',
            'capacity' => 'required',
            'company_id' => 'required'
        ]);

        Vehicle::create($request->all());

        return redirect()
            ->route('vehicles.index')
            ->with('success', __('The :resource was created!', ['resource' => __('Vehicle')]));
    }

    /**
     * @param Vehicle $vehicle
     * @return Response
     */
    public function show(Vehicle $vehicle) {
        return view('vehicles.show', compact('vehicle'));
    }

    /**
     * @param Vehicle $vehicle
     * @return Response
     */
    public function edit(Vehicle $vehicle) {
        $companies = Company::all();
        return view('vehicles.edit', compact('vehicle', 'companies'));
    }

    /**
     * @param Request $request
     * @param Vehicle $vehicle
     * @return Response
     */
    public function update(Request $request, Vehicle $vehicle) {
        if (!$request->has('air_condition'))
            $request->merge(['air_condition' => 0]);

        $request->validate([
            'model_name' => 'required',
            'company_id' => 'required'
        ]);

        $vehicle->update($request->all());

        return redirect()
            ->route('vehicles.index')
            ->with('success', __('The :resource was updated!', ['resource' => __('Vehicle')]));
    }

    /**
     * @param Vehicle $vehicle
     * @return Response
     */
    public function destroy(Vehicle $vehicle) {
        $vehicle->delete();

        return redirect()
            ->route('vehicles.index')
            ->with('success', __('The :resource was deleted!', ['resource' => __('Vehicle')]));
    }
}
