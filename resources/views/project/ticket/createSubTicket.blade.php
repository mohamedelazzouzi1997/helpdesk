@extends('layout.app')
@section('title', 'Create Sub Ticket')
@section('parentPageTitle', 'Ticket')
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/plugins/dropify/css/dropify.min.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/plugins/morrisjs/morris.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/plugins/multi-select/css/multi-select.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/plugins/jquery-spinner/css/bootstrap-spinner.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/plugins/nouislider/nouislider.min.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/plugins/select2/select2.css')}}"/>
<style>
.input-group-text {
    padding: 0 .75rem;
}
</style>
@stop
@section('content')
<div class="row clearfix">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="body">
                <h6 class="card-inside-title text-primary">Add Sub ticket</h6>
                <div class="row clearfix">
                    <div class="col-sm-12">

                        <form action='{{ route('store.ticket') }}' id="form_validation" method="POST">
                            @csrf
                            <div class='mb-1 font-weight-bolder font-20' for="image">Title</div>
                            <div class="form-group form-float">
                                <input type="text" class="form-control" placeholder="title" name="title" required>
                            </div>

                            <div class="form-group">
                                <div class='mb-1 font-weight-bolder font-20' for="image">Priority</div>
                                <div class="radio inlineblock m-r-20">
                                    <input type="radio" name="priority" id="low" class="with-gap" value="low" checked>
                                    <label for="low">low</label>
                                </div>
                                <div class="radio inlineblock mr-3">
                                    <input type="radio" name="priority" id="medium" class="with-gap" value="medium" >
                                    <label for="medium">medium</label>
                                </div>
                                <div class="radio inlineblock">
                                    <input type="radio" name="priority" id="high" class="with-gap" value="high" >
                                    <label for="high">high</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <textarea name="description" cols="30" rows="5" placeholder="Description" class="form-control no-resize" required></textarea>
                            </div>
                            <div style="margin-left: -13px;" class="col-lg-3 col-md-6 form-group inlineblock">
                                <label class="font-weight-bolder font-20"> <b>Assign ticket to user</b> </label>
                                <select name='user_id' required class="form-control show-tick ms search-select" data-placeholder="Select User">
                                    <option></option>
                                    @foreach ($users as $user )
                                        <option value='{{ $user->id }}'>{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                                <input class="form-control" type="hidden" value='{{ $parent_id }}' name="parent_id">
                            <div class="col-lg-4 col-md-6 inlineblock">
                                <label class="font-weight-bolder font-20">Date Time</label>
                                <div class="input-group masked-input mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="zmdi zmdi-calendar-note"></i></span>
                                    </div>
                                    <input name='end_time' type="text" class="form-control datetime" placeholder="Ex: 31/12/2022 23:59">
                                </div>
                            </div>
                            <div style="margin-left: -15px;" class="col-lg-12 col-md-12">
                                <div class="card">
                                    <label class="font-weight-bolder font-20" for="image">Image</label>
                                    <input type="file" name='image' class="dropify">
                                </div>
                            </div>
                            <button class="btn btn-raised btn-primary waves-effect" type="submit">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('page-script')
<script src="{{asset('assets/plugins/dropify/js/dropify.min.js')}}"></script>
<script src="{{asset('assets/js/pages/forms/dropify.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-inputmask/jquery.inputmask.bundle.js')}}"></script>
<script src="{{asset('assets/plugins/multi-select/js/jquery.multi-select.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-spinner/js/jquery.spinner.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>
<script src="{{asset('assets/plugins/nouislider/nouislider.js')}}"></script>
<script src="{{asset('assets/plugins/select2/select2.min.js')}}"></script>
<script src="{{asset('assets/js/pages/forms/advanced-form-elements.js')}}"></script>
@stop
