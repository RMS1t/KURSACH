<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreResumeRequest;
use App\Http\Requests\UpdateResumeRequest;
use App\Models\Resume;
use Illuminate\Http\Client\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class ResumeController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return  response()->json($data =[Resume::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function findResume($substr)
    {
        $referense= "%".$substr."%";
        $findData=  DB::table('resumes')->whereAll([
            'name',
            'tag',
        ], 'LIKE', $referense);
        return  response()->json($data = $findData);
    }
    public function findByTag($tag)
    {
        $referense= "%".$tag."%";

        $tagData=  DB::table('resumes')->whereAll(
            ['tag',], 'LIKE', $referense);
        return  response()->json($data = $tagData);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreResumeRequest $request)
    {
        $request->validate([
            "first_name"=>['required', 'string', 'max:255'],
            'name'=>['required', 'string', 'max:255'],
            "last_name"=>['required', 'string', 'max:255'],
            "resident_address"=>['required', 'string', 'max:255'],
            'birthdate'=>['required','date'],
            'citizenship'=>['required', 'string', 'max:255'],
            "work_permission"=>['required', 'string', 'max:255'],
            'user_id'=>['required'],
            "gender"=>["required","boolean"],
            "tags"=>["required","string"]
        ]);
        $resume=Resume::create([
            "first_name"=>$request->first_name,
            'name'=>$request->name,
            "last_name"=>$request->last_name,
            "resident_address"=>$request->resident_address,
            'birthdate'=>$request->birthdate,
            'citizenship'=>$request->citizenship,
            "work_permission"=>$request->work_permission,
            'user_id'=>$request->user_id,
            "gender"=>$request->gender,
            "tags"=>$request->tags,
        ]);
        return response()->json([1=> $resume]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return  response()->json( $data=Resume::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Resume $resume)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateResumeRequest $request, Resume $resume)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Resume::destroy($id);

        return response()->noContent();
    }
}
