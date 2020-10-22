<?php

namespace App\Contract\Interfaces;

interface CreateInterface
{
    public function createDirectory($request);
    public function createFile($request);
    public function getAllDirectories($path);
    public function getAllFiles($path);
}
