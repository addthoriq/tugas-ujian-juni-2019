<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;
use Kris\LaravelFormBuilder\Field;

class MemberForm extends Form
{
    protected $icons    = '<i class="fa fa-paper-plane"></i> ';
    public function buildForm()
    {
        $this
            ->add(
                'name', Field::TEXT, [
                    'rules' => 'required|max:30',
                    'label' => 'Nama Anggota',
                ],
            )
            ->add(
                'number_phone', Field::TEXT, [
                    'rules' => 'required',
                    'label' => 'Nomor Hp',
                ],
            )
            ->add(
                'address', Field::TEXTAREA, [
                    'rules' => 'required',
                    'label' => 'Alamat',
                    'attr'  => [
                        'class' => 'form-control'
                    ]
                ],
            )
            ->add(
                'gender', Field::SELECT, [
                    'attr'          => [
                        'class' => 'form-control',
                        'style' => 'width: 100%',
                    ],
                    'choices'       => [
                        1   => 'Laki-Laki',
                        0   => 'Perempuan',
                    ],
                    'empty_value'   => '--- Pilih Jenis Kelamin ---',
                    'rules'         => 'required',
                    'label'         => 'Jenis Kelamin',
                ]
            )
            ->add(
                'place_of_birth', Field::TEXT, [
                    'rules' => 'required|max:30',
                    'label' => 'Tempat Kelahiran',
                ],
            )
            ->add(
                'date_of_birth', Field::DATE, [
                    'label' => 'Tanggal Lahir',
                ],
            )
            ->add(
                $this->icons.' Submit','submit',[
                    'attr'  => [
                        'class' => 'btn btn-success btn-sm',
                    ],
                ]
            );
    }
}
