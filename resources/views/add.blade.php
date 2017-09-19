@extends('layout.base')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Add Link</div>
    <div class="panel-body">
    <form method="post" action="add.php" class="form-horizontal">
        <div class="form-group">
            <div class="col-md-2"><label for="key" class="form-label">Key</label></div>
            <div class="col-md-3"><input type="text" name="key" class="form-control" /></div>
        </div>
        <div class="form-group">
            <div class="col-md-2"><label for="title" class="form-label">Title</label></div>
            <div class="col-md-5"><input type="text" name="title" class="form-control" /></div>
        </div>
        <div class="form-group">
            <div class="col-md-2"><label for="href" class="form-label">Href *</label></div>
            <div class="col-md-5"><input type="text" name="href" class="form-control" /></div>
        </div>
        <div class="form-group">
            <div class="col-md-2"><label for="ip" class="form-label">IP *</label></div>
            <div class="col-md-2"><input type="text" name="ip" class="form-control" /></div>
        </div>
        <div class="form-group">
            <div class="col-md-2"><label for="port" class="form-label">Port *</label></div>
            <div class="col-md-3"><input type="text" name="port" class="form-control" /></div>
        </div>
        <div class="form-group">
            <div class="col-md-2"><label for="part" class="form-label">Part *</label></div>
            <div class="col-md-3"><input type="text" name="part" class="form-control" /></div>
        </div>
        <div class="row">
            <div class="col-md-offset-2 col-md-10"><span class="small">* Fill either Href or IP:Port/Part</span></div>
        </div>
        <div class="form-group">
            <div class="col-md-2"><label for="icon" class="form-label">Icon (Optional)</label></div>
            <div class="col-md-5"><input type="text" name="icon" class="form-control" /></div>
        </div>
        <div class="form-group">
            <div class="col-md-offset-2 col-md-2"><input type="submit" value="Add" class="form-control" /></div>
        </div>
    </form>
    </div>
</div>
@endsection
