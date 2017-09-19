@extends('layout.base')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-8 h3">Links</div>
            <div class="col-md-4 text-right"><a href="add.php"><span class="glyphicon glyphicon-plus"></span></a></div>
        </div>
    </div>
    <div class="panel-body">
        <table class="table table-striped">
        <thead>
            <tr>
                <th>Title</th>
                <th>Href</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($links as $key => $link)
            <tr>
                <td>
                    @if ($link->icon != null)
                    <img src="{{$link->icon}}" class="icon-16" />
                    @endif
                    {{$link->title}}
                </td>
                <td><a href="{{$link->href}}">{{$link->href}}</a></td>
                <td class="text-right">
                    <a href="edit.php?link={{$key}}"><span class="glyphicon glyphicon-edit"></span></a>
                    <a href="delete.php?link={{$key}}"><span class="glyphicon glyphicon-remove"></span></a>
                </td>
            </tr>
        @endforeach
        </tbody>
        </table>
    </div>
</div>
@endsection
