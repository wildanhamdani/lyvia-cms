<?php

namespace App\Http\Controllers\Transaction;

use App\DataTables\TransactionDataTable;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    public function index(TransactionDataTable $dataTable)
    {
        return $dataTable->render('pages.transaction.transaction.index');
    }
}
