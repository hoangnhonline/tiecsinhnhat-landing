<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\FoodMenu;
use App\Models\FoodType;
use App\Models\Food;

use Helper, File, Session, Auth;

class MenuController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index(Request $request)
    {

        $query = Menu::whereRaw('1');

        $items = $query->orderBy('display_order')->paginate(100);
        
      
        return view('backend.menu.index', compact( 'items' ));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function create(Request $request)
    {          
        $foodTypeList = FoodType::orderBy('display_order')->get();
        return view('backend.menu.create', compact('foodTypeList'));
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  Request  $request
    * @return Response
    */
    public function store(Request $request)
    {
        $dataArr = $request->all();
        
        $this->validate($request,[                                    
            'name' => 'required'            
        ],
        [                                    
            'name.required' => 'Bạn chưa nhập tên menu'
        ]);       
        
        
        $rs = Menu::create($dataArr);
        
        if(!empty($dataArr['food_id'])){
            $i = 0;
            foreach($dataArr['food_id'] as $food_id){
                if($food_id > 0){
                    $i++;
                    FoodMenu::create([
                            'menu_id' => $rs->id,
                            'food_id' => $food_id,
                            'display_order' => $i                            
                        ]);
                }
            }
        }

        Session::flash('message', 'Tạo mới menu thành công');

        return redirect()->route('menu.index');
    }

    public function menuCustom(Request $request)
    {
        $foodTypeList = FoodType::orderBy('display_order')->get();
        
        

        return view('backend.menu.', compact('foodTypeList', 'socialImage', 'seo'));
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
    public function show($id)
    {
    //
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
    public function edit($id)
    {        

        $detail = Menu::find($id);
        $foodList = $detail->foodMenu;
        $foodIdArr = [];
        $totalPrice = 0;
        foreach($foodList as $food){
            $foodIdArr[] = $food->food_id;
            $totalPrice+= Food::find($food->food_id)->price;
        }
        $foodTypeList = FoodType::orderBy('display_order')->get();
        return view('backend.menu.edit', compact('detail', 'foodIdArr', 'foodTypeList', 'totalPrice'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  Request  $request
    * @param  int  $id
    * @return Response
    */
    public function update(Request $request)
    {
        $dataArr = $request->all();
        
        $this->validate($request,[                                    
            'name' => 'required'            
        ],
        [                                    
            'name.required' => 'Bạn chưa nhập tên menu'
        ]);    
        
        $model = Menu::find($dataArr['id']);

        $model->update($dataArr);
        FoodMenu::where('menu_id', $dataArr['id'])->delete();
        if(!empty($dataArr['food_id'])){
            $i = 0;
            foreach($dataArr['food_id'] as $food_id){
              
                $i++;
                    FoodMenu::create([
                        'menu_id' => $dataArr['id'],
                        'food_id' => $food_id,
                        'display_order' => $i                            
                    ]);
                
            }
        }
       
        Session::flash('message', 'Cập nhật menu thành công');        

        return redirect()->route('menu.edit', $dataArr['id']);
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return Response
    */
    public function destroy($id)
    {
        // delete
        $model = Menu::find($id);
        $model->delete();

        // redirect
        Session::flash('message', 'Xóa màu thành công');
        return redirect()->route('menu.index');
    }
}