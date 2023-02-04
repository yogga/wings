<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransactionHeader extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function hasDetails($code, $number)
    {
        $details = DB::select(DB::raw("SELECT transaction_details.*, products.product_name FROM transaction_headers 
        join transaction_details 
        ON transaction_details.document_code = transaction_headers.document_code 
        AND transaction_details.document_number = transaction_headers.document_number 

        join products on products.product_code = transaction_details.product_code
        
        WHERE transaction_headers.document_code='$code' 
        AND transaction_headers.document_number='$number'"));
        return $details;
    }

    public function user()
    {
        return  $this->belongsTo(User::class);
    }
}
