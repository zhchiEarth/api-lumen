<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Repositories\GoodsRepository;
use App\Transformers\GoodsTransformer;

class GoodsController extends ApiController
{
    protected $goods;

    public function __construct(GoodsRepository $goods)
    {
        $this->goods = $goods;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = $request->only('goods_name');
        $goods = $this->goods->page($data);

        return $this->response->paginator($goods, new GoodsTransformer);
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
        $data = $request->only('goods_code', 'user_id', 'one_category_id', 'two_category_id', 'brand_id', 'price', 'audit_status', 'sale_count', 'view_count', 'comment_count');
        $this->goods->store($data);
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
        $data = $request->only('goods_code', 'user_id', 'one_category_id', 'two_category_id', 'brand_id', 'price', 'audit_status', 'sale_count', 'view_count', 'comment_count');

        $this->goods->update($id, $data);
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
        $this->goods->destroy($id);

        return $this->response->noContent();
    }

    public function valid(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'goods_code'      => 'required',
            'user_id'         => 'required',
            'goods_name'      => 'required',
            'one_category_id' => 'required',
            'two_category_id' => 'required',
            'brand_id'        => 'required',
            'price'           => 'required',
            'audit_status'    => 'required',
            'sale_count'      => 'required',
            'view_count'      => 'required',
            'comment_count'   => 'required'
        ]);

        if ($validator->fails()) {
            return $this->errorBadRequest($validator);
        }
    }
}