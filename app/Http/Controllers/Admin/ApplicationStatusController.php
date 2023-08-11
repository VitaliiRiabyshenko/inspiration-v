<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ApplicationStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Form\UpdateCreateRequest;

class ApplicationStatusController extends Controller
{
    public function index()
    {
        $statuses = ApplicationStatus::all();

        return view('admin.layouts.apllication-status.index', compact('statuses'));
    }

    public function create()
    {
        return view('admin.layouts.apllication-status.create');
    }

    public function store(UpdateCreateRequest $request)
    {
        ApplicationStatus::create($request->all());

        return redirect()->route('application-status.index')->with('success', 'Статус успішно додано');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $status = ApplicationStatus::findOrFail($id);

        return view('admin.layouts.apllication-status.edit', compact('status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCreateRequest $request, string $id)
    {
        $status = ApplicationStatus::findOrFail($id);
        $status->update($request->all());

        return redirect()->route('application-status.index')->with('success', 'Статус успішно оновлено');
    }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(string $id)
    // {
    //     $status = ApplicationStatus::findOrFail($id);
    //     $status->delete();

    //     return redirect()->route('application-status.index')->with('success', 'Статус успішно видалено');
    // }
}
