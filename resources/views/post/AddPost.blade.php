
@extends('layouts/app')
@section('title','AddPost')
@section('content')
<div class="page-inner" style="min-height:51px !important">

</div>

<div id="main-wrapper" class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-white">
        <div class="panel-heading clearfix">
          <h4 class="panel-title">Add New Post</h4>
        </div>
        <div class="panel-body">
          <!-- Display Validation Errors -->
          <div class="row add">
            <form class="m-t-md"  method="post" action="{{url('savepost')}}" enctype="multipart/form-data">

              <div class="col-md-6">
                <div class="login-box">
                  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                  <div class="row">
                    <div class="form-group">
                      <label>Title</label>
                      <input type="text" class="form-control" placeholder="Title" name="Title"  autofocus>
                      @if ($errors->has('Title')) <p class="help-block">{{ $errors->first('Title') }}</p> @endif
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="form-group">
                      <label>Text</label>
                      <input type="text" class="form-control" placeholder="Text" name="Text">
                      @if ($errors->has('Text')) <p class="help-block">{{ $errors->first('Text') }}</p> @endif
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group">
                      <button type="submit" class="btn btn-success btn-block" name="save">Add New Post</button>
                    </div>
                  </div>
                  
                </div>
              </div>

              
              

            </form>
          </div><!-- Row -->
        </div>
      </div>
    </div>
  </div><!-- Row -->
</div>

</div>
@endsection  
