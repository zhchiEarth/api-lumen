<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Repositories\RegionRepository;
use App\Transformers\GoodsRegionTransformer;

class RegionController extends ApiController
{
	protected $region;
	
	public function __construct(RegionRepository $region)
	{
		$this->region = $region;
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		$data = $request->only('region_name');
		$region = $this->region->page($data);
		
		return $this->response->paginator(region, new GoodsTransformer);
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
		$data = $request->only('region_name', 'province_name', 'city_name', 'parent_id', 'region_level');
		$this->region->store($data);
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
		
		$this->goods->updateColumn($id, $input);
		
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
		$data = $request->only('region_name', 'province_name', 'city_name', 'parent_id', 'region_level');
		
		$this->region->update($id, $data);
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
		$this->region->destroy($id);
		
		return $this->response->noContent();
	}
	
	public function valid(Request $request)
	{
		$validator = \Validator::make($request->all(), [
			'region_name'      => 'required',
			'province_name'         => 'required',
			'city_name'      => 'required',
			'parent_id' => 'required',
			'region_level' => 'required'
		]);
		
		if ($validator->fails()) {
			return $this->errorBadRequest($validator);
		}
	}
}