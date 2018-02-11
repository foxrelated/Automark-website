


$(document).ready(function(){
    $('#btnChatWith').click(btnChatWithClicked);
});

btnChatWithClicked = function(e){
    e.preventDefault();
    var toUserId = $(this).attr('data-to-id');
    var fromUserId = $(this).attr('data-from-id');

    console.log(toUserId);
    jqac.arrowchat.chatWith(toUserId);
}