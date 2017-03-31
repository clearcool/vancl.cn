<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;





class systemController extends Controller
{

	//基本设置
    public function getSystembase()
    {
        //网站配置数据
        $config = DB::table('config')->get();

        return view('admin.system.system-base', ['config' => $config[0]]);
    }

    //网站修改
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

        //判断是否有logoFile
        if ($request->hasFile('logo')) {

            //获取file
            $file = $request->file('logo');

            //判断是否上传成功
            if ($file->isValid()) {

                //删除uploads/logo目录
                if (is_dir('./uploads/logo')) {
                    function deleteAll($path) {
                        $op = dir($path);
                        while (false != ($item = $op->read())) {
                            if ($item == '.' || $item == '..') {
                                continue;
                            }
                            if (is_dir($op->path.'/'.$item)) {
                                deleteAll($op->path.'/'.$item);
                                rmdir($op->path.'/'.$item);
                            } else {
                                unlink($op->path.'/'.$item);
                            }
                        }
                    }
                    deleteAll('./uploads/logo');
                }

                //设置上传目录
                $oldname = $file->getClientOriginalName();
                $filetype = $file->getClientOriginalExtension();
                $newname = '.public'.md5(date('Y-m-d H:i:s').$oldname).'.'.$filetype;
                $file->move('uploads/logo', $newname);
            }
        }

        //更改数据
        $res = DB::table('config')
            ->where('config_id', '=', '1')
            ->update([
                'webname' => $webname,
                'keyword' => $keyword,
                'dsbe' => $dsbe,
                'crtifa' => $crtifa,
                'recordnb' => $recordnb,
                'logo' => $newname
            ]);

        //判断是否修改成功
        if ($res) {
            return "<script>window.location.href='admin/system/System-base'</script>";
        } else {
            return 1;
        }
    }

}