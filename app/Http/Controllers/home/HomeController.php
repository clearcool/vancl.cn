<?phpnamespace App\Http\Controllers\home;use Illuminate\Http\Request;use DB;use App\Http\Requests;use App\Http\Controllers\Controller;use Illuminate\Routing\Route;use Cache;class HomeController extends Controller{    //用户的主页    public function index()    {        //首页列表信息        $title = [];        $goods = DB::table('shop_type')->where('p_id', '0')->get();        foreach ($goods as $k => $v) {            $goodss = DB::table('shop_type')->where('p_id', $v->st_id)->get();            $title[$v->stname] = [];            for ($i = 0; $i < count($goodss); $i++) {                array_push($title[$v->stname], $goodss[$i]);            }        }        Cache::put('title',$title,30);        return view('home.index', ['title' => $title]);    }    //用户注册动作    public function postRegister()    {        echo '111';    }}