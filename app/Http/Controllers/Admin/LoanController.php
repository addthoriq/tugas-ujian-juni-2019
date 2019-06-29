<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Loan;
use DataTables;
use Form;
use Kris\LaravelFormBuilder\FormBuilder;
use App\Forms\LoanForm;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $folder   = 'loans';
    protected $rdr      = 'loan-book/';
    public function index(Request $request)
    {
        $ajax   = route('loan-book.data');
        return view($this->folder.'.index', compact('ajax'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data(Request $request)
    {
        $data   = Loan::all();
        return DataTables::of($data)
            ->editColumn('member_id',function($index){
                return $index->member->name;
            })
            ->editColumn('book_id',function($index){
                return $index->book->title;
            })
            ->editColumn('date_of_loan',function($index){
                return date('d M Y', strtotime($index->date_of_loan));
            })
            ->editColumn('return_of_loan',function($index){
                return isset($index->return_of_loan)?date('d M Y', strtotime($index->return_of_loan)):'-';
            })
            ->addColumn('action',function ($index){
                $tag    = Form::open(array("url" => route('loan-book.destroy',$index->id), "method" => "DELETE"));
                $tag   .= "<a href=".route('loan-book.edit',$index->id)." class='btn btn-primary btn-sm'><i class='fa fa-edit'></i></a> ";
                $tag   .= " <button type='submit' class='btn btn-danger btn-sm' onclick='javascript:return confirm(`Apakah anda yakin ingin menghapus data ini?`)'><i class='fa fa-trash'></i></button>";
                $tag   .= Form::close();
                return $tag;
            })
            ->rawColumns(['id','action'])
            ->make(true);
    }
    public function create(FormBuilder $formBuilder)
    {
        $form       = $formBuilder->create(\App\Forms\LoanForm::class, [
            'method'    => 'POST',
            'url'       => route('loan-book.store'),
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
        $form   = $formBuilder->create(\App\Forms\LoanForm::class);
        if(!$form->isValid()){
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }
        Loan::create($request->all());
        return redirect($this->rdr)->with('succes','Data berhasil ditambahkan!');
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
        $form       = $formBuilder->create(\App\Forms\LoanForm::class, [
            'method'    => 'PUT',
            'url'       => route('loan-book.update',$id),
        ]);
        $loans      = Loan::find($id);
        return view($this->folder.'.edit', compact('loans','form'));
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
        $form       = $formBuilder->create(\App\Forms\LoanForm::class);
        if(!$form->isValid()){
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }
        Loan::find($id)->update($request->all());
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
        Loan::find($id)->delete();
        return redirect($this->rdr)->with('success', 'Data berhasil dihapus!');
    }
}
