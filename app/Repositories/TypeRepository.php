<?php
/**
 * Created by PhpStorm.
 * User: Emily
 * Date: 2017/5/18
 * Time: 17:16
 */
namespace App\Repositories;

use App\Http\Requests\StoreType;
use App\VideoType;

class TypeRepository{

//    新增分类
    public function storeType($request){
        $type=new VideoType();
        $type->type=$request->type;
        $type->save();
    }

//    分类列表
    public function typeList(){
        $list=VideoType::all();
        return $list;
    }

//    更新分类
    public function updateType($request,$id){
        $type=VideoType::find($id);
        $type->type=$request->type;
        $type->save();
    }

//    搜索分类
    public function searchType(){
        $list=VideoType::where('type','like','%'.$_GET['searchType'].'%')->get();
        return $list;
    }
}