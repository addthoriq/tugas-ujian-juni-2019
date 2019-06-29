<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Member;
use DataTables;
use Form;
use Kris\LaravelFormBuilder\FormBuilder;
use App\Forms\MemberForm;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $folder   = 'members';
    protected $rdr      = 'member/';
    public function index(Request $request)
    {
        $ajax   = route('member.data');
        return view($this->folder.'.index', compact('ajax'));
    }

    public function data(Request $request)
    {
        $data   = Member::all();
        return DataTables::of($data)
            ->editColumn('gender',function($index){
                return ($index->gender)?'Laki-Laki':'Perempuan';
            })
            ->editColumn('created_at',function($index){
                return date('d M Y', strtotime($index->created_at));
            })
            ->addColumn('action', function($index){
                $tag    = Form::open(array("url" => route('member.destroy',$index->id), "method" => "DELETE"));
                $tag   .= "<a href=".route('member.edit',$index->id)." class='btn btn-primary btn-sm'><i class='fa fa-edit'></i></a> ";
                $tag   .= " <button type='submit' class='btn btn-danger btn-sm' onclick='javascript:return confirm(`Apakah anda yakin ingin menghapus data ini?`)'><i class='fa fa-trash'></i></button>";
                $tag   .= Form::close();
                return $tag;
            })
            ->rawColumns([
                'id','gender','created_at','action'
            ])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(FormBuilder $formBuilder)
    {
        $form       = $formBuilder->create(\App\Forms\MemberForm::class, [
            'method'    => 'POST',
            'url'       => route('member.store'),
        ]);
        return view($this->folder.'.create',compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, FormBuilder $formBuilder)
    {
        $form       = $formBuilder->create(\App\Forms\MemberForm::class);
        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }
        Member::create($request->all());
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
        $form       = $formBuilder->create(\App\Forms\MemberForm::class, [
            'method'    => 'PUT',
            'url'       => route('member.update',$id),
        ]);
        $members      = Member::find($id);
        return view($this->folder.'.edit',compact('members','form'));
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
        $form       = $formBuilder->create(\App\Forms\MemberForm::class);
        if(!$form->isValid()){
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }
        Member::find($id)->update($request->all());
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
        Member::find($id)->delete();
        return redircet($this->rdr)->with('success','Data berhasil dihapus!');
    }
}
