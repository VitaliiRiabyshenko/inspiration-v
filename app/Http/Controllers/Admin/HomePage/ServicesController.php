<?php

namespace App\Http\Controllers\Admin\HomePage;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\HomePage\Services\UpdateCreateRequest;
use App\Models\Services;
use App\Services\Admin\HomePageService;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(HomePageService $homePageService)
    {
        $services = $homePageService->getAllTranslation(Services::all());

        return view('admin.layouts.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.layouts.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UpdateCreateRequest $request)
    {
        $service_data = [
            'en' => [
                'title'       => $request->input('en_title'),
                'description' => $request->input('en_description')
            ],
            'ua' => [
                'title'       => $request->input('ua_title'),
                'description' => $request->input('ua_description')
            ],
        ];

        Services::create($service_data);

        return redirect()->route('services.index')->with('success', 'Послугу успішно додано');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Services $services, string $id)
    {
        $service = $services->findOrFail($id);

        $id = $service->id;
        $service_en = $service->translate('en');
        $service_ua = $service->translate('ua');

        return view('admin.layouts.services.edit', compact('service_en', 'service_ua', 'id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCreateRequest $request, string $id)
    {
        $service_data = [
            'en' => [
                'title'       => $request->input('en_title'),
                'description' => $request->input('en_description')
            ],
            'ua' => [
                'title'       => $request->input('ua_title'),
                'description' => $request->input('ua_description')
            ],
        ];
        $service_item = Services::findOrFail($id);
        $service_item->update($service_data);

        return redirect()->route('services.index')->with('success', 'Послугу успішно оновлено');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = Services::findOrFail($id);
        $service->delete();

        return redirect()->route('services.index')->with('success' ,'Послугу успішно видалено');
    }
}
