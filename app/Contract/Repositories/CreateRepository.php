<?php

namespace App\Contract\Repositories;

use App\Contract\Interfaces\CreateInterface;
use Illuminate\Support\Facades\File;

class CreateRepository implements CreateInterface
{
    public function createDirectory($request)
    {
        $directory = mkdir('/opt/myprogram/'.$request->user()->name, 0777, true);
        return $directory;
    }

    public function createFile($request)
    {
        $file = shell_exec('touch /opt/myprogram/'.$request->user()->name.'.txt');
        return $file;
    }

    public function getAllDirectories($path)
    {
        $directories = explode(PHP_EOL,shell_exec('ls -d '.$path.'/*/'));
        return $directories;
    }

    public function getAllFiles($path)
    {
        $files = explode(PHP_EOL,shell_exec('ls '.$path.'/*.*'));
        return $files;
    }
}
