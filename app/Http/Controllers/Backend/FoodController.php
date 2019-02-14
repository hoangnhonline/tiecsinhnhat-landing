<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\FoodGroup;
use App\Models\FoodType;
use App\Models\Food;
use App\Models\DatMon;

use Helper, File, Session, Auth;

class FoodController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return Response
    */
    
    public function index(Request $request)
    {

        $foodTypeList = FoodType::orderBy('display_order')->get();
        $foodGroupList = FoodGroup::orderBy('display_order')->get();    
        
        $food_type_id = $request->food_type_id ? $request->food_type_id : null;
        $food_group_id = $request->food_group_id ? $request->food_group_id : null;
        
        $query = Food::whereRaw('1');

        if( $food_type_id){
            $query->where('food_type_id', $food_type_id);
            $foodGroupList = FoodGroup::where('food_type_id', $food_type_id)->orderBy('display_order')->get(); 
        }
        if( $food_group_id){
            $query->where('food_group_id', $food_group_id);
        }
        $items = $query->orderBy('display_order')->paginate(20);
      
        return view('backend.food.index', compact( 'items', 'foodTypeList', 'food_type_id', 'foodGroupList', 'food_group_id'));
    }
    public function datmon(Request $request)
    {
        
        $items = DatMon::orderBy('id', 'desc')->paginate(50);
      
        return view('backend.food.datmon', compact( 'items'));
    }
    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function create(Request $request)
    {          
        $foodTypeList = FoodType::orderBy('display_order')->get();        
        $foodGroupList = FoodGroup::orderBy('display_order')->get();    

        $food_type_id = $request->food_type_id ? $request->food_type_id : null;
        if($food_type_id){
            $foodGroupList = FoodGroup::where('food_type_id', $food_type_id)->orderBy('display_order')->get();        
        }
        $food_group_id = $request->food_group_id ? $request->food_group_id : null;

        return view('backend.food.create', compact('foodTypeList', 'foodGroupList' , 'food_type_id', 'food_group_id'));
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
            'food_type_id' => 'required'          
        ],
        [   
            'food_type_id.required' => 'Bạn chưa chọn loại món ăn'
        ]); 
        if(!empty($dataArr['food'])){
            foreach($dataArr['food'] as $k => $food){
                if($food != ''){
                    $where = $dataArr['food_group_id'] > 0 ? ['food_group_id' => $dataArr['food_group_id'], 'food_type_id' => $dataArr['food_type_id']] : ['food_type_id' => $dataArr['food_type_id']];
                    Food::create(
                        [
                            'food_type_id' => $dataArr['food_type_id'],
                            'food_group_id' => $dataArr['food_group_id'] > 0 ? $dataArr['food_group_id'] : null,
                            'name' => $food,
                            'price' => $dataArr['price'][$k],
                            'display_order' => Helper::getNextOrder('food', $where),
                            'created_user' => Auth::user()->id,
                            'updated_user' => Auth::user()->id                        ]
                        );
                }
            }
        }       
        
        Session::flash('message', 'Tạo mới món ăn thành công');

        return redirect()->route('food.index', ['food_type_id' => $dataArr['food_type_id'], 'food_group_id' => $dataArr['food_group_id']]);
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
        $detail = Food::find($id);
         $foodTypeList = FoodType::orderBy('display_order')->get();        
        $foodGroupList = FoodGroup::orderBy('display_order')->get();    

        $food_type_id = $detail->food_type_id;
        if($food_type_id){
            $foodGroupList = FoodGroup::where('food_type_id', $food_type_id)->orderBy('display_order')->get();        
        }
    
        return view('backend.food.edit', compact('detail', 'foodTypeList', 'foodGroupList'));
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
            'name.required' => 'Bạn chưa nhập tên nhóm món ăn'
     
        ]);

        $model = Food::find($dataArr['id']);

        $model->update($dataArr);
       
        Session::flash('message', 'Cập nhật món ăn thành công');        

        return redirect()->route('food.edit', $dataArr['id']);
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
        $detail = Food::find($id);
        
        $food_type_id = $detail->food_type_id;
        $food_group_id = $detail->food_group_id;

        $detail->delete();

        // redirect
        Session::flash('message', 'Xóa  thành công');
        return redirect()->route('food.index', ['food_type_id' => $food_type_id, 'food_group_id' => $food_group_id]);
    }
    public function destroyDatMon($id)
    {
        // delete
        $detail = DatMon::find($id);      

        $detail->delete();

        // redirect
        Session::flash('message', 'Xóa  thành công');
        return redirect()->route('dat-mon.index');
    }
}