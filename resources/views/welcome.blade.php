<!DOCTYPE html>
<html lang="en">
  <head>
    <link href='//fonts.googleapis.com/css?family=Oswald:400,300|Source+Sans+Pro:400,300' rel='stylesheet' type='text/css'>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Twilio Chat</title>
    <!-- CSS -->
    <link rel="stylesheet"
          href="//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/twiliochat.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    {{-- <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script> --}}
    <script src="{{ asset('js/popper.js') }}"></script>

  </head>
  <body>
    <div class="container-fluid" >
      <div class="row">

        <nav class="col-12 navbar navbar-expand-lg navbar-light bg-light">


            <div class="col-sm-4"></div>
            <div class="col-sm-2">
            <button data-toggle="modal" data-target="#login_modal" class="btn btn-outline-success my-2 my-sm-0" type="button">
                Login
            </button>

            </div>
            <div class="col-sm-1"></div>
            <div class="col-sm-2">
            <button data-toggle="modal" data-target="#register_modal" class="btn btn-outline-success my-2 my-sm-0" type="button">
                Register
            </button>


        </nav>


        </div>
          <div id="status-row" class="row disconnected">
            <div class="col-md-5 left-align">
              <span id="delete-channel-span"><b>Delete current channel</b></span>
            </div>
            <div class="col-md-7 right-align">
              <span id="status-span">Connected as <b><span id="username-span"></span></b></span>
              <span id="leave-span"><b>x Leave</b></span>
            </div>
          </div>
        </div>
      </div>
      <div id="container" class="row">
        <div id="channel-panel" class="col-md-offset-2 col-md-2">
          <div id="channel-list" class="row not-showing"></div>
          <div id="new-channel-input-row" class="row not-showing">
            <textarea placeholder="Type channel name" id="new-channel-input" rows="1" maxlength="20" class="channel-element"></textarea>
          </div>
          <div class="row">
            <img id="add-channel-image" src="{{ asset('img/add-channel-image.png') }}"/>
          </div>
        </div>
        <div id="chat-window" class="col-md-4 with-shadow">
          <div id="message-list" class="row disconnected"></div>
          <div id="typing-row" class="row disconnected">
            <p id="typing-placeholder"></p>
          </div>
          <div id="input-div" class="row">
            <textarea id="input-text" disabled="true" placeholder="   Your message"></textarea>
          </div>
          <div id="connect-panel" class="disconnected row with-shadow">
            <div class="row">
              <div class="col-md-12">
                <label for="username-input">Username: </label>
                <input id="username-input" type="text" placeholder="username"/>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <img id="connect-image" src="{{ asset('img/connect-image.png') }}"/>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- HTML Templates -->

    {{-- modals --}}






    <div class="modal fade" id="login_modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Login</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Name</label>
                      <input type="text" class="form-control" id="name" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email</label>
                      <input type="email" class="form-control" id="email" placeholder="Enter Email">
                      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control" id="password" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" id="login">Save changes</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>


    {{--  --}}

        {{-- modals --}}

        <div class="modal fade" id="register_modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Register</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Name</label>
                          <input type="text" class="form-control" id="reg_name" placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Email</label>
                          <input type="email" class="form-control" value="" id="reg_email" placeholder="Enter Email">
                          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Password</label>
                          <input type="password" class="form-control" id="reg_pass" placeholder="Password">
                        </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary" id="register">Save changes</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>


        {{--  --}}

    <script>
        console.log("hello")
        var register = document.querySelector('#register').addEventListener('click',function(){
            console.log("hello")
        })
        var input = document.getElementById("reg_email");
        var email = document.querySelector('#reg_email');
        console.log(email)
        console.log(input.value)
        $("#register").click(function() {
            console.log("hello")
            console.log($('#reg_email').val())

            $.post('api/register',{name: $('#reg_name').val(),email:$('#reg_email').val() ,password:$('#reg_pass').val()})
            .done(function(response) {
              console.log(response.success.id)
              $.post('api/token',{identity:'24'})
              .done(function(resp){
                console.log(resp.token)
                $.post('api/createUser',{token:resp.token})
                .done(function(res){
                  console.log(res)
                })
                .fail(function(err) {
                  console.log('Failed to fetch the Access Token with error: ' + err);
                });
              })
              .fail(function(erro) {
                console.log('Failed to fetch the Access Token with error: ' + erro);
              });


            })
            .fail(function(error) {
              console.log('Failed to fetch the Access Token with error: ' + error);
            });
        });
    </script>


    <script type="text/html" id="message-template">
      <div class="row no-margin">
        <div class="row no-margin message-info-row" style="">
          <div class="col-md-8 left-align"><p data-content="username" class="message-username"></p></div>
          <div class="col-md-4 right-align"><span data-content="date" class="message-date"></span></div>
        </div>
        <div class="row no-margin message-content-row">
          <div style="" class="col-md-12"><p data-content="body" class="message-body"></p></div>
        </div>
      </div>
    </script>
    <script type="text/html" id="channel-template">
      <div class="col-md-12">
        <p class="channel-element" data-content="channelName"></p>
      </div>
    </script>
    <script type="text/html" id="member-notification-template">
      <p class="member-status" data-content="status"></p>
    </script>
    <!-- JavaScript -->
    <script src="//code.jquery.com/jquery-2.2.0.min.js"></script>
    <script src="{{ asset('js/vendor/jquery-throttle.min.js') }}"></script>
    <script src="{{ asset('js/vendor/jquery.loadTemplate-1.4.4.min.js') }}"></script>
    {{-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> --}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.1/moment.min.js"></script>
    <!-- Twilio Common helpers and Twilio Chat JavaScript libs from CDN. -->
    <script src="//media.twiliocdn.com/sdk/js/common/v0.1/twilio-common.min.js"></script>
    <script src="//media.twiliocdn.com/sdk/js/chat/v3.0/twilio-chat.min.js"></script>
    <script src="{{ asset('js/twiliochat.js') }}"></script>
    <script src="{{ asset('js/dateformatter.js') }}"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>




  </body>
</html>
