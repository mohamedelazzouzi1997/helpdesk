@extends('layout.app')
@section('title', 'Edit Ticket / '.$ticket->id)
@section('parentPageTitle', 'Project')
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/plugins/dropify/css/dropify.min.css')}}"/>
@stop
@section('content')
<div class="row clearfix">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="body">
                <h1 class="card-inside-title mb-5 font-weight-bolder font-20">Add ticket</h1>
                <div class="row clearfix">
                    <div class="col-sm-12">

                        <form action='{{ route('update.ticket',$ticket->id) }}' id="form_validation" method="post" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="form-group form-float">
                                <div class='mb-1 font-weight-bolder font-20' for="priority">Title</div>
                                <input value="{{ $ticket->title }}" type="text" class="form-control" placeholder="title" name="title" required>
                            </div>

                            <div class="form-group">
                                <div class='mb-1 font-weight-bolder font-20' for="priority">priority</div>
                                <div class="radio inlineblock m-r-20">
                                    <input type="radio" name="priority" id="low" class="with-gap" value="low" @if ($ticket->priority == 'low')
                                            checked
                                    @endif>>
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
                                    <input  type="radio" name="status" id="pending" class="with-gap" value="pending" @if ($ticket->status == 'pending')
                                            checked
                                    @endif >
                                    <label class='mr-4' for="pending">pending</label>
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
                                <textarea name="description" cols="30" rows="5" placeholder="Description" class="form-control no-resize" required>{{ $ticket->description }}</textarea>
                            </div>
                            <div style="margin-left: -15px;" class="col-lg-12 col-md-12">
                                <div class="card">
                                    <div class='mb-1 font-weight-bolder font-20' for="priority">Image</div>
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
@stop
