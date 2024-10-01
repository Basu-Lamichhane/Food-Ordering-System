<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Section::all();
        return view('admin.sections.index', compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sections.create');
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
            'name' => 'required|unique:sections',
        ]);
        Section::create($data);
        return redirect()->route('admin.sections.index')->with('success', 'Section has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)

    {
        $products = Product::all();
        return view('admin.sections.show', compact('section', 'products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        return view('admin.sections.edit', compact('section'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Section $section)
    {
        $data = $request->validate([
            'name' => 'required|unique:sections',
        ]);
        $section->update($data);
        return redirect()->route('admin.sections.index')->with('success', 'Section has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
        $section->products()->detach();
        $section->delete();
        return redirect()
            ->route('admin.sections.index')
            ->with('success', "Section  has been deleted sucessfully!");
    }
    public function addproductSection(Request $request)
    {
        if (DB::table('product_section')->where('section_id', $request->section_id)->where('product_id', $request->product_id)->count() >= 1) {
            return redirect()->back()->with('error', 'The Same Product is already added on the section');
        }

        $data = $request->validate([
            'product_id' => ['required', 'exists:products,id'],
            'section_id' => ['required', 'exists:sections,id'],
        ]);

        DB::table('product_section')->insert($data);
        return redirect()->back()->with('success', 'Product Added to Section');
    }
    public function deleteproductSection(Request $request)
    {
        DB::table('product_section')->where('section_id', $request->section_id)->where('product_id', $request->product_id)->delete();
        return redirect()->back()->with('success', 'Product Deleted from Section');
    }
}
