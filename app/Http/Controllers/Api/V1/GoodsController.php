<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Repositories\GoodsRepository;
use App\Transformers\GoodsTransformer;
use Illuminate\Support\Facades\DB;

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
//        $goodsAttributes = $request->input('goodsAttributes');
//        dd(json_decode($goodsAttributes));
        $this->valid($request);
        $data = $request->only('goods_name', 'one_category_id', 'two_category_id', 'brand_id', 'audit_status');
        $data['goods_code'] = $request->input('goods_code', 0);
        $data['sale_count'] = $request->input('sale_count', 0);
        $data['view_count'] = $request->input('view_count', 0);
        $data['additives'] = $request->only('goodsAdditives');
        $data['comment_count'] = $request->input('comment_count', 0);
//        $this->goods->store($data);

        DB::beginTransaction();
        $goodsId = DB::table('goods')->insertGetId($data);

        if ($goodsId) {
            DB::commit();
        } else {
            DB::rollBack();
        }
        return $this->response->noContent();
    }

    private function getAttr($goodsAttributes)
    {
        $attributes = json_decode($goodsAttributes);
        foreach ($attributes as $value => $val) {

        }
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
        $input = $request->only('audit_status');

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
        $data = $request->only('goods_code', 'goods_name', 'user_id', 'one_category_id', 'two_category_id', 'brand_id', 'price', 'audit_status', 'sale_count', 'view_count', 'comment_count');
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
//            'user_id'         => 'required',
            'goods_name'      => 'required',
            'one_category_id' => 'required',
            'two_category_id' => 'required',
            'brand_id'        => 'required',
//            'price'           => 'required',
            'audit_status'    => 'required'
        ]);

        if ($validator->fails()) {
            return $this->errorBadRequest($validator);
        }
    }
}