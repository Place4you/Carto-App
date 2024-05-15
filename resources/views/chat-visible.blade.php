<x-layout>
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
  
      <!-- chat feature begins -->
      <div id="chat-wrapper" class="chat-wrapper shadow border-top border-left border-right chat--visible">
        <div class="chat-title-bar">
          Chat <span class="chat-title-bar-close"><i class="fas fa-times-circle"></i></span>
        </div>
        <div id="chat" class="chat-log">
          <!-- template for your own message -->
          <div class="chat-self">
            <div class="chat-message">
              <div class="chat-message-inner">Hello, how are you?</div>
            </div>
            <img class="chat-avatar avatar-tiny" src="https://gravatar.com/avatar/f64fc44c03a8a7eb1d52502950879659?s=128" />
          </div>
          <!-- end template-->
  
          <!-- template for messages from others -->
          <div class="chat-other">
            <a href="#"><img class="avatar-tiny" src="https://gravatar.com/avatar/b9216295c1e3931655bae6574ac0e4c2?s=128" /></a>
            <div class="chat-message">
              <div class="chat-message-inner">
                <a href="#"><strong>barksalot:</strong></a>
                I am doing well. How about you?
              </div>
            </div>
          </div>
          <!-- end template-->
        </div>
  
        <form id="chatForm" class="chat-form border-top">
          <input type="text" class="chat-field" id="chatField" placeholder="Type a message…" autocomplete="off" />
        </form>
      </div>
      <!-- chat feature ends -->
  
</x-layout>