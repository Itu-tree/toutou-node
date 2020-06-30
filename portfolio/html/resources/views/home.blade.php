@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card mb-3">
            <div class="card-header">Dashboard</div>
            <table class="table table-bordered mb-0">
                <tbody>
                    <tr>
                        <td>name</td>
                        <td>{{$user->name}}</td>
                    </tr>
                    <tr>
                        <td>email</td>
                        <td>{{$user->email}}</td>
                    </tr>
                    <tr>
                        <td>token</td>
                        <td>{{$user->api_token}}</td>
                    </tr>
                    <tr>
                        <td>tracking</td>
                        <td> <a href="{{ route('player-transform') }}">tracking</a></td>
                    </tr>
                    <tr>
                        <td>記事管理</td>
                        <td> <a href="{{ route('admin.article.manage') }}">tracking</a></td>
                    </tr>

                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection