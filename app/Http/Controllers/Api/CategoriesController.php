<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    use GeneralTrait;

    public function index()
    {

        $categories=Category::select('id','name_'.app()->getLocale())->get();

        return $this->returnData('categories',$categories,'data of categories');
    }


    public function getCategoryById(Request $request)
    {

        $category = Category::select('name_'.app()->getLocale(),'id','status')->find($request->id);
        if (!$category){
            return $this->returnError('001', 'هذا القسم غير موجد');
        }

        return $this->returnData('categroy', $category,'data of category');
    }

    public function changeStatus(Request $request)
    {
        //validation
        Category::where('id',$request->id) -> update(['status' =>$request->status]);

        return $this->returnSuccessMessage('change status');

    }
}
