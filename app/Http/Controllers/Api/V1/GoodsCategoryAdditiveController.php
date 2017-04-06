<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Repositories\GoodsCategoryAdditiveRepository;
use App\Transformers\GoodsCategoryAdditiveTransformer;

class GoodsCategoryAdditiveController extends ApiController
{
    protected $goodsCategoryAdditive;

    public function __construct(GoodsCategoryAdditiveRepository $goodsCategoryAdditive)
    {
        $this->goodsCategoryAdditive = $goodsCategoryAdditive;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $categoryId)
    {
        $data = $request->only('additive_name');
        $data['category_id'] = $categoryId;
        $goodsCategoryAdditive = $this->goodsCategoryAdditive->page($data);

        return $this->response->paginator($goodsCategoryAdditive, new GoodsCategoryAdditiveTransformer());
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
        $data = $request->only('category_id', 'additive_name');
        $this->goodsCategoryAdditive->store($data);
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

        $this->goodsCategoryAdditive->updateColumn($id, $input);

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
        $data = $request->only('additive_name');
        $this->goodsCategoryAdditive->update($id, $data);
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
        $this->goodsCategoryAdditive->destroy($id);

        return $this->response->noContent();
    }

    public function valid(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'additive_name' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->errorBadRequest($validator);
        }
    }
}