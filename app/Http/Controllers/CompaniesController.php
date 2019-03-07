<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests\CompanyEditRequest;
use App\Http\Requests\CompanyStoreRequest;
use App\Mail\CompanyCreated;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(1);

        return view('admin.companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CompanyStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyStoreRequest $request)
    {
        $input = $request->all();

        if($file = $request->file('photo_id')){

            $name = time() . $file->getClientOriginalName();

            $file->storeAs(
                'public', $name
            );

            $photo = Photo::create(['file' => $name]);

            $input['photo_id'] = $photo->id;
        }

        $company = Company::create($input);

        Mail::to(Auth::user())->send(new CompanyCreated($company));

        Session::flash('success', __('admin.company_created'));

        return redirect('/companies');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::findOrFail($id);

        return view('admin.companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CompanyEditRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyEditRequest $request, $id)
    {
        $company = Company::findOrFail($id);

        if($file = $request->file('photo_id')){

            if($company->photo){
                if(Storage::disk('public')->exists($company->photo->file)){
                    Storage::disk('public')->delete($company->photo->file);
                }
                $company->photo->delete();
            }

            $input = $request->all();

            $name = time() . $file->getClientOriginalName();

            $file->storeAs(
                'public', $name
            );

            $photo = Photo::create(['file' => $name]);

            $input['photo_id'] = $photo->id;
        }else{
            $input = $request->except('photo_id');
        }

        $company->update($input);

        Session::flash('success', __('admin.company_edited'));

        return redirect('/companies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $company = Company::findOrFail($id);

        if($company->photo){
            if(Storage::disk('public')->exists($company->photo->file)){
                Storage::disk('public')->delete($company->photo->file);
            }
            $company->photo->delete();
        }

        $company->delete();

        Session::flash('success', __('admin.company_deleted'));

        return redirect('/companies');
    }
}
