@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-2 col-xs-12">
                @if($userRoles==1)
                    @include('nav/admin')
                @elseif($userRoles==2)
                    @include('nav/hr')
                @elseif($userRoles==0)
                    @include('nav/user')
                @endif
            </div>
            <div class="col-lg-10 col-md-10 col-xs-12">
                <div class="row" style="margin-top: 10px">
                    <div class="col-lg-12 col-md-12 col-xs-12">
                        @include('log/logList')
                    </div>
                    <div class="col-lg-12 col-md-12 col-xs-12">
                        <div style="float: right">
                            {{$logs->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection