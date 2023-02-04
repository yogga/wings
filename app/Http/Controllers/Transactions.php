<?php

namespace App\Http\Controllers;

use App\Models\TransactionHeader;
use Illuminate\Http\Request;

class Transactions extends Controller
{
    public function __construct()
    {
        $this->data['controller'] = 'transactions';
    }

    public function index()
    {
        $this->data['title']            = "Transactions";

        $this->data['transactions']     = TransactionHeader::with('user')->get();

        return view('dashboard.transaction.index', $this->data);
    }
}
