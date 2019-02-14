<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\FoodType;
use Helper, File, Session, Auth;

class FoodTypeController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function test(){
        
    }
    public function index(Request $request)
    {

        $items = FoodType::orderBy('display_order')->paginate(20);

      
        return view('backend.food-type.index', compact( 'items' ));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function create(Request $request)
    {          

        return view('backend.food-type.create');
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
            'name.required' => 'Bạn chưa nhập tên'
        ]);       
        $dataArr['display_order'] = Helper::getNextOrder('food_type');
      

        $rs = FoodType::create($dataArr);
        
        Session::flash('message', 'Tạo mới thành công');

        return redirect()->route('food-type.index');
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

        $detail = FoodType::find($id);

        return view('backend.food-type.edit', compact('detail'));
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
            'title.required' => 'Bạn chưa nhập màu'
        ]);       
        
        
        $dataArr['food-type_code'] = Helper::stripUnicode($dataArr['name']);

        $model = FoodType::find($dataArr['id']);

        $model->update($dataArr);
       
        Session::flash('message', 'Cập nhật thành công');        

        return redirect()->route('food-type.index');
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
        $model = FoodType::find($id);
        $model->delete();

        // redirect
        Session::flash('message', 'Xóa thành công');
        return redirect()->route('food-type.index');
    }
}