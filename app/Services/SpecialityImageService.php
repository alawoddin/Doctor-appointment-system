<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class SpecialityImageService
{
    private ImageManager $manager;

    public function __construct()
    {
        $this->manager = new ImageManager(new Driver);
    }

    public function store(UploadedFile $file): string
    {
        $extension = strtolower($file->getClientOriginalExtension());

        if ($extension === 'svg') {
            return $file->store('specialities', 'public');
        }

        $filename = uniqid('speciality_', true).'.jpg';
        $path = 'specialities/'.$filename;

        Storage::disk('public')->makeDirectory('specialities');

        $image = $this->manager->read($file->getRealPath());
        $image->scaleDown(width: 400, height: 400);
        $image->toJpeg(quality: 85)->save(Storage::disk('public')->path($path));

        return $path;
    }

    public function delete(?string $path): void
    {
        if ($path) {
            Storage::disk('public')->delete($path);
        }
    }
}
