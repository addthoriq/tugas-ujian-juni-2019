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
        return view($this->folder.'.index', compact('ajax'));
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
            ->addColumn('action', function ($index)
            {
                $tag        = Form::open(array("url" => route('book.destroy',$index->id), "method" => "DELETE"));
                $tag       .= "<a href=".route('category.edit',$index->id)." class='btn btn-primary btn-sm'><i class='fa fa-edit'></i></a> ";
                $tag       .= " <button type='submit' class='btn btn-danger btn-sm' onclick='javascript:return confirm(`Apakah anda yakin ingin menghapus data ini?`)'><i class='fa fa-trash'></i></button>";
                $tag       .= Form::close();
                return $tag;
            })
            ->rawColumns(['id','action'])
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
        Book::find($id)->delete();
        return redircet($this->rdr)->with('success','Data berhasil dihapus!');
    }
}
