<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Category;
use DataTables;
use Form;
use Kris\LaravelFormBuilder\FormBuilder;
use App\Form\CategoryForm;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $folder   = 'categories';
    protected $rdr   = 'category/';
    public function index(Request $request)
    {
        $ajax       = route('category.data');
        return view($this->folder.'.index', compact('ajax'));
    }

    public function data(Request $request)
    {
        $data   = Category::all();
        return DataTables::of($data)
            ->addColumn('action', function ($index)
            {
                $tag    = Form::open(array("url" => route('category.destroy',$index->id), "method" => "DELETE"));
                $tag   .= "<a href=".route('category.edit',$index->id)." class='btn btn-primary btn-sm'><i class='fa fa-edit'></i></a> ";
                $tag   .= " <button type='submit' class='btn btn-danger btn-sm' onclick='javascript:return confirm(`Apakah anda yakin ingin menghapus data ini?`)'><i class='fa fa-trash'></i></button>";
                $tag   .= Form::close();
                return $tag;
            })
            ->rawColumns(['id','action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(FormBuilder $formBuilder)
    {
        $form   = $formBuilder->create(\App\Forms\CategoryForm::class, [
            'method'    => 'POST',
            'url'       => route('category.store'),
        ]);
        return view($this->folder.'.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, FormBuilder $formBuilder)
    {
        $form       = $formBuilder->create(\App\Forms\CategoryForm::class);
        if(!$form->isValid()){
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }
        Category::create($request->all());
        return redirect($this->rdr)->with('success','Data berhasil ditambah!');
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
    public function edit(FormBuilder $formBuilder, $id)
    {
        $form       = $formBuilder->create(\App\Forms\CategoryForm::class, [
            'method'    => 'PUT',
            'url'       => route('category.update',$id),
        ]);
        $categories = Category::find($id);
        return view($this->folder.'.edit',compact('categories','form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FormBuilder $formBuilder, Request $request, $id)
    {
        $form       = $formBuilder->create(\App\Forms\CategoryForm::class);
        if(!$form->isValid()){
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }
        Category::find($id)
            ->update([
                'name'  => $request->name,
            ]);
        return redirect($this->rdr)->with('success','Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect($this->rdr)->with('success','Data berhasil dihapus!');
    }
}
