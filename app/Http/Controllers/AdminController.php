<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\AdminService;
use Illuminate\Support\Facades\Validator;


class AdminController extends Controller
{

    protected $service;

    public function __construct(AdminService $service)
    {
        $this->service = $service;
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function signinform()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $admin = \App\Models\Admin::where('email', $request->email)->first();

        if (!$admin) {
            return response()->json([
                'status' => 'error',
                'field' => 'email',
                'message' => 'Email not found',
            ]);
        }

        if ($admin->password !== $request->password) {
            return response()->json([
                'status' => 'error',
                'field' => 'password',
                'message' => 'Invalid password',
            ]);
        }

        session(['admin_id' => $admin->id, 'admin_email' => $admin->email]);

        return response()->json([
            'status' => 'success',
            'message' => 'Login successful',
        ]);
    }

    public function imagebox()
    {
        return view('admin.imagebox.imagebox');
    }

    public function storeImagebox(Request $request)
    {
        $rules = [
            'imageboxtitle' => 'required|string|max:255|min:2',
            'image' => 'required|image',
        ];

        $image_paths = [
            'image' => 'imagebox/images'
        ];

        return $this->service->store(
            $request,
            $rules,
            \App\Models\Imagebox::class,
            $image_paths
        );
    }

    public function slider()
    {
        return view('admin.slider.slider');
    }

    public function storeslider(Request $request)
    {
        $rules = [
            'sliderimage'        => 'required|image',
            'mobilesliderimage'  => 'required|image',

            'sliderheading'      => 'nullable|string|max:255',
            'slidersubheading' => 'nullable|string|max:255',

            'sliderdescription'  => 'nullable|string',

            'buttontext'         => 'nullable|string|max:255',
            'buttonlink'         => 'nullable|string|max:255',

            'headingcolor'       => 'nullable|string',
            'subheadingcolor'    => 'nullable|string',
            'buttonbgcolor'      => 'nullable|string',
            'descriptioncolor'   => 'nullable|string',
        ];

        // image paths for dynamic service
        $image_paths = [
            'sliderimage'       => 'slider/images',
            'mobilesliderimage' => 'slider/mobile_images',
        ];

        // Call dynamic store() service
        return $this->service->store(
            $request,
            $rules,
            \App\Models\Slider::class,
            $image_paths
        );
    }
}
