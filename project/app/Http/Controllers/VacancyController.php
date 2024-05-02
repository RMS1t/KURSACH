<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVacancyRequest;
use App\Http\Requests\UpdateVacancyRequest;
use App\Models\Vacancy;
use Illuminate\Routing\Controller as BaseController;
class VacancyController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return  response()->json($data =[Vacancy::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVacancyRequest $request)
    {
        $request->validate([
            'vac_name'=>['required', 'string', 'max:255'],
            'work_type'=>['required', 'string', 'max:255'],
            'description'=>['required'],
            'salary'=>['required'],
            'required_experience'=>['required', 'string', 'max:255'],
            'required_education'=>['required', 'string', 'max:255'],
            'company_id'=>['required'],
        ]);

        $vacancy = Vacancy::create([

            'vac_name'=> $request->vac_name,
            'work_type'=>$request->work_type,
            'description'=>$request->description,
            'salary'=>$request->salary,
            'required_experience'=>$request->required_experience,
            'required_education'=>$request->required_education,
            'company_id'=>$request->company_id,
        ]);

        return response()->noContent();
    }

    public function show(Vacancy $vacancy)
    {
        return  response()->json($data =[Vacancy::find($vacancy->id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vacancy $vacancy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVacancyRequest $request, Vacancy $vacancy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Vacancy::destroy($id);

        return response()->noContent();
    }
}
