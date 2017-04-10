<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Repositories\GoodsCategorySpecRepository;
use App\Transformers\GoodsCategorySpecTransformer;

class GoodsCategorySpecController
{
    protected $goodsCategorySpec;

    public function __construct(GoodsCategorySpecRepository $goodsCategorySpec)
    {
        $this->goodsCategorySpec = $goodsCategorySpec;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $goodsCategorySpec = $this->goodsCategorySpec->page($request->only('category_name', 'level', 'parent_id'));

        return $this->response->paginator($goodsCategorySpec, new GoodsCategorySpecTransformer);
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
        $data = $request->only('attr_id', 'attribute_value');
        $this->goodsCategorySpec->store($data);
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

        $this->goodsCategorySpec->updateColumn($id, $input);

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
        $data = $request->only('attr_id', 'attribute_value');
        $this->goodsCategorySpec->update($id, $data);
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
        $this->goodsCategorySpec->destroy($id);

        return $this->response->noContent();
    }

    public function valid(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'attr_id' => 'required',
            'attribute_value' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->errorBadRequest($validator);
        }
    }
}