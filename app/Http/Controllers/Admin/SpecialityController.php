<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Speciality;
use App\Services\SpecialityImageService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SpecialityController extends Controller
{
    public function __construct(
        private SpecialityImageService $imageService
    ) {}

    public function AllSpecialities(): View
    {
        $specialities = Speciality::latest()->get();

        return view('admin.dashboard.spcialities.all_spcialities', compact('specialities'));
    }

    public function AddSpecialities(): View
    {
        return view('admin.dashboard.spcialities.add_spcialities');
    }

    public function StoreSpecialities(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:specialities,name',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $this->imageService->store($request->file('image'));
        }

        Speciality::create([
            'name' => $validated['name'],
            'image' => $imagePath,
        ]);

        return redirect()
            ->route('admin.specialities.all')
            ->with('success', 'Speciality added successfully.');
    }

    public function EditSpecialities(Speciality $speciality): View
    {
        return view('admin.dashboard.spcialities.edit_spcialities', compact('speciality'));
    }

    public function UpdateSpecialities(Request $request, Speciality $speciality): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:specialities,name,'.$speciality->id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $imagePath = $speciality->image;

        if ($request->hasFile('image')) {
            $this->imageService->delete($speciality->image);
            $imagePath = $this->imageService->store($request->file('image'));
        }

        $speciality->update([
            'name' => $validated['name'],
            'image' => $imagePath,
        ]);

        return redirect()
            ->route('admin.specialities.all')
            ->with('success', 'Speciality updated successfully.');
    }

    public function DeleteSpecialities(Speciality $speciality): RedirectResponse
    {
        $this->imageService->delete($speciality->image);
        $speciality->delete();

        return redirect()
            ->route('admin.specialities.all')
            ->with('success', 'Speciality deleted successfully.');
    }
}
