<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\SessionIndicator;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\IndicatorRequest;
use App\MentorshipSessionIndicator;
use DB;

class MentorshipSessionIndicatorController extends Controller
{
      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        #$this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $indicators = MentorshipSessionIndicator::all();
        return view('pages.session.indicatorlist', compact('indicators', $indicators));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.session.indicatorform');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IndicatorRequest $request)
    {
        $indicator = new MentorshipSessionIndicator();
        $indicator -> name = $request->name;
        $indicator -> description = $request->description;
        $indicator -> indicator_number = $request->indicator_number;
        $indicator -> save();
        return redirect('indicator-list');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function setUpOriginalIndicators () {
        DB::table('session_indicator')->delete();
 
        $clinical_indicators = array(
            ['name' => 'Appearance & demeanor', 'description' => 'Appearance & demeanor'],
            ['name' => 'Patient-centered', 'description' => 'Patient-centered'],
            ['name' => 'Time management', 'description' => 'Time management'],
            ['name' => 'Communication', 'description' => 'Communication'],
            ['name' => 'Review of patient file', 'description' => 'Review of patient file'],
            ['name' => 'Vitals Recording, interpreting and Triage', 'description' => 'Vitals Recording, interpreting and Triage'],  
            ['name' => 'Appropriate history taking', 'description' => 'Appropriate history taking'],
            ['name' => 'Physical exam (routine & targeted)', 'description' => 'Physical exam (routine & targeted)'],
            ['name' => 'Diagnosis/differential diagnosis (based on history, physical, investigations); WHO staging', 'description' => 'Diagnosis/differential diagnosis (based on history, physical, investigations); WHO staging'],
            ['name' => 'Correct management of OIs', 'description' => 'Correct management of OIs'],
            ['name' => 'TB screening, diagnosis, treatment & prevention', 'description' => 'TB screening, diagnosis, treatment & prevention'],
            ['name' => 'Decision-making on ART eligibility', 'description' => 'Decision-making on ART eligibility'],
            ['name' => 'Correct prescription of ARVs', 'description' => 'Correct prescription of ARVs'],
            ['name' => 'Monitoring of ARV therapy', 'description' => 'Monitoring of ARV therapy'],
            ['name' => 'Identification & management of treatment failure', 'description' => 'Identification & management of treatment failure'],
            ['name' => 'Identification & management of ARV ADRs', 'description' => 'Identification & management of ARV ADRs'],
            ['name' => 'Correct use of prophylactic medications', 'description' => 'Correct use of prophylactic medications'],
            ['name' => 'Assessment of adherence', 'description' => 'Assessment of adherence'],
            ['name' => 'Prevention messages (PHDP)', 'description' => 'Prevention messages (PHDP)'],
            ['name' => 'Proper documentation', 'description' => 'Proper documentation'],
            ['name' => 'Referrals & linkages to other services', 'description' => 'Referrals & linkages to other services'],
        );

        DB::table('session_indicator')->insert($clinical_indicators);
        return redirect('indicator-list');
    }
}
