<?php

namespace App\Http\Controllers\Api\V1;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
// use App\Jobs\SendRegisterEmail;
use App\Transformers\UserTransformer;

class UserController extends ApiController
{
	protected $userRepository;
	
	public function __construct(UserRepository $userRepository)
	{
		$this->userRepository = $userRepository;
	}
	
	public function index()
	{
		$users = $this->userRepository->page([]);
		
		return $this->response->paginator($users, new UserTransformer());
	}
	
	public function editPassword(Request $request)
	{
		$validator = \Validator::make($request->all(), [
			'old_password' => 'required',
			'password' => 'required|confirmed|different:old_password',
			'password_confirmation' => 'required|same:password',
		]);
		
		if ($validator->fails()) {
			return $this->errorBadRequest($validator);
		}
		
		$user = $this->user();
		
		$auth = \Auth::once([
			'email' => $user->email,
			'password' => $request->get('old_password'),
		]);
		
		if (! $auth) {
			return $this->response->errorUnauthorized();
		}
		
		$password = app('hash')->make($request->get('password'));
		$this->userRepository->update($user->id, ['password' => $password]);
		
		return $this->response->noContent();
	}
	
	public function show($id)
	{
		$user = $this->userRepository->find($id);
		
		if (! $user) {
			return $this->response->errorNotFound();
		}
		
		return $this->response->item($user, new UserTransformer());
	}
	
	public function userShow()
	{
		return $this->response->item($this->user(), new UserTransformer());
	}
	
	/**
	 * @api {patch} /user 修改个人信息(update my info)
	 * @apiDescription 修改个人信息(update my info)
	 * @apiGroup user
	 * @apiPermission JWT
	 * @apiVersion 0.1.0
	 * @apiParam {String} [name] name
	 * @apiParam {Url} [avatar] avatar
	 * @apiSuccessExample {json} Success-Response:
	 *     HTTP/1.1 200 OK
	 *     {
	 *        "id": 2,
	 *        "email": 'liyu01989@gmail.com',
	 *        "name": "ffff",
	 *        "created_at": "2015-10-28 07:30:56",
	 *        "updated_at": "2015-10-28 09:42:43",
	 *        "deleted_at": null,
	 *     }
	 */
	public function patch(Request $request)
	{
		$validator = \Validator::make($request->input(), [
			'name' => 'string|max:50',
			'avatar' => 'url',
		]);
		
		if ($validator->fails()) {
			return $this->errorBadRequest($validator);
		}
		
		$user = $this->user();
		$attributes = array_filter($request->only('name', 'avatar'));
		
		if ($attributes) {
			$user = $this->userRepository->update($user->id, $attributes);
		}
		
		return $this->response->item($user, new UserTransformer());
	}
	
    public function store(Request $request)
    {
         $validator = \Validator::make($request->input(), [
             'mobile_phone' => 'required|email|unique:users',
             'password' => 'required',
         ]);

         if ($validator->fails()) {
             return $this->errorBadRequest($validator);
         }

        $email = $request->get('name');
        $password = $request->get('password');

        $attributes = [
            'name' => $email,
            'nickname' => $request->get('nickname'),
            'password' => app('hash')->make($password),
        ];
        $user = User::create($attributes);

        // 201 with location
         $location = dingo_route('v1', 'users.show', $user->id);

        $result = [
            'token' => \Auth::fromUser($user),
            'expired_at' => Carbon::now()->addMinutes(config('jwt.ttl'))->toDateTimeString(),
            'refresh_expired_at' => Carbon::now()->addMinutes(config('jwt.refresh_ttl'))->toDateTimeString(),
        ];

        return $this->response->item($user, new UserTransformer())
            ->header('Location', $location)
            ->setMeta($result)
            ->setStatusCode(201);
    }
}