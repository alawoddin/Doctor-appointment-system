<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Speciality;
use App\Services\SpecialityImageService;
use Illuminate\Http\RedirectResponse;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SpecialityController extends Controller
{
    public function __construct(
        private SpecialityImageService $imageService
    ) {}

    public function AllSpecialities()
    {
        $specialities = Speciality::all();

        return view('admin.dashboard.spcialities.all_spcialities', compact('specialities'));
    }

    public function AddSpecialities()
    {
        return view('admin.dashboard.spcialities.add_spcialities');
    }

    public function StoreSpecialities(Request $request)
    {
       if ($request->file('image')) {
        $image = $request->file('image');
        $manager = new ImageManager(new Driver());
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $img = $manager->read($image);
        $img->resize(100, 90)->save(public_path('upload/speciality/'.$name_gen));
        $save_url = 'upload/speciality/'.$name_gen;

        // Create Speciality
        Speciality::create([
            'name'  => $request->name,
            'image' => $save_url
        ]);

        
    }

    $notification = [
        'message' => 'Speciality Inserted Successfully',
        'alert-type' => 'success'
    ];

    return redirect()->route('admin.specialities.all')->with($notification);


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
