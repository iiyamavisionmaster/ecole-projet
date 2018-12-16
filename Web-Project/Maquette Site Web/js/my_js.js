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

function test_tel(domelem) {
    if (domelem.val().match(/[a-zA-Z\&\é\"\'\(\-\è\_\ç\à\)\=\^\$\*\ù\!\:\¨\£\µ\%\§\/\;\.\²\+"]/g)) {
        alert_msg("veuillez entrer un numero valide.", "alert-danger");
        domelem.val("");
        return false;
    } else if (domelem.val().length < 10) {
        alert_msg("veuillez entrer un nombre de chiffre valide.", "alert-danger");
        domelem.val("");
        return false;
    }
    return true;
};
//notification
$('body').on("click", ".close-notif", function(e) {
    $(".badge").text($(".badge").text() - 1);
});
//edit info
$("#edit-info").click(function(e) {
    e.preventDefault();
    var test_email_bool = true;
    var test_tel_bool = true;
    if ($("#info-perso #edit-info").text() == "Editer") {
        $("#info-perso input").each(function(index) {
            if (!$(this).is('[name="right"]'))
                $(this).removeAttr('readonly');
            $(this).val($(this).val());
        });
        $("#info-perso #edit-info").text("Sauvegarder");
    } else {
        test_email_bool = test_email($("#info-perso input[name='email']"));
        test_email_bool = test_tel($("#info-perso input[name='phone']"));
        if (test_email_bool == true && test_tel_bool == true) {
            $("#info-perso input").each(function(index) {
                $(this).attr('readonly', 'true');
                $("#info-perso #edit-info").text("Editer");
                $(this).val($(this).val());
            });
            alert_msg("Vos modifications ont été prises en compte.", "alert-success");
        }

    }
});

//edit all
$('body').on("click", ".edit", function(e) {
    e.preventDefault();
    if ($(this).text() == "Editer") {
        $(this).parent().find("input").each(function(index) {
            if (!$(this).is('[name="right"]') || !!$(this).is('[name="l-f"]'))
                $(this).removeAttr('readonly');

            $(this).val($(this).val());
        });
        $(this).text("Sauvegarder");
    } else {
        $(this).parent().find("input").each(function(index) {
            $(this).attr('readonly', 'true');
            $(this).text("Editer");
            $(this).val($(this).val());
        });
        $(this).text("Editer");
        alert_msg("Vos modifications ont été prises en compte.", "alert-success");
    }
});
//file download
$("#download1,#download2,#download3").click(function(e) {
    e.preventDefault();
    $(this).parent().find(".progress-bar").attr('aria-valuenow', '100').css("width", "100%").text("100%");

});
//remove ayant droit
$('body').on("click", ".supp", function(e) {
    e.preventDefault();
    $(this).parent().fadeOut();
});
//add ayant droit
$("#add").click(function(e) {
    e.preventDefault();
    $.get("a-r.html", function(data) {
        $("#a-r").append(data);
    });
});
//contact admin
$("#send").click(function(e) {
    e.preventDefault();
    if (test_email($(this).parent().find("input[name='email']"))) {
        alert_msg("Votre message a bien été envoyer", "alert-success");
    }
});
//search
$(".form-group-nav button").click(function(e) {
    e.preventDefault();
    alert("Vous avez cherchez :<" + $(this).parent().find("input").val() + ">");
});
/*Menu admin*/
$("#i-p").click(function(e) {
    e.preventDefault();
    $(".admin-active").hide();
    $("#info-perso").show('clip', { direction: 'vertical' }, 1000);
});
$("#no").click(function(e) {
    e.preventDefault();
    $(".admin-active").hide();
    $("#notif").show('clip', { direction: 'vertical' }, 1000);
});
$("#a-d").click(function(e) {
    e.preventDefault();
    $(".admin-active").hide();
    $("#ad").show('clip', { direction: 'vertical' }, 1000);
});
$("#i-b").click(function(e) {
    e.preventDefault();
    $(".admin-active").hide();
    $("#info-bank").show('clip', { direction: 'vertical' }, 1000);
});
$("#contact").click(function(e) {
    e.preventDefault();
    $(".admin-active").hide();
    $("#contacts").show('clip', { direction: 'vertical' }, 1000);
});
// Close the sidebar menu
$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#sidebar-wrapper").toggleClass("active");
});
// Opens the sidebar menu
$("#menu-close").click(function(e) {
    e.preventDefault();
    $("#sidebar-wrapper").toggleClass("active");
});
// Opens the sidebar menu
$("#goadmin").click(function(e) { 
    alert("Vous allez etre connecté");
});
// Opens the sidebar menu
$("#goacc").click(function(e) { 
    alert("Vous allez etre deconnecté");
});
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
//email verification call
$('body').on("focusout", "#email", function() {
    test_email($(this));
});
//tel verification call
$('body').on("focusout", "#tel", function() {
    test_tel($(this));

});
$( "body" ).tooltip();
$(document).ready(function() {
    $("#footer").load("footer.html");
    //ajout ayant droit et gestion admin
    var url= window.location.pathname.split("/");
    var page = url[2] ;
    if (page == "admin.html") {
        $.get("a-r.html", function (data) {
            $("#a-r").append(data);
        }); 
    } 
        $(".admin-active").hide();
        $("#notif").show('clip', { direction: 'vertical' }, 1000);
    //add nification
    alert_notif("Le 14 décembre, la BNP bénéficie d'une projection avant-première du nouveau Star Wars.Les places sont disponibles à l'achat sur la billetterie du CE.", "alert-info");
    alert_notif("Un voyage collectif est organisé : en Ouzbékistan. Des places sont encore disponibles.", "alert-info");
    alert_notif("Une colonie de vacances en Midi-Pyrénées a été réservée par le CE pour les enfants des salariés BNP Paribas et ses filiales.", "alert-info");
    alert_notif("Nouvelles conditions de remboursement des frais de garde pour vos enfants.", "alert-info");
    alert_notif("Vous avez des papiers a nous fournir", "alert-danger");
});