<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;


class FeedbackController extends Controller
{
    /**
     * 商品的评论列表
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getComment(Request $request)
    {
        //判断用户是否搜索 和几条一页
        if($request->input('keyword')){
            $shops = DB::table('shop as s')
                    ->join('shop_type as st','s.st_id','=','st.st_id')
                    ->where('shopname','like','%'.$request->input('keyword').'%')
                    ->paginate(4);
        }else{
            $shops = DB::table('shop as s')
                     ->join('shop_type as st','s.st_id','=','st.st_id')
                     ->paginate(8);
        }
        //获取搜索参数
        $all = $request->all();
        return view('admin.feedback.comment-list',['shops'=>$shops,'all'=>$all]);
    }

    /**
     * 商品的评论和回复
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCommentdetails(Request $request)
    {
        //获取商品的s_id
        $s_id = $request->all();
        //查询该商品的信息
        $shop = DB::table('shop as s')
                ->join('shop_type as st','s.st_id','=','st.st_id')
                ->where('s_id','=',$s_id)
                ->first();

        //查询该商品下的所有评论
        $detail = DB::table('shop as s')
                ->leftJoin('shop_comment as sc','s.s_id','=','sc.s_id')
                ->leftJoin('user as u','sc.u_id','=','u.u_id')
                ->LeftJoin('user_detail as ud','u.u_id','=','ud.u_id')
                ->where('s.s_id','=',$s_id)
                ->get();

        return view('admin.feedback.comment-reply',['shop'=>$shop,'detail'=>$detail]);
    }

    /**
     * 商品评价的回复动作
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function postReview(Request $request)
    {
        //获取回复信息
        $data = $request->except('_token');
        //判断是不是空回复
        if(empty($data['backcomment'])){
            return back()->withErrors('不能提交空数据');
        }
        //将数据插入数据库
        $res = DB::table('shop_comment')->where('cm_id','=',$data['cm_id'])->update(['backcomment'=>$data['backcomment']]);

        //判断
        if($res){
            return back()->with('success','回复评论成功');
        }else{
            return back()->withErrors('回复评论失败');
        }

    }

}