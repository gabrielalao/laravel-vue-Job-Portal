@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            @if(Session::has('message'))
                <div class="alert alert-success">
                   {{Session::get('message')}}
                </div>
            @endif

            <div class="card">
            <div class="card-header">{{$job->title}}</div>
                <div class="card-body">
                    <p>
                        <h3>Description</h3>
                        {{$job->description}}
                    </p>
                    <p>
                        <h3>Duties</h3>
                        {{$job->roles}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Short Info</div>
                <div class="card-body">
                <p>Company:<a href="{{route('company.index', [$job->company->id,$job->company->slug])}}">{{$job->company->cname}}</a></p>
                <p>Address:{{$job->address}}</p>
                <p>Employment Type:{{$job->type}}</p>
                <p>Position:{{$job->position}}</p>
                <p>Date:{{$job->created_at->diffForHumans()}}</p>
                </div>
            </div>
            <br>
            @if(Auth::check()&&Auth::user()->user_type='seeker')
            @if(!$job->checkApplication())
                <!-- use vue.js -->
                <apply-component jobid={{$job->id}}></apply-component>
                <!-- form action ="{{route('apply',[$job->id])}}" method="POST">@csrf
                    <button type="submit" class ="btn btn-success" style="width: 100%;">Apply</button>
                </form -->
            @endif
            @endif
        </div>
    </div>
</div>
@endsection
