<?php

namespace App\Http\Controllers\Admin\HomePage;

use App\Models\Visa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\Images\UploadRequest;

class VisasImgController extends Controller
{
    public function index()
    {
        $title = 'Візи';
        $action = 'visas';
        $images = Visa::orderBy('image_order', 'ASC')->get();
        return view('admin.layouts.images.index', compact('title', 'images', 'action'));
    }

    public function store(UploadRequest $request)
    {
        try {
            foreach ($request->file('images') as $image) {
                $ext = '.' . $image->getClientOriginalExtension();
                $fileName = str_replace($ext, date('d-m-Y-H-i') . $ext, $image->getClientOriginalName());
                $image->move(public_path() . '/img/visa/', $fileName);
                Visa::create(['image_path' => '/img/visa/' . $fileName]);
            }

            return redirect()->route('visas.index')->with('success', 'Відгуки успішно додано');
        } catch (\Throwable $th) {
            return redirect()->route('visas.index')->with('fail', 'Невдалось додати візи');
        }
    }

    public function update(Request $request)
    {
        if ($request->ajax() && $request->isMethod('patch')) {
            foreach ($request->get('imageIds') as $index => $id) {
                $img = Visa::findOrFail($id);
                if(!$img) {
                    return response()->json(['error' => 'Невдалось змінити порядок']);
                } else {
                    $img->update(['image_order' => $index]);
                }
            }

            return response()->json(['success' => "Порядок успішно змінено"]);
        } else {
            abort(404);
        }
    }

    public function destroy(string $id)
    {
        $image = Visa::findOrFail($id);
        if (File::exists(public_path($image->image))) {
            File::delete(public_path($image->image));
            $image->delete();
        } else {
            return redirect()->route('visas.index')->with('fail', 'Невдалось видалити відгук');
        }

        return redirect()->route('visas.index')->with('success', 'Відгук успішно видалено');
    }
}
