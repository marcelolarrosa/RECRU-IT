@extends('layouts/layout')

@section('main-content')
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="main-breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">User Profile</li>
          </ol>
        </nav>
        <!-- /Breadcrumb -->
        
        <form action="{{route('candidate-create')}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
          <div id="profile-container" class="row gutters-sm">
            <div class="col-sm-12 col-md-6 col-lg-12 col-xl-5 mb-3">
              <div class="card">
                <div id="confirmed-date-text"><strong>Confirmed Interview Date: </strong>
                  <textarea name="interview_date" class="event-log" readonly></textarea>
                    <a id="schedule-interview-button" href="#">Schedule Interview</a>
                </div>
                <div id="datepicker-container">
                  <div id="interview-datepicker" class="input-group">
                  </div>
                </div>
                <div class="d-flex flex-column align-items-center text-center">
                  <div class="account-settings">
                    <div class="user-profile">
                      <div class="user-avatar">
                        <div class="avatar-upload">
                          <div class="avatar-edit">
                              <input type="file" name="profile_pic_url" id="imageUpload" accept=".png, .jpg, .jpeg"/>
                              <label for="imageUpload"></label>
                          </div>
                          <div class="avatar-preview">
                              <div id="imagePreview" style="background-image: url(img/candidate-pic-placeholder.jpg);">
                              </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="mt-3">
                    <h4></h4>
                    <p class="text-secondary mb-1"></p>
                 </div>
                </div>
              </div>
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Portfolio</h6>
                    <span class="text-secondary"> 
                        <input type="text" name="portfolio_link" class="form-control" id="porfolio" placeholder="Portfolio url">
                    </span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github mr-2 icon-inline"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>Github</h6>
                        <input type="text" name="github_link" class="form-control" id="github" placeholder="Github url">
                    </span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>Twitter</h6>
                    <span class="text-secondary">
                        <input type="text" name="twitter_link" class="form-control" id="twitter" placeholder="Twitter url">
                    </span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">
                      <i class="fa fa-behance-square behance-icon" style="color:#1a0dab;font-size:28px;margin-right:6px;"></i> 
                      Behance
                    </h6>
                    <span class="text-secondary">
                        <input type="text" name="behance_link" class="form-control" id="behance" placeholder="Behance url">
                    </span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-12 col-xl-7">
              <div class="card mb-3">
                <div class="row">
                  <div class="col-sm-3 col-md-12 col-lg-3 col-xl-3">
                    <h6 class="mb-0">Full Name</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="text" name="fullname" class="form-control" id="fullName" placeholder="Enter full name">
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3 col-md-12 col-lg-3 col-xl-3">
                    <h6 class="mb-0">Position</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="text" name="position" class="form-control" id="position" placeholder="Position">
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3 col-md-12 col-lg-3 col-xl-3">
                    <h6 class="mb-0">Resume</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="file" id="Resume" name="resume_url" accept=".pdf, .doc"/>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3 col-md-12 col-lg-3 col-xl-3">
                    <h6 class="mb-0">Email</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3 col-md-12 col-lg-3 col-xl-3">
                    <h6 class="mb-0">Skype</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="text" name="skype" class="form-control" id="skype" placeholder="Skype url">
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3 col-md-12 col-lg-3 col-xl-3">
                    <h6 class="mb-0">Mobile</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone">
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3 col-md-12 col-lg-3 col-xl-3">
                    <h6 class="mb-0">Address</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="text" name="address" class="form-control" id="address" placeholder="Address">
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-12">
                   <div class="form-group">
                    <label for="exampleFormControlTextarea1"><strong> Notes on this candidate: </strong></label>
                        <textarea name="notes" class="form-control rounded-0" id="exampleFormControlTextarea1" rows="7" cols="40"></textarea>
                    </div>
                      <!-- Button HTML (to Trigger Modal) -->
                    <button id="update-candidate-button" type="submit" id="submit" name="submit" class="btn btn-primary load-button">
                      <span>Create Candidate</span>
                      <svg version="1.1" id="loader-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         width="20px" height="20px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve">
                      <path fill="#fff" d="M43.935,25.145c0-10.318-8.364-18.683-18.683-18.683c-10.318,0-18.683,8.365-18.683,18.683h4.068c0-8.071,6.543-14.615,14.615-14.615c8.072,0,14.615,6.543,14.615,14.615H43.935z">
                        <animateTransform attributeType="xml"
                          attributeName="transform"
                          type="rotate"
                          from="0 25 25"
                          to="360 25 25"
                          dur="0.6s"
                          repeatCount="indefinite"/>
                        </path>
                      </svg>
                    </button>
                      <a id="open-modal-delete-candidate" href="#myModal" class="trigger-btn " data-toggle="modal">Delete Candidate</a>
                    <!-- Modal HTML -->
                    <div id="myModal" class="modal fade">
                      <div class="modal-dialog modal-confirm">
                        <div class="modal-content">
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
                            <button type="button" class="btn btn-danger"> Delete </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              </div>
            </div>
          </form>
          </div>
@endsection