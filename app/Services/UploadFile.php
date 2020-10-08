<?php

namespace App\Services;

use Illuminate\Support\Str;

class UploadFile
{
    const ROOT = 'uploads';

    public function __construct($file)
    {
        $this->file = $file;
    }

    public function removeFile(string $path): void
    {
        if (file_exists($path)) {
            unlink(public_path($path));
        }
    }

    public function uploadFile(): string
    {
        $imagePath = $this->file;
        $imageName = Str::uuid() . $imagePath->getClientOriginalExtension();
        $path = $imagePath->move(self::ROOT, $imageName)->getPathname();

        return "/{$path}";
    }
}
