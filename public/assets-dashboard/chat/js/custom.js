
$.ajaxSetup({
 headers:{
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
 }
});


$(document).ready(function(){
    $('.user-list').click(function(){

        $('#chat-container').html('');

            // Get the clicked user's data
            const userImage = $(this).find('.user-image').attr('src');
            const userName = $(this).text().trim();

            // Update the header content
            $('.header-user-image').attr('src', userImage);
            $('.header-user-name').text(userName);

        var gatUserId = $(this).attr('data-id');
        receiver_id = gatUserId;
          $('.start-head').hide();
          $('.chat-section').show();
          loadOldChats();
    });


    //save chat work

    $('#chat-form').submit(function(e){
        e.preventDefault();

        var message = $('#message').val();

        $.ajax({
            url:"/save-chat",
            type:"GET",
            data:{ sender_id:sender_id, receiver_id:receiver_id ,message:message},
            success:function(res){

                 if(res.success){
                    $('#message').val('');
                    let chat = res.data.message;
                    let html =`<div class="current-user-chat"><h5><span class="badge badge-primary">`+ chat +`</span></h5></div>`;

                    $('#chat-container').append(html);
                    scrollChat();

                 }else{
                     alert(res.msg)
                 }
            }
        })
    })
});



function loadOldChats(){

    $.ajax({
       url:"/load-chat",
       type:"get",
       data:{ sender_id:sender_id, receiver_id:receiver_id,sender_type:senderType,receiver_type:receiverType },

       success:function(res){
        if(res.success){
           $('#message').val('');
           let chats = res.data;
           let html ='';
           for(let i = 0; i < chats.length; i++){
            let addClass = '';
            if(chats[i].sender_id == sender_id && chats[i].sender_type == senderType ){
                addClass = 'current-user-chat';
                addBadge = 'badge badge-primary';
            }else{
                addClass = 'distance-user-chat';
                addBadge = 'badge badge-info';
            }
             html +=`<div class="`+addClass+`"><h5><span class="`+addBadge+`">`+ chats[i].message +`</span></h5></div>`;
           }


           $('#chat-container').append(html);
           scrollChat();

        }else{
            alert(res.msg)
        }
   }
    });
}

function scrollChat(){
    $('#chat-container').animate({
       scrollTop: $('#chat-container').offset().top + $('#chat-container')[0].scrollHeight
    },0);
}

document.addEventListener("DOMContentLoaded", function () {
    Pusher.logToConsole = true;
    var pusher = new Pusher('8f515ff98a989b9fa13b', {
        cluster: 'eu'
    });
    
    if (pusher) {
        // Subscribe to the private channel
        var channel = pusher.subscribe('chat');
        channel.bind('chat.message.sent', function (data) {
            var authid = sender_id;
            var authtype = senderType;
            var receiverId = receiver_id; 
             if (sender_id == data.receiverId && senderType == data.receiverType && receiver_id == data.senderId && receiverType == data.senderType) {
               let html = `<div class="distance-user-chat"><h5><span class="badge badge-info">`+data.message+`</span></h5></div>`;
               $('#chat-container').append(html);
               scrollChat();
            }
        });
    } else {
        console.error("❌ Pusher is not initialized.");
    }
});
