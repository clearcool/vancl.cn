<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;


class systemController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 网站配置
     */
    public function getSystembase(Request $request)
    {
        //网站配置数据
        $config = DB::table('config')->get();

        //获取session
        $a = $request->session()->get('a');

        return view('admin.system.system-base', ['config' => $config[0], 'a' => $a]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * 清除session
     */
    public function getSystemsession(Request $request)
    {
        //清除session
        $request->session()->forget('a');

        return redirect('admin/system/systembase');
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * 修改网站配置
     */
    public function postSystemupdate(Request $request)
    {
        //获取数据
        $value = $request->except('_token', 'logo');

        //要修改的数据
        $webname = $value['webname'];
        $keyword = $value['keyword'];
        $dsbe = $value['dsbe'];
        $crtifa = $value['crtifa'];
        $recordnb = $value['recordnb'];
        $status = $value['status'];

        //判断是否有logoFile
        if ($request->hasFile('logo')) {

            //获取file
            $file = $request->file('logo');

            //判断是否上传成功
            if ($file->isValid()) {

                //删除uploads/logo目录
                if (is_dir('./uploads/logo')) {
                    function deleteAll($path)
                    {
                        $op = dir($path);
                        while (false != ($item = $op->read())) {
                            if ($item == '.' || $item == '..') {
                                continue;
                            }
                            if (is_dir($op->path . '/' . $item)) {
                                deleteAll($op->path . '/' . $item);
                                rmdir($op->path . '/' . $item);
                            } else {
                                unlink($op->path . '/' . $item);
                            }
                        }
                    }

                    deleteAll('./uploads/logo');
                }

                //设置上传目录
                $oldname = $file->getClientOriginalName();
                $filetype = $file->getClientOriginalExtension();
                $newname = '/uploads/logo/' . md5(date('Y-m-d H:i:s') . $oldname) . '.' . $filetype;
                $file->move('uploads/logo', $newname);

                //更改数据
                $res = DB::table('config')
                    ->where('config_id', '=', '1')
                    ->update([
                        'webname' => $webname,
                        'keyword' => $keyword,
                        'dsbe' => $dsbe,
                        'crtifa' => $crtifa,
                        'recordnb' => $recordnb,
                        'logo' => $newname,
                        'status' => $status
                    ]);
            }
        } else {
	    	//更改数据
	        $res = DB::table('config')
	            ->where('config_id', '=', '1')
	            ->update([
	                'webname' => $webname,
	                'keyword' => $keyword,
	                'dsbe' => $dsbe,
	                'crtifa' => $crtifa,
	                'recordnb' => $recordnb,
	                'status' => $status
	            ]);
        }

        //判断是否修改成功
        if ($res) {
            $request->session()->forget('a');
            session(['a' => 1]);
            return redirect('admin/system/systembase');
        } else {
            $request->session()->forget('a');
            session(['a' => 2]);
            return redirect('admin/system/systembase');
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 友情链接
     */
    public function getSystemlink(Request $request)
    {
        $value = $request->input('value');

        //按从小到大分页查询
        if (empty($value))
        {
            $links = DB::table('frined_link')
                ->orderBy('order', 'asc')
                ->paginate('10');
        } else {
            $links = DB::table('frined_link')
                ->orderBy('order', 'asc')
                ->where('linkname', 'like', '%'.$value.'%')
                ->paginate('10');
        }


        //有多少个友情链接
        $number = DB::table('frined_link')
            ->count();
        return view('admin.system.system-link', ['links' => $links, 'number' => $number]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 添加页面
     */
    public function getSystemlinkadda()
    {
        return view('admin.system.system-linkadd');
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     * 友情添加
     */
    public function getSystemlinkadd(Request $request)
    {
        //获取所有数据
        $value = $request->except('_token');

        //判断是否为空
        if (empty($value['linkname']) || empty($value['linkpath']) || empty($value['content']) || empty($value['order']))
            return redirect('/admin/system/systemlinkadda')->with('empty', '数据不能为空');

        $linkname = $value['linkname'];
        $status = $value['status'];
        $linkpath = $value['linkpath'];
        $content = $value['content'];
        $order = $value['order'];
        $res = DB::table('frined_link')
            ->insert([
                'linkname' => $linkname,
                'status' => $status,
                'linkpath' => $linkpath,
                'content' => $content,
                'order' => $order
            ]);

        //判断成功或失败
        if($res){
            return redirect('/admin/system/systemlinkadda')->with('success', '添加成功');
        }else{
            return redirect('/admin/system/systemlinkadda')->with('error', '添加失败');
        }

    }

    /**
     * @param Request $request
     * @return int
     * 友情删除
     */
    public function postSystemdel(Request $request)
    {
        //获取用户id
        $id = $request->input('id');

        //执行删除
        $res = DB::table('frined_link')->where('f_id', '=', $id)->delete();

        //判断是否删除成功
        if ($res) {
            return 1;
        } else {
            return 0;
        }
    }

    /**
     * @param Request $request
     * @return int
     * 开启链接
     */
    public function postSystemstart(Request $request)
    {
        //获取用户id
        $id = $request->input('id');

        //执行开启用户
        $res = DB::table('frined_link')->where('f_id', '=', $id)->update(['status' => 0]);

        //判断是否开启成功
        if ($res) {
            return 0;
        } else {
            return 1;
        }
    }

    /**
     * @param Request $request
     * @return int
     * 关闭链接
     */
    public function postSystemstop(Request $request)
    {
        //获取用户id
        $id = $request->input('id');

        //执行关闭用户
        $res = DB::table('frined_link')->where('f_id', '=', $id)->update(['status' => 1]);

        //判断是否关闭成功
        if ($res) {
            return 0;
        } else {
            return 1;
        }
    }
}
