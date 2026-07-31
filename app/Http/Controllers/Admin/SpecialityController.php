<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Speciality;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class SpecialityController extends Controller
{
    public function index(): View
    {
        $specialities = Speciality::latest()->get();

        return view('admin.dashboard.spcialities.all_spcialities', compact('specialities'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:specialities,name',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('specialities', 'public');
        }

        Speciality::create([
            'name' => $validated['name'],
            'image' => $imagePath,
        ]);

        return redirect()
            ->route('admin.specialities.all')
            ->with('success', 'Speciality added successfully.');
    }

    public function update(Request $request, Speciality $speciality): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:specialities,name,'.$speciality->id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $imagePath = $speciality->image;

        if ($request->hasFile('image')) {
            if ($speciality->image) {
                Storage::disk('public')->delete($speciality->image);
            }

            $imagePath = $request->file('image')->store('specialities', 'public');
        }

        $speciality->update([
            'name' => $validated['name'],
            'image' => $imagePath,
        ]);

        return redirect()
            ->route('admin.specialities.all')
            ->with('success', 'Speciality updated successfully.');
    }

    public function destroy(Speciality $speciality): RedirectResponse
    {
        if ($speciality->image) {
            Storage::disk('public')->delete($speciality->image);
        }

        $speciality->delete();

        return redirect()
            ->route('admin.specialities.all')
            ->with('success', 'Speciality deleted successfully.');
    }
}
