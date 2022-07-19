<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Spatie\MediaLibrary\Models\Media;

class AboutCompanyController extends Controller
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
        $post = AboutCompany::first();
        if ($this->isApi) {
            $post->getMedia('about_company_image')[0]->getUrl();
            return response()->json($post);
        }

        return view('admin.about_company.create', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = AboutCompany::create([
            'description' => $request->description,
        ]);

        if (count($request->file()) > 0) {
            $file = $request->file('img-vid');
            $result->addMedia($file)->toMediaCollection('about_company');
        }
        return redirect()->route('home_admin')->with('message', 'Изменено!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\AboutCompany $aboutCompany
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = AboutCompany::find($id);
        $post->update([
            'description' => $request->description,
        ]);

        if ($request->has('img')) {
            if (count($post->getMedia('about_company_image')) > 0) {
                File::deletedirectory('storage/' . $post->getMedia('about_company_image')->where('model_id', $post->id)[0]['id'] . '/');
                $post->getMedia('about_company_image')->where('model_id', $post->id)[0]->delete();
            }
            $file = $request->file('img');
            $post->addMedia($file)->toMediaCollection('about_company_image');
        }
        if ($request->has('video')) {
            if (count($post->getMedia('about_company_video')) > 0) {
                File::deletedirectory('storage/' . $post->getMedia('about_company_video')->where('model_id', $post->id)[0]['id'] . '/');
                $post->getMedia('about_company_video')->where('model_id', $post->id)[0]->delete();
            }
            $file = $request->file('video');
            $post->addMedia($file)->toMediaCollection('about_company_video');
        }

        return redirect()->route('home_admin')->with('message', 'Изменено!');
    }
}
