


$(document).ready(function(){
    $('#btnChatWith').click(btnChatWithClicked);
});

btnChatWithClicked = function(e){
    e.preventDefault();
    var toUserId = $(this).attr('data-to-id');
    jqac.arrowchat.chatWith(toUserId);
}