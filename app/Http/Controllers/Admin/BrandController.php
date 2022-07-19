<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Spatie\MediaLibrary\Models\Media;

class BrandController extends Controller
{
    public function __construct(Request $request) {
        $this->request = $request;
        $this->isApi = $this->request->segment(1) === 'api' ? true : false;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        if ($this->isApi) {
            foreach ($brands as $brand) {
                $brand->getMedia('brand_logo')[0]->getUrl();
            }
            return response()->json($brands);
        }
        return view('admin.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = Brand::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        if ($request->has('img')) {
            $file = $request->file('img');
            $result->addMedia($file)->toMediaCollection('brand_logo');
        }

        return redirect()->route('brand_index')->with('message', 'Бренд успешно создан!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::find($id);

        return view('admin.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $brand = Brand::find($request->id);
        $brand->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        if ($request->has('img')) {
            if (count($brand->getMedia('brand_logo')) > 0) {
                File::deletedirectory('storage/' . $brand->getMedia('brand_logo')->where('model_id', $brand->id)[0]['id'] . '/');
                $brand->getMedia('brand_logo')->where('model_id', $brand->id)[0]->delete();
            }
            $file = $request->file('img');
            $brand->addMedia($file)->toMediaCollection('brand_logo');
        }
        return redirect()->back()->with('message', 'Бренд успешно обновлен!');
    }

    public function changeActive(Request $request)
    {
        $brand = Brand::find($request->id);
        if ($brand->active) $brand->update(['active' => 0]);
        else $brand->update(['active' => 1]);
        return response()->json('success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $brand = Brand::find($id);
        if (count($brand->getMedia('brand_logo')) > 0) {
            File::deletedirectory('storage/' . $brand->getMedia('brand_logo')->where('model_id', $brand->id)[0]['id'] . '/');
            $brand->getMedia('brand_logo')->where('model_id', $brand->id)[0]->delete();
        }
        $brand->delete();
        return redirect()->route('brand_index')->with('message', 'Бренд удалён!');
    }
}
