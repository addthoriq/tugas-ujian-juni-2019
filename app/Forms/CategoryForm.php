<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;
use Kris\LaravelFormBuilder\Field;

class CategoryForm extends Form
{
    protected $icons    = '<i class="fa fa-paper-plane"></i> ';
    public function buildForm()
    {
        $this
            ->add(
                'name', Field::TEXT, [
                    'rules'     => 'required|max:30',
                    'label'     => 'Nama Kategori',
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
