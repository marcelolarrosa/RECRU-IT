@extends('layouts/layout')

@section('main-content')
<div id="interviews-candidates-list">
   <!-- Start Notifications -->
    <div class="users">
      <ul class="default-ul">
        @if($candidates_scheduled)
          @foreach($candidates_scheduled as $candidate)
            <li class="status-read">
              <a href="{{route('candidate-profile-show', $candidate->id)}}">
              <div class="table">
                <div class="table-cell img-column">
                    <a class="table-cell candidate-profile-link" href="{{route('candidate-profile-show', $candidate->id)}}">
                      <img class="img-circle" src="{{$candidate->profile_pic_url}}" alt="Md.Pappu Miahn"  width="35" height="35">
                    </a>
                  </div>
                  <div class="table-cell notification-info">
                    <a class="table-cell candidate-profile-link" href="{{route('candidate-profile-show', $candidate->id)}}">
                      <div class="candidate-name">{{$candidate->fullname}}</div>
                      <div class="candidate-position">{{$candidate->position}}</div>
                    </a>
                  </div> 
                  <div class="table-cell notification-info">
                    <a class="table-cell candidate-profile-link" href="{{route('candidate-profile-show', $candidate->id)}}">
                      <div class="interview-date">{{$candidate->interview_date}}</div>
                      <div class="candidate-phone">{{$candidate->phone}}</div>
                    </a>
                  </div> 
                  <div class="table-cell">
                    <div class="resume-download">
                      @if($candidate->resume_url)
                        <a href="{{$candidate->resume_url}}" download >Download Resume</a>
                      @else
                        <p>Not Uploaded</p>     
                      @endif
                    </div>
                  </div>              
                  <div class="table-cell"> 
                    <a id="cancel-interview-button" href="{{route('cancel-interview', $candidate->id)}}">Cancel Interview</a>
                  </div>
              </div>
              </a>
            </li>
          @endforeach
        @endif
      </ul>
    </div>
    <div class="scroll-espace"></div>
  <!-- End Notifications -->        
</div>

@endsection