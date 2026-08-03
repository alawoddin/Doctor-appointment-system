<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Speciality;
use App\Services\SpecialityImageService;
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

    public function EditSpecialities(int $id)
    {
        $speciality = Speciality::findOrFail($id);
        return view('admin.dashboard.spcialities.edit_spcialities', compact('speciality'));
    }

    public function UpdateSpecialities(Request $request)
    {

    $speciality_id = $request->id;
    $speciality = Speciality::findOrFail($speciality_id);

    if ($request->file('image')) {
        $image = $request->file('image');
        $manager = new ImageManager(new Driver());
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $img = $manager->read($image);
        $img->resize(100,90)->save(public_path('upload/speciality/'.$name_gen));
        $save_url = 'upload/speciality/'.$name_gen;

        // Delete old image
        if (file_exists(public_path($speciality->image))) {
            @unlink(public_path($speciality->image));
        }

        // Update Speciality with new image
        $speciality->update([
            'name'  => $request->name,
            'image' => $save_url
        ]);

      

        $notification = [
            'message' => 'Speciality Updated with image Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('admin.specialities.all')->with($notification);

    } else {

        // Update Speciality without image
        $speciality->update([
            'name' => $request->name,
        ]);

       

        $notification = [
            'message' => 'Speciality Updated without image Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('admin.specialities.all')->with($notification);


    }


    }
        

    public function DeleteSpecialities(int $id)
    {
        $Speciality = Speciality::findOrFail($id);
        $img = $Speciality->image;
        unlink($img);

        Speciality::findOrFail($id)->delete();

        

        $notification = array(
            'message' => 'Speciality Deleted Successfully',
            'alert-type' => 'success'
         ); 
         return redirect()->back()->with($notification);
    }
}
