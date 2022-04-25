<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CompanyVehicleController extends Controller {

    /**
     * @return Response
     */
    public function index() {
        return view('company_vehicles.index', [
            'vehicles' => Vehicle::all()
                ->where('company_id', Auth::user()->company->id)
        ]);
    }

    /**
     * @return Response
     */
    public function create() {
        return view('company_vehicles.create');
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
            'capacity' => 'required'
        ]);

        $data = $request->all();
        $data['company_id'] = Auth::user()->company->id;
        Vehicle::create($data);

        return redirect()
            ->route('company_vehicles.index')
            ->with('success', __('The :resource was created!', ['resource' => __('Vehicle')]));
    }

    /**
     * @param int $id
     * @return Response
     */
    public function show($id = null) {
        $vehicle = Vehicle::findOrFail($id);
        return view('company_vehicles.show', compact('vehicle'));
    }

    /**
     * @param int $id
     * @return Response
     */
    public function edit($id = null) {
        $vehicle = Vehicle::findOrFail($id);
        return view('company_vehicles.edit', compact('vehicle'));
    }

    /**
     * @param Request $request
     * @param Vehicle $vehicle
     * @return Response
     */
    public function update(Request $request, $id) {
        if (!$request->has('air_condition'))
            $request->merge(['air_condition' => 0]);

        $request->validate([
            'model_name' => 'required',
            'color' => 'required',
            'capacity' => 'required'
        ]);

        $vehicle = Vehicle::findOrFail($id);
        $vehicle->update($request->all());

        return redirect()
            ->route('company_vehicles.index')
            ->with('success', __('The :resource was updated!', ['resource' => __('Vehicle')]));
    }

    /**
     * @param int $id
     * @return Response
     */
    public function destroy($id) {
        if (Vehicle::destroy($id)) {
            $message = 'The :resource was deleted!';
        } else {
            $message = 'The :resource could not be deleted!';
        }
        return redirect()
            ->route('company_vehicles.index')
            ->with('success', __($message, ['resource' => __('Vehicle')]));
    }
}
