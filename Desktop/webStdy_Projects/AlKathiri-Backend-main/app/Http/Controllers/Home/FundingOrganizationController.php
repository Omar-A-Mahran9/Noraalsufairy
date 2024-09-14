<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\FundingOrganization;
use Illuminate\Http\Request;

class FundingOrganizationController extends Controller
{
    public function __invoke()
    {
        $fundingOrganizations = FundingOrganization::get();
        return view("web.funding-organizations", compact('fundingOrganizations'));
    }
}
