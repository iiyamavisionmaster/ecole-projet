function alert_msg(msg, type) {
    $(".section-admin").append('<div class="alert ' + type + '" id="' + type + '">\
        <button type="button" class="close" data-dismiss="alert">x</button>\
        ' + msg + '\
        </div>');
    $("." + type).fadeOut(4000);

};

function alert_notif(msg, type) {
    $(".notif").append('<div class="alert ' + type + '" id="' + type + '">\
        <button type="button" class="close close-notif" data-dismiss="alert">x</button>\
        ' + msg + '\
        </div>');

};

function test_email(domelem) {
    if (!domelem.val().match(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i)) {
        alert_msg("veuillez entrer un email valide.", "alert-danger");
        return false;
    }
    return true;
};

//go-top button
var fixed = false;
$(document).scroll(function() {
    if ($(this).scrollTop() > 250) {
        if (!fixed) {
            fixed = true;
            $('#to-top').show("slow", function() {
                $('#to-top').css({
                    position: 'fixed',
                    display: 'block'
                });
            });
        }
    } else {
        if (fixed) {
            fixed = false;
            $('#to-top').hide("slow", function() {
                $('#to-top').css({
                    display: 'none'
                });
            });
        }
    }
});

$( "body" ).tooltip();

$(document).ready(function() {
 
});

