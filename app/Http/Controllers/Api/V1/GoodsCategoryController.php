<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Repositories\GoodsCategoryRepository;
use App\Transformers\GoodsCategoryTransformer;

class GoodsCategoryController extends ApiController
{
    protected $goodsCategory;

    public function __construct(GoodsCategoryRepository $goodsCategory)
    {
        $this->goodsCategory = $goodsCategory;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $goodsCategory = $this->goodsCategory->page($request->only('category_name'));

        return $this->response->paginator($goodsCategory, new GoodsCategoryTransformer());
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
        $this->goodsCategory->store($request->only('category_name', 'category_code', 'category_logo', 'parent_id', 'level', 'status', 'weight'));
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
        $input = $request->only('status');

        $this->goodsCategory->updateColumn($id, $input);

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
        $data = $request->only('category_name', 'category_code', 'category_logo', 'parent_id', 'level', 'status', 'weight');
        $this->goodsBrand->update($id, $data);
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
        $this->goodsCategory->destroy($id);

        return $this->response->noContent();
    }

    public function valid(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'category_name' => 'required',
            'category_code' => 'required',
            'category_logo' => 'required',
            'parent_id' => 'required',
            'level' => 'required|min:1|max:2',
            'status' => 'required|min:0|max:1',
            'weight' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->errorBadRequest($validator);
        }
    }
}