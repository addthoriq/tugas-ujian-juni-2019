<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;
use Kris\LaravelFormBuilder\Field;
use App\Model\Member;
use App\Model\Book;

class LoanForm extends Form
{
    protected $icons    = '<i class="fa fa-paper-plane"></i>';
    public function buildForm()
    {
        $this
            ->add(
                'member_id', Field::SELECT, [
                    'attr'  => [
                        'class' => 'form-control select2',
                        'style' => 'width: 100%',
                    ],
                    'choices'       => Member::pluck('name', 'id')->toArray(),
                    'empty_value'   => '--- Pilih Nama Anggota ---',
                    'rules'         => 'required',
                    'label'         => 'Nama Anggota',
                ]
            )
            ->add(
                'book_id', Field::SELECT, [
                    'attr'  => [
                        'class' => 'form-control select2',
                        'style' => 'width: 100%',
                    ],
                    'choices'       => Book::pluck('title', 'id')->toArray(),
                    'empty_value'   => '--- Pilih Buku ---',
                    'rules'         => 'required',
                    'label'         => 'Buku yang dipinjam',
                ]
            )
            ->add(
                'quantity', Field::NUMBER, [
                    'label'     => 'Jumlah yang dipinjam',
                ]
            )
            ->add(
                'status', Field::SELECT, [
                    'attr'  => [
                        'class' => 'form-control select2',
                        'style' => 'width: 100%',
                    ],
                    'choices'       => [
                        'Masih dipinjam'    => 'Masih dipinjam',
                        'Tepat waktu'    => 'Tepat waktu',
                        'Terlambat'    => 'Terlambat',
                    ],
                    'empty_value'   => '--- Pilih Status Peminjaman ---',
                    'label'         => 'Status Peminjaman',
                ]
            )
            ->add(
                'period_loan', Field::NUMBER, [
                    'rules'     => 'required',
                    'label'     => 'Durasi peminjaman',
                ]
            )
            ->add(
                'date_of_loan', Field::DATE, [
                    'label' => 'Tanggal Peminjaman',
                ]
            )
            ->add(
                'return_of_loan', Field::DATE, [
                    'label' => 'Tanggal Pengembalian',
                ]
            )
            ->add(
                $this->icons.' Submit','submit', [
                    'attr'  => [
                        'class' => 'btn btn-success btn-sm',
                    ],
                ]
            );
    }
}
