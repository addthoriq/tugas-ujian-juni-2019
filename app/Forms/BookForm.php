<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;
use Kris\LaravelFormBuilder\Field;

class BookForm extends Form
{
    protected $icons    = '<i class="fa fa-paper-plane"></i>';
    public function buildForm()
    {
        $this
            ->add(
                'author', Field::TEXT, [
                    'rules'     => 'required|max:30',
                    'label'     => 'Penulis',
                ]
            )
            ->add(
                'title', Field::TEXT, [
                    'rules'     => 'required|max:30',
                    'label'     => 'Judul',
                ]
            )
            ->add(
                'publisher', Field::TEXT, [
                    'rules'     => 'required|max:30',
                    'label'     => 'Penerbit',
                ]
            )
            ->add(
                'isbn', Field::TEXT, [
                    'rules'     => 'required|max:30',
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
