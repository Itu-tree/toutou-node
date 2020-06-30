@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div id="chart" user_id={{ $user->id }}></div>
        <div class="card mb-3">
            <div class="card-header">Dashboard
                <form method="post" action="{{ route('delete.player-transform') }}">
                    {{ csrf_field() }}
                    <input type="submit" value="削除" class="btn btn-danger btn-sm" onclick='return confirm("削除しますか？");'>
                </form>
            </div>

            <table class="table table-bordered mb-0">
                <tbody>
                    @foreach($player_transforms as $player_transform)
                    <tr>
                        <td>transform</td>
                        <td>{{$player_transform->transform}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection