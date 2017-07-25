var postId = 0;
var postBodyElement = null;

function editPost(body) {
    $('#edit-modal').modal();
    $('#post-body').val(body);
    postBodyElement = event.target.parentNode.parentNode.childNodes[1];
    postId = event.target.parentNode.parentNode.dataset['postid'];
}

function savePost() {
    $.ajax({
        method: 'POST',
        url: urlEdit,
        data: {body: $('#post-body').val(), post_id: postId, _token: token}
    }).done(function (msg) {
        $(postBodyElement).text(msg['new_body']);
        $('#edit-modal').modal('toggle');
    });
}

$(document).ready(function () {
    $('.like').on('click', function (event) {
        var isLike = event.target.previousElementSibling == null ? true : false;
        postId = event.target.parentNode.parentNode.dataset['postid'];
        $.ajax({
            method:'POST',
            url:urlLike,
            data:{isLike:isLike,postId:postId,_token:token}
        }).done(function () {
            event.target.innerText=isLike ? event.target.innerText=='Like'?'You like this post':'Like' : event.target.innerText=='Dislike'?'You don\'t like this post':'Dislike';
            if(isLike){
                event.target.nextElementSibling.innerText='Dislike';
            }else{
                event.target.previousElementSibling.innerText='Like';
            }
        })
    });
});
