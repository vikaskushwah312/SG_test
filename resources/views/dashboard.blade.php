@extends('master')

@section('css')
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<style type="text/css">
.bg-info,.bg-warning, .bg-info>a {
    color: #fff!important;
}
.small-box {
    border-radius: .25rem;
    box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);
    display: block;
    margin-bottom: 20px;
    position: relative;
}
.small-box>.inner {
    padding: 25px;
}

.col-lg-3 .small-box h3, .col-md-3 .small-box h3, .col-xl-3 .small-box h3 {
    font-size: 2.2rem;
}
.small-box .icon>i {
    font-size: 90px;
    position: absolute;
    right: 15px;
    top: 15px;
    transition: all .3s linear;
    color: #fff!important;
}
.small-box .icon {
    color: rgba(0,0,0,.15);
    z-index: 0;
}
.box-height{
    height: 80px;
}
.h3head{
    margin-top: 12px;
    color: #fff!important;
}
.inner.box-height P {
    color: #fff!important;
}
</style>

@endsection
@section('content')
<div class="py-5 bg-light">
    <div class="container">
        <div class="row">
          @foreach($user_info as $key=> $user)
            <div class="col-lg-4">
                <div class="small-box bg-info">
                  <div class="inner box-height">
                    <h3 class="h3head">{{$user->total}}</h3>
                    <p>{{$user->name}}</p>
                  </div>
                  <div class="icon box-height">
                    <i class="ion ion-stats-bars"></i>
                  </div>
                </div>
            </div>
          @endforeach

        </div>
    </div>
</div>
@endsection
