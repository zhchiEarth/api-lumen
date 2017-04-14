<?php

namespace App\Services\Handler;

use App\Services\Handler\Exception\ImageUploadException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Intervention\Image\ImageManagerStatic as Image;

class ImageUploadHandler
{
    /**
     * @var UploadedFile $file
     */
    protected $file;
    protected $allowed_extensions = ["png", "jpg", 'jpeg'];
    
    protected $width;
    
    protected $height;

    public function uploadImage($file, $type)
    {
        $this->file = $file;
        $this->setImageSize($type);
        $this->checkAllowedExtensionsOrFail();
	    return $this->saveImageToLocal($type);
    }
    
    private function setImageSize($type)
    {
	    switch ($type){
		    case  'categories':
		    	$this->width = 520;
		    	$this->height = 520;
		    	break;
	    }
    }
    
    protected function checkAllowedExtensionsOrFail()
    {
        $extension = strtolower($this->file->getClientOriginalExtension());
        if ($extension && !in_array($extension, $this->allowed_extensions)) {
            throw new ImageUploadException('You can only upload image with extensions: ' . implode($this->allowed_extensions, ','));
        }
    }

    protected function saveImageToLocal($type)
    {
        $folderName = 'uploads/' .$type. '/' . date("Ym", time()) .'/'.date("d", time()) .'/';

        $destinationPath = public_path() . $folderName;
        $extension = $this->file->getClientOriginalExtension() ?: 'png';
        $safeName  = str_random(32) . '.' . $extension;
        $this->file->move($destinationPath, $safeName);

        $img = Image::make($destinationPath . '/' . $safeName);
        $img->resize($this->width, $this->height, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        $img->save();
        
        return $folderName .'/'. $safeName;
    }
    
    public function deleteImage()
    {
    	
    }
}
