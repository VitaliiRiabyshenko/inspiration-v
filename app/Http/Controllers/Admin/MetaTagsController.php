<?php

namespace App\Http\Controllers\Admin;

use App\Models\MetaTags;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MetaTags\UpdateCreateRequest;
use Illuminate\Http\Request;

class MetaTagsController extends Controller
{
    public function create($route)
    {
        $meta = MetaTags::where('route', $route)->first();

        if ($meta) {
            return redirect()->route('meta.show', compact('route'))->with('success', 'Meta тени вже існують.');
        }

        return view('admin.layouts.meta.create', compact('route'));
    }

    public function store(UpdateCreateRequest $request, $route)
    {
        $meta_data = [
            'route' => $request->input('route'),
            'en' => [
                'title'       => $request->input('en_title'),
                'description' => $request->input('en_description'),
                'keywords'    => $request->input('en_keywords'),
                'lang'        => $request->input('en_lang')
            ],
            'ua' => [
                'title'       => $request->input('ua_title'),
                'description' => $request->input('ua_description'),
                'keywords'    => $request->input('ua_keywords'),
                'lang'        => $request->input('ua_lang')
            ],
        ];
        MetaTags::create($meta_data);

        return redirect()->route('meta.show', compact('route'))->with('success', 'Meta теги успішно додано');
    }

    public function show(MetaTags $metaTags, $route)
    {
        $meta = $metaTags->where('route', $route)->first();

        if (!$meta) {
            return redirect()->route('meta.create', compact('route'))->with('success', 'У Вас немає Meta тегів для цієї сторінки, будь ласка, додайте.');
        }
        
        $meta_en = $meta->translate('en');
        $meta_ua = $meta->translate('ua');
        $id = $meta->id;

        return view('admin.layouts.meta.show', compact('meta_en', 'meta_ua', 'id', 'route'));
    }

    public function edit(MetaTags $metaTags, $route)
    {
        $meta = $metaTags->where('route', $route)->first();

        if (!$meta) {
            return redirect()->route('meta.create', compact('route'))->with('success', 'У Вас немає Meta тегів для цієї сторінки, будь ласка, додайте.');
        }

        $meta_en = $meta->translate('en');
        $meta_ua = $meta->translate('ua');

        return view('admin.layouts.meta.edit', compact('meta_en', 'meta_ua', 'route'));
    }


    public function update(UpdateCreateRequest $request, $route)
    {
        $meta_data = [
            'route' => $request->input('route'),
            'en' => [
                'title'       => $request->input('en_title'),
                'description' => $request->input('en_description'),
                'keywords'    => $request->input('en_keywords'),
                'lang'        => $request->input('en_lang')
            ],
            'ua' => [
                'title'       => $request->input('ua_title'),
                'description' => $request->input('ua_description'),
                'keywords'    => $request->input('ua_keywords'),
                'lang'        => $request->input('ua_lang')
            ],
        ];

        $meta = MetaTags::where('route', $request->input('route'))->firstOrFail();
        $meta->update($meta_data);

        return redirect()->route('meta.show', compact('route'))->with('success' ,'Meta теги успішно оновлено');
    }

    public function destroy(Request $request)
    {
        $meta = MetaTags::findOrFail($request->id);
        $meta->delete();

        return redirect()->route('admin.index')->with('success' ,'Мета теги успішно видалено');
    }
}