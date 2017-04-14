<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
//use App\Repositories\LinkRepository;
use App\Services\Handler\ImageUploadHandler;


class UploadController extends ApiController
{
	protected $manager;
	
	public function __construct(ImageUploadHandler $manager)
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
		if ($file = $request->file('image')) {
//			dd($_FILES['image']);
			$this->avatar->file = $this->manager->uploadImage($file, 'categories');
//			$this->save();
			dd($this->avatar->file);
//			return ['avatar' => $this->avatar];
		} else {
//			Flash::error(lang('Update Avatar Failed'));
		}
		
//		return $this->respondWithArray($this->manager->fileDetail($path));
	}
	
}