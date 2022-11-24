require('./bootstrap');

import $ from 'jquery';
window.$ = window.jQuery = $;

$(function () {

  $(".search .formulario .item .item_input input").click(function () {
    var id = $(this).attr("id")
    $(".search .formulario .item .item_input input").attr('checked', false)
    $(".search .formulario .item .item_input #" + id).attr('checked', true)
    $(".content_filter").removeClass("activeFilter")
    $("#content_" + id).addClass("activeFilter")
    $(".btnSubmit button").attr("disabled", false).css("opacity", "1")
  });

  $(".btn_selecionar #btn_selecionar_foto").click(function () {
    $(".modal_album").addClass("active_modal_album")
  })


  $(".salvar_modal_album").click(function (e) {
    $(".modal_album").removeClass("active_modal_album")
  })


  //SELECIONA O TRACK E ESCONDE O SELECIONADO
  $('#change_track option:selected').on('change', function (e) {
    alert(e)
  })


  $(".faq .duvidas .title button").click(function () {
    var buttonID = $(this).attr("data-id")
    $(this).toggleClass("activebtn")
    $(".faq .duvidas .content_" + buttonID).toggleClass("active_content")
  })

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    }
  })

  // ADICIONA NOVO CARD EM TRAJETO
  $('a.add-trajeto').on('click', function (e) {
    e.preventDefault()

    if ($('.card').length < 4) {

      $.ajax({
        method: "GET",
        url: "/api/set-card-trajeto",
        context: this,
      })
        .done(function (data) {
          return $('#trajetos-van').append(addCard(JSON.parse(data)))
        });

    }

  });

  function addCard(data) {

    let optionState, optionTrack

    $.each(data['states'], function (i, item) {
      optionState += "<option value='" + item.id + "'>" + item.name + "</option>"
    })

    $.each(data['track'], function (i, item) {
      optionTrack += "<option value='" + item.id + "'>" + item.name + "</option>"
    })

    var card = "<div class='card itemInput cart_item col-12 col-sm-4' style='width: 18rem;'>" +
      "<div class='card-body'>" +
      "<h5 class='card-title'>Trajeto</h5>" +
      "<div class='item_card_'>" +
      "<select name='track[]' onchange='showHideOption(this)' data-card='" + $('.card').length + "' class='track_selector'>" +
      optionTrack +
      "</select></div>" +
      "<div class='item_card_'>" +
      "<select name='estado_saida' id='estado_saida_" + $('.card').length + "' data-id='saida_" + $('.card').length + "' onchange='changeState(this)'>" +
      optionState +
      "</select></div>" +
      "<div class='item_card_'>" +
      "<select name='cidade_saida[]' id='cidade_saida_" + $('.card').length + "'>" +
      "<option value=''>Selecione um estado</option>" +
      "</select></div>" +
      "<div class='item_card_'>" +
      "<select name='estado_chegada'  id='estado_chegada_" + $('.card').length + "' data-id='chegada_" + $('.card').length + "' onchange='changeState(this)'>" +
      optionState +
      "</select></div>" +
      "<div class='item_card_'>" +
      "<select name='cidade_chegada[]' id='cidade_chegada_" + $('.card').length + "'>" +
      "<option value=''>Selecione um estado</option>" +
      "</select></div>" +
      "<div class='item_card_'>" +
      "<input type='text' name='escola[]' id='escola_" + $('.card').length + "' placeholder='Escola'>" +
      "</div>" +
      "<div class='item_card_'>" +
      "<input type='text' name='evento[]' id='evento_" + $('.card').length + "' placeholder='Evento caso necessario' style='display:none;'>" +
      "</div>" +
      "<div class='item_card_'>" +
      "<select name='periodo[]' id='periodo_" + $('.card').length + "'>" +
      "<option value='diurno'>Diurno</option>" +
      "<option value='vespertino'>Vespertino</option>" +
      "<option value='noturno'>Noturno</option>" +
      "</select>" +
      "</div>" +
      "</div>" +
      "</div>"

    return card;
  }

  function addCitieSelect(cities) {

    let optionCities

    $.each(cities, function (i, item) {
      optionCities += "<option value='" + item.id + "'>" + item.name + "</option>"
    })

    return optionCities;
  }

  $(".estado_jqry").on("change", function () {
    var dataid = $(this).data("id");
    var id_estado = $(this).find(":selected").val();

    $.ajax({
      method: "GET",
      url: "/api/get-cidades/" + id_estado,
    })
      .done(function (cities) {
        $("#cidade_" + dataid).empty()
        return $("#cidade_" + dataid).append(addCitieSelect(JSON.parse(cities), dataid));
      });
  })

})



