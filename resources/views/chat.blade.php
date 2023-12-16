<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ChatApp</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('/css/chat.css') }}">
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>
  
      // Enable pusher logging - don't include this in production
      Pusher.logToConsole = true;
  
      var pusher = new Pusher('0690a87dbd2de09aaeae', {
        cluster: 'ap2'
      });
  
      
    </script>
</head>

<body>
    <div class="container content">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-8 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header">Chat</div>
                    <div class="card-body height3">
                        <ul class="chat-list" id="chat-section">
                         
                        </ul>
                        
                    </div>
                </div>
                <div class="row mt-3 justify-content-between">
                  <div class="col-lg-10">
                    <input type="text" id="username"  value="{{ $username }}" hidden>
                    <input type="text" class="form-control" placeholder="Wrtie message here..." id="chat_message">
                    
                  </div>
                  <div class="col-lg-2 justify-content-center">
                    <button class="btn btn-primary rounded w-100" onclick="broadastMethod()">Send</button>
                  </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
  var channel = pusher.subscribe('message');
      channel.bind('new_chat', function(data) {
        username=$("#username").val();
        if(data.username==username){

          newMsg=` <li class="out">
                              <div class="chat-img">
                                  <img alt="Avtar" src="https://bootdey.com/img/Content/avatar/avatar1.png">
                              </div>
                              <div class="chat-body">
                                  <div class="chat-message">
                                      <h5>${data.username}</h5>
                                      <p>${data.msg}</p>
                                  </div>
                              </div>
                          </li>`;
        }else{
          newMsg=` <li class="in">
                              <div class="chat-img">
                                  <img alt="Avtar" src="https://bootdey.com/img/Content/avatar/avatar1.png">
                              </div>
                              <div class="chat-body">
                                  <div class="chat-message">
                                      <h5>${data.username}</h5>
                                      <p>${data.msg}</p>
                                  </div>
                              </div>
                          </li>`;
        }
        $("#chat-section").append(newMsg)
      });

      function broadastMethod(){
        username=$("#username").val();
        msg=$("#chat_message").val();
        $.ajax({
          headers : {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
          },
          url : '{{ route('fire.event') }}',
          type : 'POST',
          data : { username : username , message : msg},
          success : function(data){

          },
          error : function(error){

          }

        });
      }
</script>

</html>
