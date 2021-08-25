@extends('layouts.admin-layout')

@section('content')

@include('inc.dashboard')


<div class="table-responsive">
    <table id="example2" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>User</th>
                <th>Url</th>
                <th>Stats</th>
                <th>Status</th>
                <th>Created On</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($links as $item)
            <tr>
                <th></th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td width="20">
                    <a href="{{ url('delete/link', ['id'=>1]) }}" class="btn btn-sm btn-danger"><i class="bx bx-trash"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
