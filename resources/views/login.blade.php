<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
              <section class="main-section">
                  <!-- Add Your Content Inside -->
                  <div class="content">
                      <!-- Remove This Before You Start -->
                      <h1>Anak IT -  Login</h1>
                      <hr>
                      @if(\Session::has('alert'))
                          <div class="alert alert-danger">
                              <div>{{Session::get('alert')}}</div>
                          </div>
                      @endif
                      @if(\Session::has('alert-success'))
                          <div class="alert alert-success">
                              <div>{{Session::get('alert-success')}}</div>
                          </div>
                      @endif
                      <form action="{{ url('/login') }}" method="post">
                          {{ csrf_field() }}
                          <div class="form-group">
                              <label for="email">Email:</label>
                              <input type="email" class="form-control" id="email" name="email">
                          </div>
                          <div class="form-group">
                              <label for="alamat">Password:</label>
                              <input type="password" class="form-control" id="password" name="password"></input>
                          </div>
                          <div class="form-group">
                              <button type="submit" class="btn btn-md btn-primary">Login</button>
                              <a href="{{url('register')}}" class="btn btn-md btn-warning">Register</a>
                          </div>
                      </form>
                  </div>
                  <!-- /.content -->
              </section>
            </div>
        </div>
    </body>
</html>
