<?php

namespace App\Http\Controllers\API;

use App\Models\Bank;
use App\Http\Controllers\Controller;
use App\Http\Resources\BankResource;

class BankController extends Controller
{
    public function __invoke()
    {
        return BankResource::collection(Bank::whereNotNull(['iban', 'account_no', 'owner_name'])->get());
    }
}
