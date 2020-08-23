@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <hi>Recent Jobs</hi>
        <table class="table">
            <thread>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </thread>
            <tbody>
                @foreach($jobs as $job)
                    <tr>
                        <td><img src="{{asset('avatar/man.jpg')}}" width="80"></td>
                        <td>Position:{{$job->position}}
                            <br>
                            <i class ="fa fa-clock-o" aria-hidden="true"></i>&nbsp;{{$job->type}}
                        </td>
                    <td><i class ="fa fa-map-marker" aria-hidden="true"></i>&nbsp;Address:{{$job->address}}</td>
                    <td><i class ="fa fa-globe" aria-hidden="true"></i>&nbsp;Date:{{$job->created_at->diffForHumans()}}</td>
                    <td><a href="{{route('jobs.show', [$job->id, $job->slug])}}"><button class="btn btn-success btn-ssm">Apply</button></a></td>
                    </tr>
                @endforeach

                <!--@for($i=0; $i<10; $i++)
                <tr>
                    <td><img src="{{asset('avatar/man.jpg')}}" width="80"></td>
                    <td>Position:web developer
                        <br>
                        <i class ="fa fa-clock-o" aria-hidden="true"></i>&nbsp;fulltime
                    </td>

                    <td><i class ="fa fa-map-marker" aria-hidden="true"></i>&nbsp;Address:sydney</td>
                    <td><i class ="fa fa-globe" aria-hidden="true"></i>&nbsp;Date:2019-06-07</td>
                    <td><button class="btn btn-success btn-ssm">Apply</button></td>
                </tr>
                @endfor
                -->
            </tbody>
        </table>
    </div>
</div>
@endsection
<style>
.fa{
    color:#4183D7;
}
</style>
