<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Book;
use DataTables;
use Form;
use Kris\LaravelFormBuilder\FormBuilder;
use App\Forms\BookForm;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $folder   = 'books';
    protected $rdr      = 'book/';
    public function index(Request $request)
    {
        $ajax       = route('book.data');
        $datas      = Book::all();
        return view($this->folder.'.index', compact('ajax','datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data(Request $request)
    {
        $data   = Book::all();
        return DataTables::of($data)
            ->editColumn('category_id',function($index){
                return isset($index->category->name)?$index->category->name : '-';
            })
            ->addColumn('action', function ($index)
            {
                $tag        = Form::open(array("url" => route('book.destroy',$index->id), "method" => "DELETE"));
                $tag       .= "<a href=".route('book.edit',$index->id)." class='btn btn-primary btn-sm'><i class='fa fa-edit'></i></a> ";
                $tag       .= " <button type='submit' class='btn btn-danger btn-sm' onclick='javascript:return confirm(`Apakah anda yakin ingin menghapus data ini?`)'><i class='fa fa-trash'></i></button>";
                $tag       .= Form::close();
                return $tag;
            })
            ->rawColumns(['id','category_id','action'])
            ->make(true);
    }
    public function create(FormBuilder $formBuilder)
    {
        $form   = $formBuilder->create(\App\Forms\BookForm::class,[
            'method'    => 'POST',
            'url'       => route('book.store'),
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
        $form   = $formBuilder->create(\App\Forms\BookForm::class);
        if(!$form->isValid())
        {
            // dd($request->all());
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }
        Book::create($request->all());
        return redirect($this->rdr)->with('success','Data berhasil ditambahkan!');
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
        $form       = $formBuilder->create(\App\Forms\BookForm::class, [
            'method'    => 'PUT',
            'url'       => route('book.update',$id),
        ]);
        $books      = Book::find($id);
        return view($this->folder.'.edit',compact('books','form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, FormBuilder $formBuilder)
    {
        $form       = $formBuilder->create(\App\Forms\BookForm::class);
        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }
        Book::find($id)->update($request->all());
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
        Book::find($id)->delete();
        return redircet($this->rdr)->with('success','Data berhasil dihapus!');
    }
}
