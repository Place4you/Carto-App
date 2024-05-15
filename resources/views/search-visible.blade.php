<x-layout>
    <body>
        <header class="header-bar mb-3">
          <div class="container d-flex flex-column flex-md-row align-items-center p-3">
            <h4 class="my-0 mr-md-auto font-weight-normal"><a href="/" class="text-white">OurApp</a></h4>
            <div class="flex-row my-3 my-md-0">
              <a href="#" class="text-white mr-2 header-search-icon" title="Search" data-toggle="tooltip" data-placement="bottom"><i class="fas fa-search"></i></a>
              <span class="text-white mr-2 header-chat-icon" title="Chat" data-toggle="tooltip" data-placement="bottom"><i class="fas fa-comment"></i></span>
              <a href="#" class="mr-2"><img title="My Profile" data-toggle="tooltip" data-placement="bottom" style="width: 32px; height: 32px; border-radius: 16px" src="https://gravatar.com/avatar/f64fc44c03a8a7eb1d52502950879659?s=128" /></a>
              <a class="btn btn-sm btn-success mr-2" href="#">Create Post</a>
              <form action="#" method="POST" class="d-inline">
                <button class="btn btn-sm btn-secondary">Sign Out</button>
              </form>
            </div>
          </div>
        </header>
        <!-- header ends here -->
    
        <div class="container py-md-5 container--narrow">
          <h2 class="text-center mb-4">The Latest From Those You Follow</h2>
          <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action">
              <img class="avatar-tiny" src="https://gravatar.com/avatar/f64fc44c03a8a7eb1d52502950879659?s=128" />
              <strong>Example Post #1</strong>
              <span class="text-muted small">by kittydoe on 1/3/2019</span>
            </a>
            <a href="#" class="list-group-item list-group-item-action">
              <img class="avatar-tiny" src="https://gravatar.com/avatar/b9216295c1e3931655bae6574ac0e4c2?s=128" />
              <strong>Example Post #2</strong>
              <span class="text-muted small">by barksalot on 1/3/2019</span>
            </a>
            <a href="#" class="list-group-item list-group-item-action">
              <img class="avatar-tiny" src="https://gravatar.com/avatar/f64fc44c03a8a7eb1d52502950879659?s=128" />
              <strong>Example Post #3</strong>
              <span class="text-muted small">by kittydoe on 1/3/2019</span>
            </a>
            <a href="#" class="list-group-item list-group-item-action">
              <img class="avatar-tiny" src="https://gravatar.com/avatar/b9216295c1e3931655bae6574ac0e4c2?s=128" />
              <strong>Example Post #4</strong>
              <span class="text-muted small">by barksalot on 1/3/2019</span>
            </a>
          </div>
        </div>
    
        <!-- footer begins -->
        <footer class="border-top text-center small text-muted py-3">
          <p class="m-0">Copyright &copy; 2022 <a href="/" class="text-muted">OurApp</a>. All rights reserved.</p>
        </footer>
    
        <!-- search feature begins -->
        <div class="search-overlay search-overlay--visible">
          <div class="search-overlay-top shadow-sm">
            <div class="container container--narrow">
              <label for="live-search-field" class="search-overlay-icon"><i class="fas fa-search"></i></label>
              <input type="text" id="live-search-field" class="live-search-field" placeholder="What are you interested in?" />
              <span class="close-live-search"><i class="fas fa-times-circle"></i></span>
            </div>
          </div>
    
          <div class="search-overlay-bottom">
            <div class="container container--narrow py-3">
              <div class="circle-loader"></div>
              <div class="live-search-results live-search-results--visible">
                <div class="list-group shadow-sm">
                  <div class="list-group-item active"><strong>Search Results</strong> (4 items found)</div>
    
                  <a href="#" class="list-group-item list-group-item-action">
                    <img class="avatar-tiny" src="https://gravatar.com/avatar/b9216295c1e3931655bae6574ac0e4c2?s=128" /> <strong>Example Post #1</strong>
                    <span class="text-muted small">by barksalot on 0/14/2019</span>
                  </a>
                  <a href="#" class="list-group-item list-group-item-action">
                    <img class="avatar-tiny" src="https://gravatar.com/avatar/b9408a09298632b5151200f3449434ef?s=128" /> <strong>Example Post #2</strong>
                    <span class="text-muted small">by brad on 0/12/2019</span>
                  </a>
                  <a href="#" class="list-group-item list-group-item-action">
                    <img class="avatar-tiny" src="https://gravatar.com/avatar/b9216295c1e3931655bae6574ac0e4c2?s=128" /> <strong>Example Post #3</strong>
                    <span class="text-muted small">by barksalot on 0/14/2019</span>
                  </a>
                  <a href="#" class="list-group-item list-group-item-action">
                    <img class="avatar-tiny" src="https://gravatar.com/avatar/b9408a09298632b5151200f3449434ef?s=128" /> <strong>Example Post #4</strong>
                    <span class="text-muted small">by brad on 0/12/2019</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- search feature end -->
    
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script>
          $('[data-toggle="tooltip"]').tooltip()
        </script>
      </body>
</x-layout>