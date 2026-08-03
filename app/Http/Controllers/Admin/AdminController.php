<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class AdminController extends Controller
{
    public function AdminDashboard()
    {
        return view('admin.index');
    }
    // End Method

    public function AdminLogin()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.login.admin_login');
    }
    // End Method

    public function AdminLoginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'email' => 'These credentials do not match our records.',
        ])->withInput($request->only('email'));
    }
    // End Method

    public function AdminLogout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
    // End Method

    public function AdminProfile()
    {
        $admin = Auth::guard('admin')->user();

        return view('admin.dashboard.profile.admin_profile', compact('admin'));
    }
    // End Method

    public function UpdateAdminProfile(Request $request)
    {

        $admin_id = $request->id;
        $admin = Admin::findOrFail($admin_id);

        if ($request->file('profile_photo')) {
            $image = $request->file('profile_photo');
            $manager = new ImageManager(new Driver);
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(100, 90)->save(public_path('upload/admin/'.$name_gen));
            $save_url = 'upload/admin/'.$name_gen;

            if ($admin->profile_photo && file_exists(public_path($admin->profile_photo))) {
                @unlink(public_path($admin->profile_photo));
            }

            $admin->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'date_of_birth' => $request->date_of_birth,
                'email' => $request->email,
                'phone' => $request->phone,
                'about' => $request->about,
                'address' => $request->address,
                'city' => $request->city,
                'state' => $request->state,
                'zip_code' => $request->zip_code,
                'country' => $request->country,
                'profile_photo' => $save_url,
            ]);

            $notification = [
                'message' => 'Profile Updated with image Successfully',
                'alert-type' => 'success',
            ];

            return redirect()->back()->with($notification);

        } else {

            $admin->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'date_of_birth' => $request->date_of_birth,
                'email' => $request->email,
                'phone' => $request->phone,
                'about' => $request->about,
                'address' => $request->address,
                'city' => $request->city,
                'state' => $request->state,
                'zip_code' => $request->zip_code,
                'country' => $request->country,
            ]);

            $notification = [
                'message' => 'Profile Updated without image Successfully',
                'alert-type' => 'success',
            ];

            return redirect()->back()->with($notification);

        }

    }
    // End Method

    public function UpdateAdminPassword(Request $request)
    {
        $admin = Auth::guard('admin')->user();

        if (! Hash::check($request->current_password, $admin->password)) {
            $notification = [
                'message' => 'Current Password Does Not Match',
                'alert-type' => 'error',
            ];

            return redirect()->back()->with($notification);
        }

        $admin->update([
            'password' => $request->password,
        ]);

        $notification = [
            'message' => 'Password Changed Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }
    // End Method

}
