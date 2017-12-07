@extends('layouts/app')
@section('title','EditProfile')
@section('content')
<?php //echo "<pre>";print_r($profile);die;?>
  <div class="container">
    <h1>Edit Profile</h1>
    <hr>
    <div class="row">
      <!-- left column -->

      <form class="form-horizontal" role="form" method="post" <?php if($profile!=""){ ?>

        action="{{url('edit/'.$profile->id)}}" <?php } else { ?>    action="{{url('saveprofile')}}" <?php } ?>  enctype="multipart/form-data">
        <div class="col-md-3">
          <div class="text-center">

           <!--  <img src="//placehold.it/100" class="avatar img-circle" alt="avatar"> -->
           <?php if($profile!=""){ ?>
           <img src="{{ ('/upload/'.$profile->Profile_Pic) }}" class="avatar img-circle" alt="avatar" id="profile-img-tag" > 
           <h6>Upload a different photo...</h6>
           <?php }
           else{ ?>
           <img src="//placehold.it/100" class="avatar img-circle" alt="avatar" id="profile-img-tag" >
           <?php } ?>

           <input type="file" class="form-control" name="Profile_Pic" id="fileToUpload" >
           @if ($errors->has('Profile_Pic')) <p class="help-block">{{ $errors->first('Profile_Pic') }}</p> @endif
         </div>
       </div>

       <input type="hidden" name="banner_backup"  value="<?php if($profile!=""){ ?>{{$profile->Profile_Pic}} <?php } ?>" >
       <!-- edit form column -->
       <div class="col-md-9 personal-info">

        <h3>Personal info</h3>

        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <div class="form-group">
          <label class="col-lg-3 control-label">First name:</label>
          <div class="col-lg-8">
            <input class="form-control" type="text" name="First_Name" value="<?php  if($profile!=""){
              echo $profile->First_Name; }?>">
              @if ($errors->has('First_Name')) <p class="help-block">{{ $errors->first('First_Name') }}</p> @endif
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Last name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="Last_Name" value="<?php if($profile!=""){
                echo $profile->Last_Name; } ?>">
                @if ($errors->has('Last_Name')) <p class="help-block">{{ $errors->first('Last_Name') }}</p> @endif
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 control-label">Phone number:</label>
              <div class="col-lg-8">
                <input class="form-control" type="text" name="Phone_Number" value="<?php if($profile!=""){
                 echo $profile->Phone_Number; } ?>">
                 @if ($errors->has('Phone_Number')) <p class="help-block">{{ $errors->first('Phone_Number') }}</p> @endif
               </div>
             </div>
             <div class="form-group">
              <label class="col-lg-3 control-label">Mobile number:</label>
              <div class="col-lg-8">
                <input class="form-control" type="text" name="Mobile_Number" value="<?php if($profile!=""){
                  echo $profile->Mobile_Number; } ?>">
                  @if ($errors->has('Mobile_Number')) <p class="help-block">{{ $errors->first('Mobile_Number') }}</p> @endif
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label">Address:</label>
                <div class="col-md-8">
                  <input class="form-control" type="text" name="Address" value="<?php if($profile!=""){
                    echo $profile->Address; } ?>">
                    @if ($errors->has('Address')) <p class="help-block">{{ $errors->first('Address') }}</p> @endif
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">State:</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" name="State" value="<?php if($profile!=""){
                      echo $profile->State; } ?>">
                      @if ($errors->has('State')) <p class="help-block">{{ $errors->first('State') }}</p> @endif
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 control-label">City:</label>
                    <div class="col-md-8">
                      <input class="form-control" type="text" name="City" value="<?php if($profile!=""){
                        echo $profile->City; } ?>">
                        @if ($errors->has('City')) <p class="help-block">{{ $errors->first('City') }}</p> @endif
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-3 control-label">Zip:</label>
                      <div class="col-md-8">
                        <input class="form-control" type="text" name="Zip" value="<?php if($profile!=""){
                         echo $profile->Zip; } ?>">
                         @if ($errors->has('Zip')) <p class="help-block">{{ $errors->first('Zip') }}</p> @endif
                       </div>
                     </div>
                     <div class="form-group">
                      <label class="col-md-3 control-label"></label>
                      <div class="col-md-8">
                        <input type="submit" class="btn btn-primary" name="save" value="Save">
                        <span></span>
                        <input type="reset" class="btn btn-default" value="Cancel">
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <hr> 

            <script type="text/javascript" src="{{URL::asset('js/custom.js')}}"></script>  
            <!--  <script src="{{ URL::asset('js/echo.js') }}"></script> -->
            @endsection 