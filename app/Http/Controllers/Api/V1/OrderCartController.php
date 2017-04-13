<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Repositories\OrderCartRepository;
use App\Transformers\OrderCartTransformer;

class OrderCartController extends ApiController
{
	protected $cart;
	
	public function __construct(OrderCartRepository $cart)
	{
		$this->cart = $cart;
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		$data = $request->only('region_name');
		$cart = $this->cart->page($data);
		
		return $this->response->paginator($cart, new OrderCartTransformer);
	}
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		
	}
	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$this->valid($request);
		$data = $request->only('user_id', 'goods_attr_id', 'goods_image', 'price', 'number');
		$this->cart->store($data);
		return $this->response->noContent();
	}
	
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}
	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
	}
	
	public function status(Request $request, $id)
	{
		$input = $request->only('additive_name');
		
		$this->cart->updateColumn($id, $input);
		
		return $this->response->noContent();
	}
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		$this->valid($request);
		$data = $request->only('user_id', 'goods_attr_id', 'goods_image', 'price', 'number');
		
		$this->cart->update($id, $data);
		return $this->response->noContent();
	}
	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$this->cart->destroy($id);
		
		return $this->response->noContent();
	}
	
	public function valid(Request $request)
	{
		$validator = \Validator::make($request->all(), [
			'user_id'      => 'required',
			'goods_attr_id'         => 'required',
			'goods_image'      => 'required',
			'price' => 'required',
			'number' => 'required'
		]);
		
		if ($validator->fails()) {
			return $this->errorBadRequest($validator);
		}
	}
}