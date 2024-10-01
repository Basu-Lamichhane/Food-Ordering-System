<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Region;
use App\Models\RegionUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regions = Region::all();
        return view('admin.regions.index', compact('regions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.regions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:regions',
        ]);
        Region::create($data);
        return redirect()->route('admin.regions.index')->with('success', 'Region has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function show(Region $region)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function edit(Region $region)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Region $region)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function destroy(Region $region)
    {
        $region->delete();

        return redirect()
            ->route('admin.regions.index')
            ->with('success', "Region: $region->name  has been deleted sucessfully!");
    }
    public function listdelivery()
    {
        $deliverys = User::where('role', '3')->get();
        return view('admin.regions.listdelivery')->with('deliverys', $deliverys);
    }
    public function deliveryregion()
    {
        $regions = Region::all();
        $deliverys = User::where('role', '3')->get();
        return view('admin.regions.deliveryregion')->with('deliverys', $deliverys)->with('regions', $regions);
    }
    public function assignRegion(Request $request)
    {
        $id = $request->user_id;
        $delivery = User::find($id);
        if ($delivery->role != 3) {
            abort(403);
        }
        $check_exists = RegionUser::where('user_id', $id)->first();
        if ($check_exists) {
            $updateregion = RegionUser::findorfail($check_exists->id);
            $updateregion->region_id = $request->region_id;
            $updateregion->update();
            return redirect()->back()->with('success', 'Location Updated Successfully');
        } else {
            $regionuser = new RegionUser;
            $regionuser->user_id = $id;
            $regionuser->region_id = $request->region_id;
            $regionuser->save();
            return redirect()->back()->with('success', 'Region Set Successfully');
        }
    }
}
