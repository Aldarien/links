@extends('layout.base')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Edit Link - {{$key}}</div>
    <div class="panel-body">
    <form method="post" action="edit.php?link={{$key}}" class="form-horizontal">
        <div class="form-group">
            <div class="col-md-2"><label for="key" class="form-label">Key</label></div>
        <div class="col-md-3"><input type="text" name="key" value="{{$key}}" class="form-control" /></div>
        </div>
        <div class="form-group">
            <div class="col-md-2"><label for="title" class="form-label">Title</label></div>
            <div class="col-md-5"><input type="text" name="title" value="{{$link->title}}" class="form-control" /></div>
        </div>
        <div class="form-group">
            <div class="col-md-2"><label for="href" class="form-label">Href *</label></div>
            <div class="col-md-5"><input type="text" name="href" @if ($link->ip == null) value="{{$link->href}}" @endif class="form-control" /></div>
        </div>
        <div class="form-group">
            <div class="col-md-2"><label for="ip" class="form-label">IP *</label></div>
            <div class="col-md-2"><input type="text" name="ip" value="{{$link->ip}}" class="form-control" /></div>
        </div>
        <div class="form-group">
            <div class="col-md-2"><label for="port" class="form-label">Port *</label></div>
            <div class="col-md-3"><input type="text" name="port" value="{{$link->port}}" class="form-control" /></div>
        </div>
        <div class="form-group">
            <div class="col-md-2"><label for="part" class="form-label">Part *</label></div>
            <div class="col-md-3"><input type="text" name="part" value="{{$link->part}}" class="form-control" /></div>
        </div>
        <div class="row">
            <div class="col-md-offset-2 col-md-10"><span class="small">* Fill either Href or IP:Port/Part</span></div>
        </div>
        <div class="form-group">
            <div class="col-md-2"><label for="icon" class="form-label">Icon (Optional)</label></div>
            <div class="col-md-5"><input type="text" name="icon" value="{{$link->icon}}" class="form-control" /></div>
        </div>
        <div class="form-group">
            <div class="col-md-offset-2 col-md-2"><input type="submit" value="Add" class="form-control" /></div>
        </div>
    </form>
    </div>
</div>
@endsection
