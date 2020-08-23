@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
                <img src="{{asset('avatar/man.jpg')}}" width="100" style="width: 100%;">

        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Update Your Profile</div>
                    <form action="{{route('profile.create')}}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" class="form-control" name="address" >
                            @if($errors->has('address'))
                                <div class="error" style="color: red;">{{$errors->first('address')}}</div>
                            @endif

                        </div>
                        <!--div class="form-group">
                            <label for="">Phone number</label>
                            <input type="text" class="form-control" name="phone_number" >
                            @if($errors->has('phone_number'))
                                <div class="error" style="color: red;">{{$errors->first('phone_number')}}</div>
                            @endif
                        </div-->

                        <div class="form-group">
                            <label for="">Experience</label>
                            <textarea name="experience" class="form-control"></textarea>
                            @if($errors->has('experience'))
                                <div class="error" style="color: red;">{{$errors->first('experience')}}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="">Bio</label>
                            <textarea name="bio" class="form-control"></textarea>
                            @if($errors->has('bio'))
                                <div class="error" style="color: red;">{{$errors->first('bio')}}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <button class="btn btn-success" type="submit">Update</button>
                        </div>

                    </div>
                </div>
                <!-- return redirect()->back()->with('message','Profile Sucessfully Updated!');-->
                @if(Session::has('message'))
                 <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
            @endif
            </div>
        </form>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">About you</div>
                    <div class="card-body">
                        <p>Name:</p>
                        <p>Email:</p>
                        <p>Address:</p>

                    </div>
                </div>

            <div class="card">
                <div class="card-header">Update coverletter</div>
                    <div class="card-body">
                        <input type="file" class="form-control" name="cover_letter"><br>
                        <button class="btn btn-success float-right" type="submit">Update</button>
                        @if($errors->has('cover_letter'))
                            <div class="error" style="color: red;">{{$errors->first('cover_letter')}}</div>
                        @endif
                    </div>
                </div>

            <div class="card">
                <div class="card-header">Update resume</div>
                    <div class="card-body">
                        <input type="file" class="form-control" name="resume">
                        <br>
                        <button class="btn btn-success float-right" type="submit">Update</button>
                        @if($errors->has('resume'))
                            <div class="error" style="color: red;">{{$errors->first('resume')}}</div>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

