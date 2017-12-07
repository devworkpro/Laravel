
@extends('layouts/app')
@section('title','AddComment')
@section('content')
<div class="page-inner" style="min-height:51px !important">

</div>

<div id="main-wrapper" class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-white">
        <div class="panel-heading clearfix">
          <h4 class="panel-title">Add New Comment</h4>
        </div>
        <div class="panel-body">
          <!-- Display Validation Errors -->
          <div class="row add">
            <form class="m-t-md"  method="post" action="{{url('savecomment')}}" enctype="multipart/form-data">

              <div class="col-md-6">
                <div class="login-box">
                  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
                  <div class="row">
                    <div class="form-group">
                      <label>Text</label>
                      <textarea class="form-control" placeholder="Text" name="Text"> </textarea>
                      <!--  <input type="" class="form-control" placeholder="Text" name="Text"> -->
                      @if ($errors->has('Text')) <p class="help-block">{{ $errors->first('Text') }}</p> @endif
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group">
                      <button type="submit" class="btn btn-success btn-block" name="save">Add New Comment</button>
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
