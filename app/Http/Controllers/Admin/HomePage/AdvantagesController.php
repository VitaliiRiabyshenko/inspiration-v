<?php

namespace App\Http\Controllers\Admin\HomePage;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\HomePage\Advantages\UpdateCreateRequest;
use App\Models\Advantages;
use App\Services\Admin\HomePageService;

class AdvantagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(HomePageService $homePageService)
    {
        $advantages = $homePageService->getAllTranslation(Advantages::all());

        return view('admin.layouts.advantages.index', compact('advantages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.layouts.advantages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UpdateCreateRequest $request)
    {
        $advantage_data = [
            'en' => [
                'title'       => $request->input('en_title'),
                'description' => $request->input('en_description')
            ],
            'ua' => [
                'title'       => $request->input('ua_title'),
                'description' => $request->input('ua_description')
            ],
        ];
        Advantages::create($advantage_data);

        return redirect()->route('advantages.index')->with('success' ,'Перевагу успішно додано');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Advantages $advantages, string $id)
    {
        $advantage = $advantages->findOrFail($id);

        $id = $advantage->id;
        $advantage_en = $advantage->translate('en');
        $advantage_ua = $advantage->translate('ua');

        return view('admin.layouts.advantages.edit', compact('advantage_en', 'advantage_ua', 'id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Advantages $advantages, UpdateCreateRequest $request, string $id)
    {
        $advantages_data = [
            'en' => [
                'title'       => $request->input('en_title'),
                'description' => $request->input('en_description')
            ],
            'ua' => [
                'title'       => $request->input('ua_title'),
                'description' => $request->input('ua_description')
            ],
        ];
        $advantage = $advantages->findOrFail($id);
        $advantage->update($advantages_data);

        return redirect()->route('advantages.index')->with('success' ,'Перевагу успішно оновлено');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $advantage = Advantages::findOrFail($id);
        $advantage->delete();

        return redirect()->route('advantages.index')->with('success' ,'Перевагу успішно видалено');
    }
}
