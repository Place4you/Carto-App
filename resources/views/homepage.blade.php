<x-layout>
    <div class="container py-md-3 ">
        <div class="row align-items-center">
          <div class="col-lg-7 py-3 py-md-5">
            <h1 class="display-3">Wanna Drive into <span style="font-family: 'Arial'; font-weight: bold;">Engaging</span> Conversations?</h1>
            <p class="lead text-muted">Tired of the usual short updates and generic shares? <br /> Welcome to our vibrant <span style="font-family: 'Arial'; font-weight: bold;">Car</span>  community, where enthusiasts connect through meaningful discussions and personalized posts.<br /><span class="font-italic"> Join us and rediscover the joy of genuine interaction on our car-centric social platform.</span></p>
          </div>
          <!-- User Registration Form -->
          <div class="col-lg-5 pl-lg-5 pb-3 py-lg-5">
            <form action="/register" method="POST" id="registration-form">
                        <!-- csrf IS Attacked protection Directive -->
              @csrf
              <div class="form-group">
                <label for="username-register" class="text-muted mb-1"><small>Username</small></label>
                <input value="{{old("username")}}" name="username" id="username-register" class="form-control" type="text" placeholder="Pick a username" autocomplete="off" />
                
                {{-- Showing error message on validation --}}
                @error('username')
                <p class="alert alert-danger m-0">{{ $message }}</p>
                @enderror
              </div>
  
              <div class="form-group">
                <label for="email-register" class="text-muted mb-1"><small>Email</small></label>
                <input value="{{old("email")}}" name="email" id="email-register" class="form-control" type="text" placeholder="you@example.com" autocomplete="off" />

                {{-- Showing error message on validation --}}
                @error('email')
                <p class="alert alert-danger m-0">{{ $message }}</p>
                @enderror
              
              </div>
  
              <div class="form-group">
                <label for="password-register" class="text-muted mb-1"><small>Password</small></label>
                <input name="password" id="password-register" class="form-control" type="password" placeholder="Create a password" />
                {{-- Showing error message on validation --}}
                @error('password')
                <p class="alert alert-danger m-0">{{ $message }}</p>
                @enderror
              </div>
  
              <div class="form-group">
                <label for="password-register-confirm" class="text-muted mb-1"><small>Confirm Password</small></label>
                <input name="password_confirmation" id="password-register-confirm" class="form-control" type="password" placeholder="Confirm password" />
              </div>
  
              <button type="submit" class="py-3 mt-4 btn btn-lg btn-block btn-primary" style="">Sign up for OurApp</button>
            </form>
          </div>
        </div>
      </div>
</x-layout>