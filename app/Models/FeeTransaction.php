<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeTransaction extends Model
{
    protected $fillable = [
        'payment_id',
        'Paid_date',
        'payment_mode',
        'amount',
        'ref_no',
        'bank_name',
        'document_date',
        'note',
    ];

    public function getTable()
    {
        return config('table.fee_transactions', parent::getTable());
    }
}
