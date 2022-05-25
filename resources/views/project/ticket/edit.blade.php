@extends('layout.app')
@section('title', 'Edit Ticket / '.$ticket->id)
@section('parentPageTitle', 'Project')
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
                <h1 class="card-inside-title mb-5 font-weight-bolder font-20">Edit ticket</h1>
                <div class="row clearfix">
                    <div class="col-sm-12">

                        <form action='{{ route('update.ticket',$ticket->id) }}' id="form_validation" method="post" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="form-group form-float">
                                <div class='mb-1 font-weight-bolder font-20' for="priority">Title</div>
                                @error('title')
                                    <span style="display: block;" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input value="{{ $ticket->title }}" type="text" class="form-control @error('title') is-invalid @enderror" placeholder="title" name="title" required>
                            </div>

                            <div class="form-group">
                                <div class='mb-1 font-weight-bolder font-20' for="priority">priority</div>
                                <div class="radio inlineblock m-r-20">
                                    <input type="radio" name="priority" id="low" class="with-gap" value="low" @if ($ticket->priority == 'low')
                                            checked
                                    @endif>
                                    <label for="low">low</label>
                                </div>
                                <div class="radio inlineblock m-r-20">
                                    <input type="radio" name="priority" id="medium" class="with-gap" value="medium" @if ($ticket->priority == 'medium')
                                            checked
                                    @endif >
                                    <label for="medium">medium</label>
                                </div>
                                <div class="radio inlineblock">
                                    <input type="radio" name="priority" id="high" class="with-gap" value="high" @if ($ticket->priority == 'high')
                                            checked
                                    @endif >
                                    <label for="high">high</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class='mb-1 font-weight-bolder font-20' for="image">status</div>
                                <div class="radio inlineblock mr-4">
                                    <input type="radio" name="status" id="open" class="with-gap" value="open" @if ($ticket->status == 'open')
                                            checked
                                    @endif>
                                    <label for="open">open</label>
                                </div>
                                <div class="radio inlineblock">
                                    <input  type="radio" name="status" id="in progress" class="with-gap" value="in progress" @if ($ticket->status == 'in progress')
                                            checked
                                    @endif >
                                    <label class='mr-4' for="in progress">in progress</label>
                                </div>
                                <div class="radio inlineblock">
                                    <input type="radio" name="status" id="resolve" class="with-gap" value="resolve" @if ($ticket->status == 'resolve')
                                            checked
                                    @endif >
                                    <label class='mr-4' for="resolve">resolve</label>
                                </div>
                                <div class="radio inlineblock">
                                    <input type="radio" name="status" id="close" class="with-gap" value="close" @if ($ticket->status == 'close')
                                            checked
                                    @endif >
                                    <label for="close">close</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class='mb-1 font-weight-bolder font-20' for="priority">Description</div>
                                @error('description')
                                    <span style="display: block;" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <textarea name="description" cols="30" rows="5" placeholder="Description" class="form-control no-resize @error('description') is-invalid @enderror" required>{{ $ticket->description }}</textarea>
                            </div>
                            <div style="margin-left: -13px;" class="col-lg-3 col-md-6 form-group inlineblock">
                                <label class="font-weight-bolder font-20"> <b>Assign ticket to user</b> </label>
                                @error('user_id')
                                    <span style="display: block;" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <select name='user_id' class="form-control show-tick ms search-select @error('user_id') is-invalid @enderror" data-placeholder="Select User">
                                    <option></option>
                                    @foreach ($users as $user )
                                        <option @if ($ticket->user->id == $user->id) selected @endif
                                        value='{{ $user->id }}'>{{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-lg-4 col-md-6 inlineblock">
                                <label class="font-weight-bolder font-20">Date Time</label>
                                @error('end_time')
                                    <span style="display: block;" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="input-group masked-input mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="zmdi zmdi-calendar-note"></i></span>
                                    </div>
                                    <input value='{{ $ticket->end_time }}' name='end_time' type="text" class="form-control datetime @error('end_time') is-invalid @enderror" placeholder="Ex: 31/12/2022 23:59">
                                </div>
                            </div>
                            <div style="margin-left: -15px;" class="col-lg-12 col-md-12">
                            <div class='mb-1 font-weight-bolder font-20' for="priority">Image</div>
                                @error('image')
                                    <span style="display: block;" class="invalid-feedback " role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="card" @error('image') style='border: 1px solid red' @enderror>
                                    <input type="file" name='image' class="dropify">
                                </div>
                            </div>

                            <button class="btn btn-raised btn-primary waves-effect" type="submit">Update</button>
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
