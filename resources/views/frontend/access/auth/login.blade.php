@extends('frontend/layouts.master')

@section('css')
    <!-- Bootstrap -->
    <link rel="stylesheet" href="/frontend/scripts/bootstrap/bootstrap.min.css">
    <!-- IonIcons -->
        <link rel="stylesheet" href="/frontend/scripts/ionicons/css/ionicons.min.css">
        <!-- Toast -->
        <link rel="stylesheet" href="/frontend/scripts/toast/jquery.toast.min.css">
        <!-- OwlCarousel -->
        <link rel="stylesheet" href="/frontend/scripts/owlcarousel/dist/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="/frontend/scripts/owlcarousel/dist/assets/owl.theme.default.min.css">
        <!-- Magnific Popup -->
        <link rel="stylesheet" href="/frontend/scripts/magnific-popup/dist/magnific-popup.css">
        <link rel="stylesheet" href="/frontend/scripts/sweetalert/dist/sweetalert.css">
        <!-- Custom style -->
        <link rel="stylesheet" href="/frontend/css/style.css">
        <link rel="stylesheet" href="/frontend/css/skins/all.css">
        <link rel="stylesheet" href="/frontend/css/demo.css">
@endsection


@section('content')



<section class="login first grey">
            <div class="container">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @if (session('warning'))
                    <div class="alert alert-warning">
                        {{ session('warning') }}
                    </div>
                @endif
                <div class="box-wrapper">               
                    <div class="box box-border">
                        <div class="box-body">
                            <h4>@lang('lables.login')</h4>
                            <form method="Post" action="{{ route('login') }}">
                                {{ csrf_field() }}
                                
                                <div class="form-group">
                                    <label for="email">@lang('lables.email')</label>
                                    <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                

                                <div class="form-group">
                                    <label class="fw">@lang('lables.password')</label>
                                    <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <div class="col-md-64 col-md-offset-0">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> @lang('lables.remember-me')
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-primary btn-block">@lang('lables.login')</button>
                                </div>

                                <div class="form-group text-center">
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        @lang('lables.forgot-password')
                                    </a>
                                </div>

                                <div class="form-group text-center">
                                     <span class="text-muted">@lang('lables.not-have-account')</span> <a href="/register">@lang('lables.register')</a>
                                </div>
                                
                                <div class="title-line">
                                    or
                                </div>
                <a href="#" class="btn btn-social btn-block facebook"><i class="ion-social-facebook"></i> @lang('lables.facebook-login')</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

@endsection

@section('scripts')
    <script src="/frontend/js/jquery.js"></script>
    <script src="/frontend/js/jquery.migrate.js"></script>
    <script src="/frontend/scripts/bootstrap/bootstrap.min.js"></script>
    <script>var $target_end=$(".best-of-the-week");</script>
    <script src="/frontend/scripts/jquery-number/jquery.number.min.js"></script>
    <script src="/frontend/scripts/owlcarousel/dist/owl.carousel.min.js"></script>
    <script src="/frontend/scripts/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
    <script src="/frontend/scripts/easescroll/jquery.easeScroll.js"></script>
    <script src="/frontend/scripts/sweetalert/dist/sweetalert.min.js"></script>
    <script src="/frontend/scripts/toast/jquery.toast.min.js"></script>
    <script src="/frontend/js/demo.js"></script>
    <script src="/frontend/js/e-magz.js"></script>
@endsection