<?php

namespace App\utility\file\services;

use Illuminate\Support\Facades\Storage;
use PDO;

abstract class fileParent
{

    protected $file;
    protected $view;


    private function temporayUrlGenerator($file): string
    {
        if (file_exists(Storage::missing('storage/public/' . $file)))
            return '';
        return asset('storage/' . $file);
    }

    public function makeRenderFile()
    {
        return view($this->view, [
            'url' => $this->temporayUrlGenerator($this->file->file),
            'file' => $this->file
        ])->render();
    }
}
