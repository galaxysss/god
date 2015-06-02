
$(document).ready(function () {

    $('#commentButton').click(function(){
        ajaxJson({
            url: '/comment',
            data: $('#comment-form').serializeArray(),
            success: function(ret) {

            }
        });
    });

});