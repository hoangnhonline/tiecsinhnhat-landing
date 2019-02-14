<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\FoodGroup;
use App\Models\FoodType;
use Helper, File, Session, Auth;

class FoodGroupController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return Response
    */
    
    public function index(Request $request)
    {

        $foodTypeList = FoodType::orderBy('display_order')->get();

        $food_type_id = $request->food_type_id ? $request->food_type_id : null;
        
        $query = FoodGroup::whereRaw('1');

        if( $food_type_id > 0){
            $query->where('food_type_id', $food_type_id);
        }

        $items = $query->orderBy('display_order')->paginate(20);
      
        return view('backend.food-group.index', compact( 'items', 'foodTypeList', 'food_type_id'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function create(Request $request)
    {          
        $foodTypeList = FoodType::orderBy('display_order')->get();
        
        $food_type_id = $request->food_type_id ? $request->food_type_id : null;

        return view('backend.food-group.create', compact('foodTypeList', 'food_type_id'));
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
            'name' => 'required',
            'food_type_id' => 'required'          
        ],
        [                                    
            'name.required' => 'Bạn chưa nhập tên nhóm món ăn',
            'food_type_id.required' => 'Bạn chưa chọn loại món ăn'
        ]);       
        $dataArr['display_order'] = Helper::getNextOrder('food_group', 
                                                        ['food_type_id' => $dataArr['food_type_id']]);
      

        $rs = FoodGroup::create($dataArr);
        
        Session::flash('message', 'Tạo mới thành công');

        return redirect()->route('food-group.index', ['food_type_id' => $dataArr['food_type_id']]);
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
        $foodTypeList = FoodType::orderBy('display_order')->get();

        $detail = FoodGroup::find($id);

        return view('backend.food-group.edit', compact('detail', 'foodTypeList'));
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
            'name' => 'required',
            'food_type_id' => 'required'          
        ],
        [                                    
            'name.required' => 'Bạn chưa nhập tên nhóm món ăn',
            'food_type_id.required' => 'Bạn chưa chọn loại món ăn'
        ]);

        $model = FoodGroup::find($dataArr['id']);

        $model->update($dataArr);
       
        Session::flash('message', 'Cập nhật thành công');        

        return redirect()->route('food-group.index', ['food_type_id' => $dataArr['food_type_id']]);
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
        $detail = FoodGroup::find($id);
        
        $food_type_id = $detail->food_type_id;

        $detail->delete();

        // redirect
        Session::flash('message', 'Xóa ăn thành công');
        return redirect()->route('food-group.index', ['food_type_id' => $food_type_id]);
    }
}