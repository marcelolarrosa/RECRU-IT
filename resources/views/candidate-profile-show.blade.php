@extends('layouts/layout')

@section('main-content')
          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">User Profile</li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->
        
          <div id="profile-container" class="row gutters-sm">
            <div class="col-sm-12 col-md-6 col-lg-12 col-xl-5 mb-3">
              <div class="card">
                @if ($candidate->interview_date)
                <div id="confirmed-date-text"><strong>Confirmed Interview Date: </strong>
                  <p id="printed-text">
                    {{$candidate->interview_date}}
                  </p>
                    @else
                    <div id="confirmed-date-text"><strong style="color:#c33838;">Pending Interview Date: </strong>
                      <p id="printed-text">
                        - Edit this candidate to set an interview date -
                      </p>
                @endif
                  </p>
                </div>
                  
                <div class="d-flex flex-column align-items-center text-center">
                  <img id="candidate-profile-pic" src="{{asset($candidate->profile_pic_url)}}" alt="Admin" class="rounded-circle" width="150">
                  <div class="mt-3">
                    <h4>{{$candidate->fullname}}</h4>
                    <p class="text-secondary mb-1">{{$candidate->position}}</p>
                       @if($candidate->bestcandidate == null)
                        <button id="add-as-best-candidate-button" class="btn btn-primary" onclick="addBestCandidate({{$candidate->id}});"> Mark as Best Candidate </button>
                      @else
                        <button id="remove-as-best-candidate-button" class="btn btn-danger" onclick="removeBestCandidate({{$candidate->id}});"> Remove as Best Candidate </button>
                      @endif
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Portfolio</h6>
                    <span class="text-secondary"> <a href="//{{$candidate->portfolio_link}}" target="_blank" > {{$candidate->portfolio_link}} </a></span>
                  </li>
                   @if($candidate->github_link)
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github mr-2 icon-inline"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>Github</h6>
                    <span class="text-secondary"><a href="//{{$candidate->github_link}}" target="_blank" >{{$candidate->github_link}}</a></span>
                  </li>
                  @endif
                   @if($candidate->twitter_link)
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>Twitter</h6>
                    <span class="text-secondary"><a href="//{{$candidate->twitter_link}}" target="_blank" >{{$candidate->twitter_link}}</a></span>
                  </li>
                  @endif
                   @if($candidate->behance_link)
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">
                      <i class="fa fa-behance-square behance-icon" style="color:#1a0dab;font-size:28px;margin-right:6px;"></i> 
                      Behance
                    </h6>
                    <span class="text-secondary"><a href="//{{$candidate->behance_link}}" target="_blank" >{{$candidate->behance_link}}</a></span>
                  </li>
                  @endif
                </ul>
              </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-12 col-xl-7">
              <div class="card mb-3">
                <div class="row">
                  <div class="col-sm-2 col-md-12 col-lg-2 col-xl-2">
                    <h6 class="mb-0">Full Name</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    {{$candidate->fullname}}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-2 col-md-12 col-lg-2 col-xl-2">
                    <h6 class="mb-0">Position</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    {{$candidate->position}}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-2 col-md-12 col-lg-2 col-xl-2">
                    <h6 class="mb-0">Resume</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    @if($candidate->resume_url != "")
                      <a href="{{asset($candidate->resume_url)}}" download >Download Resume</a>
                    @else
                      <p>Not Uploaded</p>     
                    @endif
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-2 col-md-12 col-lg-2 col-xl-2">
                    <h6 class="mb-0">Email</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <a href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to={{$candidate->email}}" target="_blank">{{$candidate->email}}</a>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-2 col-md-12 col-lg-2 col-xl-2">
                    <h6 class="mb-0">Skype</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <a href="{{$candidate->skype}}">{{$candidate->skype}}</a>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-2 col-md-12 col-lg-2 col-xl-2">
                    <h6 class="mb-0">Mobile</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    {{$candidate->phone}}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-2 col-md-12 col-lg-2 col-xl-2">
                    <h6 class="mb-0">Address</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <a href="https://maps.google.com/?q=<?=$candidate['address'];?>" target="_blank"><?=$candidate['address'];?></a>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-12">
                   <div id="profile-note" class="form-group">
                    <label for="exampleFormControlTextarea1"><strong> Notes on this candidate: </strong></label>
                      <p id="profile-note-text">
                        {{$candidate->notes}}
                      </p>
                    </div>

                      <!-- Button HTML (to Trigger Modal) -->
                      <a id="edit-candidate-button" href="{{route('candidate-edit', $candidate->id)}}">Edit Candidate</a>
                      <a id="open-modal-delete-candidate" href="#myModal" class="trigger-btn" data-toggle="modal">Delete Candidate</a>
                    <!-- Modal HTML -->
                    <div id="myModal" class="modal fade">
                      <div class="modal-dialog modal-confirm">
                        <div class="modal-content">
                          <div class="modalbox success col-sm-8 col-md-6 col-lg-5 center animate">
                            <div class="icon">
                              <span class="fa fa-check"></span>
                            </div>
                            <!--/.icon-->
                            <h1>Success!</h1>
                            <p>The candidate has been deleted</p>
                          </div>
                          <!--/.success-->
                          <div class="modal-header flex-column">
                            <div class="icon-box">
                              <i class="fa fa-exclamation-triangle"></i>
                            </div>            
                            <h4 class="modal-title w-100">Are you sure?</h4>  
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          </div>
                          <div class="modal-body">
                            <p>Do you really want to delete this candidate? <br/>This process cannot be undone.</p>
                          </div>
                          <div class="modal-footer justify-content-center">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <form action="{{route('candidate-delete', $candidate->id)}}" method="POST">
                              {{ csrf_field() }}
                              <a href="{{route('candidate-delete', $candidate->id)}}" id="delete-candidate-button" type="button" class="btn btn-danger redo"> Delete </a>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              </div>
            </div>
          </div>

@endsection