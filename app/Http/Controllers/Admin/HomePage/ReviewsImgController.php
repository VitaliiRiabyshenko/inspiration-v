<?php

namespace App\Http\Controllers\Admin\HomePage;

use App\Models\Reviews;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Images\UploadRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class ReviewsImgController extends Controller
{
    public function index()
    {
        $title = 'Відгуки';
        $action = 'reviews';
        $images = Reviews::orderBy('image_order', 'ASC')->get();

        return view('admin.layouts.images.index', compact('title', 'images', 'action'));
    }

    public function store(UploadRequest $request)
    {
        try {
            foreach ($request->file('images') as $image) {
                $ext = '.' . $image->getClientOriginalExtension();
                $fileName = str_replace($ext, date('d-m-Y-H-i') . $ext, $image->getClientOriginalName());
                $image->move(public_path() . '/img/reviews/', $fileName);
                Reviews::create(['image_path' => '/img/reviews/' . $fileName]);
            }
            return redirect()->route('reviews.index')->with('success', 'Відгуки успішно додано');
        } catch (\Throwable $th) {
            return redirect()->route('reviews.index')->with('fail', 'Невдалось додати відгуки');
        }
    }

    public function update(Request $request)
    {
        if ($request->ajax() && $request->isMethod('patch')) {
            foreach ($request->get('imageIds') as $index => $id) {
                $img = Reviews::findOrFail($id);
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
        $image = Reviews::findOrFail($id);
        if (File::exists(public_path($image->image_path))) {
            File::delete(public_path($image->image_path));
            $image->delete();
        } else {
            return redirect()->route('reviews.index')->with('fail', 'Невдалось видалити відгук');
        }

        return redirect()->route('reviews.index')->with('success', 'Відгук успішно видалено');
    }
}
