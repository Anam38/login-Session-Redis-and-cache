<section class="main-section">
        <!-- Add Your Content Inside -->
        <div class="content">
            <!-- Remove This Before You Start -->
            <h1>Anak IT -  Tutorial Login, Register, Validasi dengan Laravel 5.4</h1>
            <p>Hallo, {{Cache::get('name')}}. Apakabar?</p>

            <h2>* Email kamu : {{Cache::get('email')}}</h2>
            <h2>* Status Login : {{Cache::get('login')}}</h2>
            <a href="{{route('logout')}}" class="btn btn-primary btn-lg">Logout</a>

        </div>
        <!-- /.content -->
    </section>
