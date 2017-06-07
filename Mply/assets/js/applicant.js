$(document).ready(function() {
    $(".button-collapse").sideNav();
    var el = document.querySelector('.custom-scrollbar');
    Ps.initialize(el);

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
});