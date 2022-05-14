@extends('layout.app')
@section('title', 'Create Ticket')
@section('parentPageTitle', 'Project')
@section('content')
<div class="row clearfix">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="body">
                <h2 class="card-inside-title">Add ticket</h2>
                <div class="row clearfix">
                    <div class="col-sm-12">
                        <form action='{{ route('store.ticket') }}' method="post" >

                            @csrf
                        <div class="form-group">
                            <label for="exampleFormControlInput1">title</label>
                            <input name='title' type="text" class="form-control" required placeholder="title">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">priority</label>
                            <select name='priority' class="form-control" id="exampleFormControlSelect1">
                                <option value="low">low</option>
                                <option value="medium">medium</option>
                                <option value="high">high</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Description</label>
                            <textarea required name='description' class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Example file input</label>
                            <input  name='image' type="file" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                        <button type="submit" class='btn btn-primary'>Create Ticket</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
