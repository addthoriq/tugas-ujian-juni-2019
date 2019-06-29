<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;
use Kris\LaravelFormBuilder\Field;
use App\Model\Category;

class BookForm extends Form
{
    protected $icons    = '<i class="fa fa-paper-plane"></i>';
    public function buildForm()
    {
        $this
            ->add(
                'category_id', Field::SELECT, [
                    'attr'          => [
                        'class' => 'form-control select2',
                        'style' => 'width: 100%',
                    ],
                    'choices'       => Category::pluck('name','id')->toArray(),
                    'empty_value'   => '--- Pilih Kategori ---',
                    'rules'         => 'required',
                    'label'         => 'Kategori Buku',
                ]
            )
            ->add(
                'author', Field::TEXT, [
                    'rules'     => 'required|max:30',
                    'label'     => 'Penulis',
                ]
            )
            ->add(
                'title', Field::TEXT, [
                    'rules'     => 'required|max:50',
                    'label'     => 'Judul',
                ]
            )
            ->add(
                'publisher', Field::TEXT, [
                    'rules'     => 'required|max:50',
                    'label'     => 'Penerbit',
                ]
            )
            ->add(
                'place_of_released', Field::TEXT, [
                    'rules'     => 'required|max:30',
                    'label'     => 'Tempat Terbit',
                ]
            )
            ->add(
                'year_of_released', Field::NUMBER, [
                    'rules'     => 'required',
                    'label'     => 'Tahun Terbit',
                ]
            )
            ->add(
                'quantity', Field::NUMBER, [
                    'rules'     => 'required',
                    'label'     => 'Jumlah Buku',
                ]
            )
            ->add(
                'isbn', Field::TEXT, [
                    'rules'     => 'required|max:18',
                    'label'     => 'Nomor ISBN',
                ]
            )
            ->add(
                $this->icons.' Submit', 'submit', [
                    'attr'  => [
                        'class' => 'btn btn-success btn-sm',
                    ],
                ]
            );
    }
}
