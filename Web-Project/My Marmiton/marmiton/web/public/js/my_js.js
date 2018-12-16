
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

$(function () {
    $('#my_form').on('submit', function (e) {
        e.preventDefault();
        var $form = $(this);
        var formdata = (window.FormData) ? new FormData($form[0]) : null;
        var data = (formdata !== null) ? formdata : $form.serialize();
        console.log(data);
        $.post({
            url: $form.attr('action'),
            type: $form.attr('method'),
            contentType: false,
            processData: false,
            data: data,
            success : function(data, statut){

                alert_msg(data, "alert-warning");

            },
            error : function(result, statut, error){
                console.log(error);
            }
        }); 
    });
    $('input:radio').change(
      function(){
        var $form = $('#rating');   

        var userRating = $(this).val(); 

        var articleId = $('#articleId').val();
        var userId = $('#userId').val();
        var posted = $('#posted').val();
        if (posted == "false") {
            $.post({
                url: $form.attr('action'),
                type: $form.attr('method'),
                data: {rate:userRating,articleId:articleId,userId:userId},
                success : function(data, statut){

                    console.log(data); 
                },
                error : function(result, statut, error){
                    console.log(error);
                }
            });
        }
        else{
            alert("Vous avez deja posté");
        } 
    });
});
//contact admin
$("#send").click(function(e) {
    e.preventDefault();
    if (test_email($(this).parent().find("input[name='email']"))) {
        alert_msg("Votre message a bien été envoyer", "alert-success");
    }
});
/*Menu admin*/
$("#info").click(function(e) {
    e.preventDefault();
    $(".admin-active").hide();
    $("#infoShow").show('clip', { direction: 'vertical' }, 1000);
});
$("#dashBoard").click(function(e) {
    e.preventDefault();
    $(".admin-active").hide();
    $("#dashBoardShow").show('clip', { direction: 'vertical' }, 1000);
});
$("#changePassword").click(function(e) {
    e.preventDefault();
    $(".admin-active").hide();
    $("#changePasswordShow").show('clip', { direction: 'vertical' }, 1000);
});
$("#postedItem").click(function(e) {
    e.preventDefault();
    $(".admin-active").hide();
    $("#postedItemShow").show('clip', { direction: 'vertical' }, 1000);
});
$("#postItem").click(function(e) {
    e.preventDefault();
    $(".admin-active").hide();
    $("#postItemShow").show('clip', { direction: 'vertical' }, 1000);
    $(".ui-helper-hidden-accessible").remove();
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
    $(".admin-active").hide();
    $("#dashBoardShow").show('clip', { direction: 'vertical' }, 1000);
    $(".stageHided").hide();


    //add nification
/*    alert_notif("Le 14 décembre, la BNP bénéficie d'une projection avant-première du nouveau Star Wars.Les places sont disponibles à l'achat sur la billetterie du CE.", "alert-info");
    alert_notif("Un voyage collectif est organisé : en Ouzbékistan. Des places sont encore disponibles.", "alert-info");
    alert_notif("Une colonie de vacances en Midi-Pyrénées a été réservée par le CE pour les enfants des salariés BNP Paribas et ses filiales.", "alert-info");
    alert_notif("Nouvelles conditions de remboursement des frais de garde pour vos enfants.", "alert-info");
    alert_notif("Vous avez des papiers a nous fournir", "alert-danger");
*/});

tinymce.init({
    forced_root_block : "div",
    selector: 'textarea',
    height: 100,
    theme: 'modern',
    plugins: [
    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc help'
    ],
    toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
    toolbar2: 'print preview media | forecolor backcolor emoticons | codesample help',
    image_advtab: true,
    templates: [
    { title: 'Type 1', content: 'Test 1' },
    { title: 'Type 2', content: 'Test 2' }
    ],
    content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css'
    ]
});

tinymce.EditorManager.init({});
 

$('#search').keyup(function() {
    var $form = $('#searchForm');
    var searchVal = $(this).val();
    var selectCategory = $("#selectCategory").val();
    $.post({
        url: $form.attr('action'),
        type: $form.attr('method'),
        data: {searchVal:searchVal,
            selectCategory:selectCategory},
            success : function(data, statut){

                $('#ItemList').html(data);

            },
            error : function(result, statut, error){
                console.log(error);
            }
        });

});


//Post Dish
$('body').on("click", "#addStage", function(e) {
    tinymce.editors[0].setContent(tinyMCE.activeEditor.getContent()+"_stage_ "+$("#stage").val()+" _/stage_");
});
$('body').on("click", "#addSubStage", function(e) {
    tinymce.editors[0].setContent(tinyMCE.activeEditor.getContent()+"_subStage_ "+$("#subStage").val()+" - "+$("#addNumber").val()+" "+$("#addMeasurement").val()+" - "+$("#addIngredient").val()+" _/subStage_");
});
$('body').on("click", "#addText", function(e) {
    tinymce.editors[0].setContent(tinyMCE.activeEditor.getContent()+"_textSubStage_ "+$("#textSubStage").val()+" _/textSubStage_");
});
$('body').on("click", "#delete", function(e) {
    tinymce.editors[0].setContent("");
});

//etape
$('body').on("click", ".firstStage", function(e) {
    e.preventDefault();
    $(this).next().show('clip', { direction: 'vertical' }, 1000);
    $(this).hide();
});
$('body').on("click", ".nextStage", function(e) {
    e.preventDefault();
    if($(this).parent().next().length != 0) {
        $(this).parent().next().show('clip', { direction: 'vertical' }, 1000);
    }
    $(this).hide();
});

var cacheOffset = 0;
var cacheLimit = 4;


$('body').on("click", "#itemListAjax", function(e) {
    e.preventDefault();
    cacheOffset=cacheOffset;
    cacheLimit=cacheLimit+4;
    $form = $("#getNextDish");
$.post({
        url : $form.attr('action'),  
        dataType: "text",
        async: false,
        data:{cacheOffset : cacheOffset,
        cacheLimit : cacheLimit},
        success : function(data, statut){

                $('#ItemList').html(data);
        },
        error : function(result, statut, error){
            console.log(error);
        }
    });
    
});
