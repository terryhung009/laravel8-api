<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //考量到分類少直接全部輸出
        $types = Type::get();

        return response([
            'data' => $types //輸出使用data包住

        ],Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            //另外一種驗證的寫法，使用陣列傳入驗證關鍵字
            'name' => [
                'required',
                'max:50',
                //types資料表中name欄位資料室唯一值
                Rule::unique('types', 'name')
            ],
            'sort' => 'nullable|integer' ,
        ]);

        //如果沒有傳入sort欄位內容
        if(!isset($request->sort)){
            //找到目前資料表的排序欄位最大值
            $max = Type::max('sort');
            $request['sort'] = $max + 1;
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        //
    }
}
