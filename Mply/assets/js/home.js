$(document).ready(function(){
    $('.company').click(function(e) {
        // $('#exampleModal').modal();
        var name = $(this).attr('data-name');
        var email = $(this).attr('data-email');
        var add = $(this).attr('data-address');
        var id = $(this).attr('data-com');
        $('.modal-title').text(name);
        $('#email').text(email);
        $('#address').text(add);
        //modal.find('.modal-body input').val(recipient)
        $('#exampleModal').modal();
        $('.btn-view').attr("href","http://localhost/Mply/applicant/company/" + id);
    });

    $('#btn-login').click(function(e) {
        e.preventDefault();
        if ($('.nav-link-user').hasClass('active')) {
            $.ajax({
                type: 'POST',
                data: { username: $("input[name='username']").val(), pwd: $("input[name='pwd']").val() },
                url: "http://localhost/Mply/home/login_user",
                success: function(data) {
                    console.log(data)
                    if (data == 1) {
                        window.location.href = "http://localhost/Mply/applicant";
                    }
                }
            })
        }
        if($('.nav-link-company').hasClass('active')) {
            $.ajax({
                type: 'POST',
                data: { username: $("input[name='username']").val(), pwd: $("input[name='pwd']").val() },
                url: "http://localhost/Mply/home/login_company",
                success: function(data) {
                    console.log(data)
                    if (data == 1) {
                        window.location.href = "http://localhost/Mply/company";
                    }
                }
            })
        }
    });
})