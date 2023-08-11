<?php

namespace App\Http\Controllers\Admin\HomePage;

use App\Models\VisaCategories;
use App\Http\Controllers\Controller;
use App\Services\Admin\HomePageService;
use App\Http\Requests\Admin\VisaCategories\UpdateCreateRequest;

class VisaCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(HomePageService $homePageService)
    {
        $visa_categories = $homePageService->getAllTranslation(VisaCategories::all());

        return view('admin.layouts.visa-categories.index', compact('visa_categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.layouts.visa-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UpdateCreateRequest $request)
    {
        $visa_category_data = [
            'country' => $request->input('country'),
            'title' => $request->input('title'),
            'en' => [
                'description' => $request->input('en_description')
            ],
            'ua' => [
                'description' => $request->input('ua_description')
            ],
        ];
        VisaCategories::create($visa_category_data);

        return redirect()->route('visa-categories.index')->with('success', 'Категорію віз успішно додано');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VisaCategories $visaCategories, string $id)
    {
        $visa_category = $visaCategories->findOrFail($id);

        $visa_category_en = $visa_category->translate('en');
        $visa_category_ua = $visa_category->translate('ua');

        return view('admin.layouts.visa-categories.edit', compact('visa_category_en', 'visa_category_ua', 'visa_category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VisaCategories $visaCategories, UpdateCreateRequest $request, string $id)
    {
        $visa_category_data = [
            'country' => $request->input('country'),
            'title' => $request->input('title'),
            'en' => [
                'description' => $request->input('en_description')
            ],
            'ua' => [
                'description' => $request->input('ua_description')
            ],
        ];
        $visa_category = $visaCategories->findOrFail($id);
        $visa_category->update($visa_category_data);

        return redirect()->route('visa-categories.index')->with('success' ,'Категорію віз успішно оновлено');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $visa_category = VisaCategories::findOrFail($id);
        $visa_category->delete();

        return redirect()->route('visa-categories.index')->with('success' ,'Категорію віз успішно видалено');
    }
}
