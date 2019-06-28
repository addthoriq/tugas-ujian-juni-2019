<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Category;
use DataTables;
use Form;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $folder   = 'categories';
    public function index(Request $request)
    {
        $data['ajax']   = route('category.data');
        $data['create']   = route('category.create');
        return view($this->folder.'.index', $data);
    }

    public function data(Request $request)
    {
        $data   = Category::select(['id','name']);
        return DataTables::of($data)
            ->addColumn('action', function ($index)
            {
                $tag    = Form::open(array("url" => route('category.destroy',$index->id), "method" => "DELETE"));
                $tag   .= "<a href=".route('category.edit',$index->id)." class='btn btn-primary btn-xs'>Edit</a>";
                $tag   .= "<button type='submit' class='delete btn btn-dange btn-xs'>Delete</button>";
                $tag   .= Form::close();
                return $tag;
            })
            ->rawColumn(['id','action'])
            ->make(true);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
