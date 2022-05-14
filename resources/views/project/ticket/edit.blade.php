@extends('layout.app')
@section('title', 'Edit Ticket / '.$ticket->id)
@section('parentPageTitle', 'Project')

@section('content')
<div class="row clearfix">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="body">
                <h2 class="card-inside-title">Add ticket</h2>
                <div class="row clearfix">
                    <div class="col-sm-12">
                        <form action='{{ route('update.ticket',$ticket->id) }}' method="post" >
                            @method('put')
                            @csrf
                        <div class="form-group">
                            <label for="exampleFormControlInput1">title</label>
                            <input name='title' value="{{ $ticket->title }}" type="text" class="form-control"  placeholder="title">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">priority</label>
                            <select name='priority' class="form-control" >
                                <option @if ($ticket->priority == 'low')
                                    selected
                                @endif value="low">low</option>
                                <option @if ($ticket->priority == 'medium')
                                    selected
                                @endif value="medium">medium</option>
                                <option @if ($ticket->priority == 'high')
                                    selected
                                @endif value="high">high</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">status</label>
                            <select name='status' class="form-control" >
                                <option @if ($ticket->status == 'open')
                                    selected
                                @endif value="open">open</option>
                                <option @if ($ticket->status == 'pending')
                                    selected
                                @endif value="pending">pending</option>
                                <option @if ($ticket->status == 'resolve')
                                    selected
                                @endif value="resolve">resolve</option>
                                 <option @if ($ticket->status == 'close')
                                    selected
                                @endif value="close">close</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Description</label>
                            <textarea  name='description' class="form-control"  rows="3">{{ $ticket->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Example file input</label>
                            <input name='image' type="file" class="form-control-file" >
                        </div>
                        <button type="submit" class='btn btn-primary'>Update Ticket</button>
                        <a class='btn btn-danger' href='{{ route('delete.ticket',$ticket->id) }}'><i class="fa fa-trash"></i></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
