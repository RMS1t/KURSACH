<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Company;
use \Illuminate\Http\Client\Request;
use Illuminate\Routing\Controller;
class CompanyController extends Controller
{
    public function index()
    {
        return  response()->json($data =[Company::all()]);
    }
    public function show(Company $company)
    {
        return  response()->json($company);
    }

    public function store(StoreCompanyRequest $request)
    {
        $request->validate([
            'company_name'=>['required', 'string', 'max:255'],
            'address'=>['required', 'string', 'max:255'],
            'description'=>['required', 'string', 'max:255'],
            'inn'=>['required', 'numeric', ],
            'kpp'=>['required', 'numeric', ],
            'number'=>['required', 'numeric', ],
            'company_type'=>['required', 'string', 'max:255'],
        ]);

        $company= Company::create([
            'company_name'=>$request->company_name,
            'address'=>$request->address,
            'description'=>$request->description,
            'inn'=>$request->inn,
            'kpp'=>$request->kpp,
            'number'=>$request->number,
            'company_type'=>$request->company_type,
            'user_id'=>$request->user()->id,

        ]);

        return response()->json([1=> $company]);
    }



    public function destroy($id)
    {
        Company::destroy($id);

        return response()->noContent();
    }
}
