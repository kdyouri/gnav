<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CityController extends Controller {

    /**
     * @return Response
     */
    public function index() {
        return view('cities.index', ['cities' => City::all()]);
    }

    /**
     * @return Response
     */
    public function create() {
        return view('cities.create');
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function store(Request $request) {
        $request->validate([
            'name' => 'required'
        ]);

        City::create($request->all());

        return redirect()
            ->route('cities.index')
            ->with('success', __('The :resource was created!', ['resource' => __('City')]));
    }

    /**
     * @param City $city
     * @return Response
     */
    public function show(City $city) {
        return view('cities.show', compact('city'));
    }

    /**
     * @param City $city
     * @return Response
     */
    public function edit(City $city) {
        return view('cities.edit', compact('city'));
    }

    /**
     * @param Request $request
     * @param City $city
     * @return Response
     */
    public function update(Request $request, City $city) {
        $request->validate([
            'name' => 'required'
        ]);

        $city->update($request->all());

        return redirect()
            ->route('cities.index')
            ->with('success', __('The :resource was updated!', ['resource' => __('City')]));
    }

    /**
     * @param City $city
     * @return Response
     */
    public function destroy(City $city) {
        $city->delete();

        return redirect()
            ->route('cities.index')
            ->with('success', __('The :resource was deleted!', ['resource' => __('City')]));
    }
}
