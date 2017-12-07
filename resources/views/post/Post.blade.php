
@extends('layouts/app')
@section('title','Post detail')
@section('content')

<div class="page-inner">
  <div class="profile-cover">
    <div class="row">
      <div class="col-md-3 profile-image">
        <div class="profile-image-container">
          <?php if($Post!=""){ ?>
          <img src="{{ ('/upload/'.$Post->Profile_Pic) }}" class="avatar img-circle" alt="avatar">
          <?php } else { ?> 
          <img src="//placehold.it/100" class="avatar img-circle" alt="avatar">
          <?php } ?>
          <h3 class="text-center"><?php if($Post!="") { echo $Post->First_Name.' '.$Post->Last_Name; } ?></h3>
          <p class="text-center"><?php if ($Post!="") { echo $Post->Address; } ?></p>
          <a href="{{url('editprofile')}}" >
            <button class="btn btn-primary btn-block"><i class="fa fa-plus m-r-xs"></i>My Profile</button>
          </a><br>
          <a href="{{url('addpost')}}" >
            <button class="btn btn-primary btn-block"><i class="fa fa-plus m-r-xs"></i>Add Post</button>
          </a>
        </div>
      </div>

      <div class="col-md-6 m-t-lg">

        <div class="profile-timeline">
          <ul class="list-unstyled">
            @foreach ($Posts as $allpost)
            <li class="timeline-item">
              <div class="panel panel-white">
                <div class="panel-body">
                  <div class="timeline-item-header">
                    <p  style=" text-transform: capitalize;font-weight: 600;">{{$allpost->User->name}}<span style=" font-weight: 200;font-size: 12px;"> Added a Post</span></p>
                    <small>{{$allpost->Title}}</small>
                  </div>
                  <div class="timeline-item-post">
                    <p>{{$allpost->Text}}</p>
                    <div class="timeline-options">
                      <a href="#"><i class="icon-bubble"></i> Comments</a>
                    </div> 

                    @foreach ($allpost->Comments as $comment)

                    <div class="timeline-comment">
                      <div class="timeline-comment-header">
                        <p style=" text-transform: capitalize;font-weight: 600;">{{$comment->User->name}} <span style=" font-weight: 200;font-size: 12px;">Commented</span></p> 
                      </div>
                      <p class="timeline-comment-text">{{$comment->Comment}}</p>
                    </div>
                    @endforeach
                    <form action="{{url('savecomment/'.$allpost->id)}}"  class="form-horizontal" role="form" method="post">
                      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                      <textarea class="form-control" placeholder="Comment" name="Comment"></textarea>
                      @if ($errors->has('Comment')) <p class="help-block">{{ $errors->first('Comment') }}</p> @endif

                      <button type="submit" class="btn btn-success " style="margin-top: 5px">Add Comment</button>
                    </form>
                  </div>
                </div>
              </div>
            </li>
            @endforeach


          </ul>
        </div>
      </div>

    </div>
  </div>
  
  <div class="page-footer">
    <p class="no-s">2015 &copy; Modern by Steelcoders.</p>
  </div>
</div>
@endsection  