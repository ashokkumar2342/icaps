@extends('front.layout.main')
@section('content')
        <!-- ============================================== HEADER ============================================== -->


<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="{{ route('front.home') }}">Home</a></li>
                <li class='active'>Login</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content">
    <div class="container">
      
        <div class="sign-in-page col-md-4 col-sm-4 col-md-offset-4">
            <div class="row">
                <!-- Sign-in -->            
                <div class="col-md-12 sign-in">
                
                    <h4 class="">Sign in <span style="font-size: 0.7em" class="pull-right">Don't have an account ?<a href="{{route('user.register.form')}}">Click Here</a></span></h4>
                    
                    {!!Form::open(['route'=>'user.login.post','class'=>'register-form outer-top-xs','role'=>'form'])!!}
                        <div class="form-group">
                            {!! Form::hidden('referrer', Request::get('referrer') , []) !!}
                            {!!form::text('username','',['class'=>'form-control unicase-form-control text-input','placeholder'=>'Mobile / Customer Id / Email id', 'autofocus'])!!}
                            <div class="text-danger">{!!$errors->first('username')!!}</div>
                        </div>
                        <div class="form-group">
                     
                            {!!form::password('password',['class'=>'form-control unicase-form-control text-input','placeholder'=>'Password', 'autofocus'])!!}
                            <div class="text-danger">{{$errors->first('password')}}</div>
                        </div>
                        <div class="radio outer-xs">
                            <label>
                                <input type="checkbox" name="remember" id="optionsRadios2" value="option2">Remember me!
                            </label>
                            <a href="{{ route('password.reset.form') }}" data-toggle="modal" class="forgot-password pull-right">Forgot your Password ?</a>  
                            
                        </div>
                        
                            <button class="btn-upper btn-block btn btn-primary checkout-page-button" type="submit">LOGIN</button>

                    {!!Form::close()!!} 
                    
                    
                </div>
                <!-- Sign-in -->
    
             </div><!-- /.row -->
        </div><!-- /.sigin-in-page-->

    </div><!-- /.container -->
    <div class="clearfix"><br><br></div>
</div><!-- /.body-content -->

@endsection