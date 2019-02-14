<?php
namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Articles;
use App\Models\ArticlesCate;
use App\Models\Menu;
use App\Models\Customer;
use App\Models\Newsletter;
use App\Models\Settings;
use App\Models\FoodType;
use App\Models\DatMon;


use Helper, File, Session, Auth, Hash, Mail;

class HomeController extends Controller
{
    
    public static $loaiSp = []; 
    public static $loaiSpArrKey = [];    

    public function __construct(){        
       
    }
    /**
    * Display a listing of the resource.
    *
    * @return Response
    */    
    public function index(Request $request)
    {             
        $productArr = [];
       
        $settingArr = Settings::whereRaw('1')->lists('value', 'name');
        $seo = $settingArr;
        $seo['title'] = $settingArr['site_title'];
        $seo['description'] = $settingArr['site_description'];
        $seo['keywords'] = $settingArr['site_keywords'];
        $socialImage = $settingArr['banner'];



        $suckhoeList = Articles::where(['cate_id' => 7])->orderBy('id', 'desc')->limit(4)->get();
        $tiecList = Articles::where(['cate_id' => 5])->orderBy('display_order')->limit(6)->get();
        $menuList = Menu::orderBy('display_order')->get();   
        $foodTypeList = FoodType::orderBy('display_order')->get();  
        $bannerList = Banner::where('object_type', 3)->get();
        $bannerArr = [];
        foreach($bannerList as $banner){
            $bannerArr[$banner->object_id][] = $banner;
        }    
        return view('frontend.home.index', compact(
                                'seo',
                                'menuList',
                                'suckhoeList',
                                'tiecList',
                                'foodTypeList',
                                'bannerArr'
                                ));
    }

    public function getNoti(){
        $countMess = 0;
        if(Session::get('userId') > 0){
            $countMess = CustomerNotification::where(['customer_id' => Session::get('userId'), 'status' => 1])->count();    
        }
        return $countMess;
    }
    public function datSuccess(){
        $seo['title'] = $seo['description'] = $seo['keywords'] = 'Đặt món thành công';       
        return view('frontend.thanks', compact('seo'));
    }
    public function datMon(Request $request){
        $phone = $request->phone;
        $table_no = $request->table_no;
        $food_id_list = $request->str_food_id;
        if($phone != '' && $table_no != '' && $food_id_list != ''){
            DatMon::create([
                'phone' => $phone,
                'table_no' => $table_no,
                'food_id_list' => $food_id_list
            ]);
            // $emailArr = ['blog.bui@gmail.com'];
        
        
            // Mail::send('frontend.email',
            //     [                   
            //         'phone'             => $phone,
            //         'table_no' => $table_no,
            //         'food_id_list' => $food_id_list,
            //     ],
            //     function($message) use ($emailArr) {                    
            //         $message->subject('Khách hàng đặt món');
            //         $message->to($emailArr);                    
            //         $message->from('web.0917492306@gmail.com', 'TIECNGON.VN');
            //         $message->sender('web.0917492306@gmail.com', 'TIECNGON.VN');
            // });        

            Session::flash('message', 'Gửi thông tin đặt món thành công.');
            return redirect()->route('dat-mon-thanh-cong');
        }

    }
    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function search(Request $request)
    {
        $tu_khoa = $request->keyword;       
        $tu_khoa_search = Helper::stripUnicode($tu_khoa);
        $loaiDetail = (object) [];

        $articlesList = Articles::where('alias', 'LIKE', '%'.$tu_khoa_search.'%')->where('cate_id', '<>', 1)
                        ->orderBy('id', 'desc')->paginate(20);
        $loaiDetail->name = $seo['title'] = $seo['description'] =$seo['keywords'] = "Tìm kiếm sản phẩm theo từ khóa '".$tu_khoa."'";

        return view('frontend.search.index', compact('articlesList', 'tu_khoa', 'seo', 'loaiDetail'));
    }
    public function ajaxTab(Request $request){
        $table = $request->type ? $request->type : 'category';
        $id = $request->id;

        $arr = Film::getFilmHomeTab( $table, $id);

        return view('frontend.index.ajax-tab', compact('arr'));
    }
    public function contact(Request $request){        

        $seo['title'] = 'Liên hệ';
        $seo['description'] = 'Liên hệ';
        $seo['keywords'] = 'Liên hệ';
        $socialImage = '';
        return view('frontend.contact.index', compact('seo', 'socialImage'));
    }

    public function newsList(Request $request)
    {
        $slug = $request->slug;
        $cateArr = $cateActiveArr = $moviesActiveArr = [];
       
        $cateDetail = ArticlesCate::where('slug' , $slug)->first();

        $title = trim($cateDetail->meta_title) ? $cateDetail->meta_title : $cateDetail->name;

        $articlesArr = Articles::where('cate_id', $cateDetail->id)->orderBy('id', 'desc')->paginate(10);

        $hotArr = Articles::where( ['cate_id' => $cateDetail->id, 'is_hot' => 1] )->orderBy('id', 'desc')->limit(5)->get();
        $seo['title'] = $cateDetail->meta_title ? $cateDetail->meta_title : $cateDetail->title;
        $seo['description'] = $cateDetail->meta_description ? $cateDetail->meta_description : $cateDetail->title;
        $seo['keywords'] = $cateDetail->meta_keywords ? $cateDetail->meta_keywords : $cateDetail->title;
        $socialImage = $cateDetail->image_url;       
        return view('frontend.news.index', compact('title', 'hotArr', 'articlesArr', 'cateDetail', 'seo', 'socialImage'));
    }      

     public function newsDetail(Request $request)
    {     
        $id = $request->id;

        $detail = Articles::where( 'id', $id )
                ->select('id', 'title', 'slug', 'description', 'image_url', 'content', 'meta_title', 'meta_description', 'meta_keywords', 'custom_text', 'created_at', 'cate_id')
                ->first();
        $is_km = $is_news = $is_kn = 0;
        if( $detail ){           

            $title = trim($detail->meta_title) ? $detail->meta_title : $detail->title;

            $hotArr = Articles::where( ['cate_id' => 1, 'is_hot' => 1] )->where('id', '<>', $id)->orderBy('id', 'desc')->limit(5)->get();
            $otherArr = Articles::where( ['cate_id' => 1] )->where('id', '<>', $id)->orderBy('id', 'desc')->limit(5)->get();
            $seo['title'] = $detail->meta_title ? $detail->meta_title : $detail->title;
            $seo['description'] = $detail->meta_description ? $detail->meta_description : $detail->title;
            $seo['keywords'] = $detail->meta_keywords ? $detail->meta_keywords : $detail->title;
            $socialImage = $detail->image_url; 
            $is_km = $detail->cate_id == 2 ? 1 : 0;
            $is_news = $detail->cate_id == 1 ? 1 : 0;
            $is_kn = $detail->cate_id == 4 ? 1 : 0;
            return view('frontend.news.news-detail', compact('title',  'hotArr', 'detail', 'otherArr', 'seo', 'socialImage', 'is_km', 'is_news', 'is_kn'));
        }else{
            return view('erros.404');
        }
    }

    public function registerNews(Request $request)
    {

        $register = 0; 
        $email = $request->email;
        $newsletter = Newsletter::where('email', $email)->first();
        if(is_null($newsletter)) {
           $newsletter = new Newsletter;
           $newsletter->email = $email;
           $newsletter->is_member = Customer::where('email', $email)->first() ? 1 : 0;
           $newsletter->save();
           $register = 1;
        }

        return $register;
    }

}
