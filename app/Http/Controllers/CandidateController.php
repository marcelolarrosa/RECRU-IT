<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Candidate;

class CandidateController extends Controller
{
    public function index()
    {
        $candidates = Candidate::all();
        return view('dashboard', ['candidates' => $candidates]);
    }

    public function edit($candidateId)
    {
        $candidate = Candidate::find($candidateId);
        return view('candidate-edit', ['candidate' => $candidate]);
    }
    public function add()
    {
        return view('candidate-add');
    }

    public function create(Request $request)
    {
        $newCandidate = new Candidate();
        $newCandidate->fullname = $request->fullname;
        $newCandidate->email = $request->email;
        $newCandidate->position = $request->position;
        $newCandidate->phone = $request->phone;
        $newCandidate->address = $request->address;
        $newCandidate->portfolio_link = $request->portfolio_link;
        $newCandidate->github_link = $request->github_link;
        $newCandidate->twitter_link = $request->twitter_link;
        $newCandidate->behance_link = $request->behance_link;
        $newCandidate->notes = $request->notes;
        $newCandidate->resume_url = $request->resume_url;
        $newCandidate->profile_pic_url = $request->profile_pic_url;
        $newCandidate->skype = $request->skype;
        $newCandidate->bestcandidate = $request->bestcandidate;
        $newCandidate->interview_date = $request->interview_date;
                  
        if($request->hasFile('profile_pic_url')){
            $profile_pic_url = $request->file('profile_pic_url');
            $destinationPath = 'images/';
            $fileName = time() . '-' .  $profile_pic_url->getClientOriginalName();
            $uploadSuccess = $request->file('profile_pic_url')->move(public_path($destinationPath), $fileName);
            $newCandidate->profile_pic_url = $destinationPath . $fileName;
        }    

        if($request->hasFile('resume_url')){
            $resume_url = $request->file('resume_url');
            $destinationPath = 'resumes/';
            $fileName = time() . '-' .  $resume_url->getClientOriginalName();
            $uploadSuccess = $request->file('resume_url')->move(public_path($destinationPath), $fileName);
            $newCandidate->resume_url = $destinationPath . $fileName;
        }
        
        $newCandidate->save();
        
        return redirect('dashboard');
    }

    public function save(Request $request, $candidateId)
    {
        $candidate = Candidate::find($candidateId);
        $candidate->fullname = $request->fullname;
        $candidate->email = $request->email;
        $candidate->position = $request->position;
        $candidate->phone = $request->phone;
        $candidate->address = $request->address;
        $candidate->portfolio_link = $request->portfolio_link;
        $candidate->github_link = $request->github_link;
        $candidate->twitter_link = $request->twitter_link;
        $candidate->behance_link = $request->behance_link;
        $candidate->notes = $request->notes;
        $candidate->resume_url = $request->resume_url;
        $candidate->profile_pic_url = $request->profile_pic_url;
        $candidate->skype = $request->skype;
        $candidate->interview_date = $request->interview_date;
                               
        if($request->hasFile('profile_pic_url')){
            $profile_pic_url = $request->file('profile_pic_url');
            $destinationPath = 'images/';
            $fileName = time() . '-' .  $profile_pic_url->getClientOriginalName();
            $uploadSuccess = $request->file('profile_pic_url')->move(public_path($destinationPath), $fileName);
            $candidate->profile_pic_url = $destinationPath . $fileName;
        }   

        if($request->hasFile('resume_url')){
            $resume_url = $request->file('resume_url');
            $destinationPath = 'resumes/';
            $fileName = time() . '-' .  $resume_url->getClientOriginalName();
            $uploadSuccess = $request->file('resume_url')->move(public_path($destinationPath), $fileName);
            $candidate->resume_url = $destinationPath . $fileName;
        }

        $candidate->save();

        return view('candidate-profile-show', ['candidate' => $candidate]);
    }

    public function delete(Request $request, $candidateId)
    {
        $candidate = Candidate::find($candidateId);
        $candidate->delete();
        return redirect('dashboard');
    }

    public function bestCandidateAdd($candidateId){
        $bestCandidate = Candidate::find($candidateId);
        $bestCandidate->bestcandidate = "YES";
        $bestCandidate->save();
    }
    public function bestCandidateRemove($candidateId){
        $bestCandidate = Candidate::find($candidateId);
        $bestCandidate->bestcandidate = NULL;
        $bestCandidate->save();
    }

    public function candidatesScheduled()
    {
        $candidates_scheduled = Candidate::whereNotNull('interview_date')->get();
        return view('scheduled-interviews', ['candidates_scheduled' => $candidates_scheduled]);
    }
    public function cancelInterview($candidateId)
    {
        $cancel_scheduled = Candidate::find($candidateId);
        $cancel_scheduled -> interview_date = NULL;
        $cancel_scheduled->save();
        return back();
    }
    
    public function candidateProfile($candidateId)
    {
        $candidate = Candidate::find($candidateId);
        return view('candidate-profile-show', ['candidate' => $candidate]);
    }
}
