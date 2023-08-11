<?php

namespace App\Http\Controllers\Admin\HomePage;

use App\Models\VisaTypes;
use App\Http\Controllers\Controller;
use App\Services\Admin\HomePageService;
use App\Http\Requests\Admin\HomePage\VisaTypes\UpdateCreateRequest;

class VisaTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(HomePageService $homePageService)
    {
        $visa_types = $homePageService->getAllTranslation(VisaTypes::all());

        return view('admin.layouts.visa-types.index', compact('visa_types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.layouts.visa-types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UpdateCreateRequest $request)
    {
        $visa_types_data = [
            'value' => $request->input('en_title'),
            'en' => [
                'title' => $request->input('en_title'),
            ],
            'ua' => [
                'title' => $request->input('ua_title'),
            ],
        ];
        VisaTypes::create($visa_types_data);

        return redirect()->route('visa-types.index')->with('success', 'Перевагу успішно додано');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VisaTypes $visaTypes, string $id)
    {
        $visa_type = $visaTypes->findOrFail($id);

        $id = $visa_type->id;
        $visa_type_en = $visa_type->translate('en');
        $visa_type_ua = $visa_type->translate('ua');

        return view('admin.layouts.visa-types.edit', compact('visa_type_en', 'visa_type_ua', 'id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VisaTypes $visaTypes, UpdateCreateRequest $request, string $id)
    {
        $visa_type_data = [
            'value' => $request->input('en_title'),
            'en' => [
                'title' => $request->input('en_title'),
            ],
            'ua' => [
                'title' => $request->input('ua_title'),
            ],
        ];
        $visa_type = $visaTypes->findOrFail($id);
        $visa_type->update($visa_type_data);

        return redirect()->route('visa-types.index')->with('success', 'Тип візи успішно оновлено');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $visa_type = VisaTypes::findOrFail($id);
        $visa_type->delete();

        return redirect()->route('visa-types.index')->with('success', 'Тип візи успішно видалено');
    }
}
