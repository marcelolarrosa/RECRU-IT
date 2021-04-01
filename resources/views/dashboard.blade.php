@extends('layouts/layout')
    
@section('main-content')    
    
    <a id="add-new-candidate-button" href="{{route('candidate-add')}}">
        <i id="add-candidate-plus" class="fa fa-plus"></i>
        <span>Add New Candidate</span>
    </a>

	<div class="search-bar">
		<input type="text" placeholder="Search by candidate name or position" />
	</div>


    <div id="candidates-grid">
        @foreach ($candidates as $candidate)
        <div class="card-container">
            <a href="{{route('candidate-profile-show', $candidate->id)}}" target="_blank">
                <div class="text-center card-box">
                    @if($candidate->interview_date)
                    <div class="candidate-card pt-2 pb-2 inteview-badge">
                    @else
                    <div class="candidate-card pt-2 pb-2">
                    @endif
                        <div class="thumb-lg member-thumb mx-auto">
                            <img src="{{asset($candidate->profile_pic_url)}}" class="rounded-circle img-thumbnail" alt="profile-image">
                        </div>
                        <h4> {{$candidate->fullname}} </h4>
                        <p class="text-muted"> {{$candidate->position}} <span>|</span>
                            <span>
                                <a href="{{$candidate->portfolio}}" class="text-portfolio" target="_blank"> {{$candidate->portfolio}}</a>
                            </span>
                        </p>
                        <a href="{{route('candidate-profile-show', $candidate->id)}}" type="button" class="btn btn-primary mt-3 btn-rounded waves-effect w-md waves-light" target="_blank">See Profile</a>
                        <ul class="social-links list-inline">
                            <li class="list-inline-item">
                                <a href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to={{$candidate->email}}" title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Facebook" target="_blank" ><i class="fa fa-envelope"></i>
                                </a>
                            </li>
                            @if ($candidate->skype)
                            <li class="list-inline-item">
                                <a href="{{$candidate->skype}}" title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="Skype"><i class="fa fa-skype"></i>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection