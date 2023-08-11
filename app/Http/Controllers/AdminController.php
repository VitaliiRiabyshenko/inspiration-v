<?php

namespace App\Http\Controllers;

use App\Http\Filters\ApplicationFilter;
use App\Http\Requests\Admin\UserApplication\FilterRequest;
use App\Http\Requests\Admin\UserApplication\UpdateRequest;
use App\Models\ApplicationStatus;
use App\Models\UserApplication;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FilterRequest $request)
    {
        $data = $request->validated();

        // $filter = app()->make(ApplicationFilter::class, ['queryParams' => array_filter($data)]);

        // $applications = UserApplication::filter($filter)->paginate(10);
        $applications = UserApplication::all();

        return view('admin.index', compact('applications'));
    }

    public function show(string $id)
    {
        $application = UserApplication::findOrFail($id);
        $statuses = ApplicationStatus::all();

        return view('admin.layouts.user-application.show', compact('application', 'statuses'));
    }

    public function destroy(string $id)
    {
        $application = UserApplication::findOrFail($id);
        $application->delete();

        return redirect()->route('admin.index')->with('success', 'Заявку успішно видалено');
    }

    public function update(string $id, UpdateRequest $request)
    {
        if ($request->ajax() && $request->isMethod('patch')) {
            try {
                $application = UserApplication::findOrFail($id);
                $application->update(['application_status' => $request->get('application_status')]);

                return response()->json(['success' => "Статус успішно змінено"]);
            } catch (\Throwable $th) {
                return response()->json(['error' => $th]);
            }
        } else {
            abort(404);
        }
    }


    public function markNotification(Request $request)
    {
        auth()->guard('admin')->user()
            ->unreadNotifications
            ->when($request->input('id'), function ($query) use ($request) {
                return $query->where('id', $request->input('id'));
            })
            ->markAsRead();

        return response()->noContent();
    }
}
