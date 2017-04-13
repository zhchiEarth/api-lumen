<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
//use App\Repositories\LinkRepository;
use App\Services\FileManager\UploadManager;


class UploadController extends ApiController
{
	protected $manager;
	
	public function __construct(UploadManager $manager)
	{
		$this->manager = $manager;
	}
	
	/**
	 * Upload the file.
	 *
	 * @param  Request $request
	 * @return array
	 */
	public function uploadFile(Request $request)
	{
		$file = $_FILES['file'];
		
		$fileName = $request->get('name');
		
		$fileName = $fileName ? $fileName.'.'.explode('/', $file['type'])[1] : $file['name'];
		
		$path = str_finish($request->get('folder'), '/').$fileName;
		
		$content = \File::get($file['tmp_name']);
		
		if ($this->manager->checkFile($path)) {
			return $this->errorWrongArgs('This File exists.');
		}
		
		$this->manager->saveFile($path, $content);
		
		return $this->respondWithArray($this->manager->fileDetail($path));
	}
	
}