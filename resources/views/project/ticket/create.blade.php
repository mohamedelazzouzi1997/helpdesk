@extends('layout.app')
@section('title', 'Create Ticket')
@section('parentPageTitle', 'Project')
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/plugins/dropify/css/dropify.min.css')}}"/>
@stop
@section('content')
<div class="row clearfix">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="body">
                <h2 class="card-inside-title">Add ticket</h2>
                <div class="row clearfix">
                    <div class="col-sm-12">

                        <form action='{{ route('store.ticket') }}' id="form_validation" method="POST">
                            @csrf
                            <div class="form-group form-float">
                                <input type="text" class="form-control" placeholder="title" name="title" required>
                            </div>

                            <div class="form-group">
                                <div class='mb-1' for="image">Priority</div>
                                <div class="radio inlineblock m-r-20">
                                    <input type="radio" name="priority" id="low" class="with-gap" value="low" checked>
                                    <label for="low">low</label>
                                </div>
                                <div class="radio inlineblock">
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
                            <div style="margin-left: -15px;" class="col-lg-12 col-md-12">
                                <div class="card">
                                    <label for="image">Image</label>
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
@stop
