require('./bootstrap');
import $ from 'jquery';
window.$ = window.jQuery = $;

$(function () {
    $(".search .formulario .item .item_input").click(function(){
        var id = $(this).attr("data-id")
        $(".search .formulario .item .item_input input").attr('checked', false)
        $(".search .formulario .item .item_input input#"+id).attr('checked', true)
        $(".content_filter").removeClass("activeFilter")
        $("#content_" + id).addClass("activeFilter")
        $(".btnSubmit button").attr("disabled",false).css("opacity","1")
    });        
});



