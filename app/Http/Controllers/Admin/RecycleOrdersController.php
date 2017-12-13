<?php

namespace App\Http\Controllers\Admin;

use App\Models\RecycleGoodAttribute;
use App\Models\RecycleGoodOrder;
use App\Models\RecycleGoods;
use App\Models\RecycleGoodsAttrValue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RecycleOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recycleorders = RecycleGoodOrder::orderby('creat_time','desc')->paginate(10);

        return view('Admin\RecycleOrder\index',compact('recycleorders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recycleorder = RecycleGoodOrder::where('roid',$id)->first();
        //dd($recycleorder);
        $goodname = RecycleGoods::find($recycleorder->rgid)->rgname;
        $attr_id = explode(',',$recycleorder->info);
        $attr_value = RecycleGoodsAttrValue::whereIn('goods_attr_id',$attr_id)->get();
        foreach ($attr_value as $k=>$v){
            $attr_value[$k]['attr_type'] = RecycleGoodAttribute::find($v->attr_id)->attr_name;
        }
        //dd($attr_value);
        return view('Admin\RecycleOrder\info',compact('attr_value','recycleorder','goodname'));
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($id);
        $input = $request->except('_token','_method');

        $input['update_time'] = time();
        //dd($input);
        $res = RecycleGoodOrder::where('roid',$id)->update($input);
        if($res)
        {
            return redirect('/admin/recycleorders')->with('msg','修改成功');;
        }else{
            return back()->with('msg','修改失败');;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
