<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\MediaService;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('admin.sliders.create', compact('products'));
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'image' => ['required', 'image'],
            'url' => 'nullable',
            'active' => ['required', 'boolean'],
        ]);

        $data["media_id"] = MediaService::upload($request->file('image'));
        unset($data["image"]);
        Slider::create($data);
        return redirect()->route('admin.sliders.index')->with('success', 'Slider Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'image' => ['nullable', 'image'],
            'url' => 'nullable',
            'active' => ['required', 'boolean'],
        ]);
        if ($request->hasFile('image')) {
            $data["media_id"] = MediaService::upload($request->file('image'));
        } else {
            unset($data["image"]);
        }
        $slider->update($data);
        return redirect()->route('admin.sliders.index')->with('success', 'Slider Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();
        return redirect()
            ->route('admin.sliders.index')
            ->with('success', 'Slider is deleted successfully.');
    }
    public function toggleSliderView()
    {
        $sliders = Slider::all();
        return view('admin.sliders.toggle', compact('sliders'));
    }
    public function toggleSliderUpdate(Slider $slider)
    {
        $slider->active = !$slider->active;
        $slider->update();
        return redirect()
            ->route('admin.toggleSliderView')
            ->with('success', $slider->active ? 'Slider Enabled' : 'Slider Disabled');
    }
}
