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

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    }
  });

  // ADICIONA NOVO CARD EM TRAJETO
  $('a.add-trajeto').on('click', function (e) {
    e.preventDefault()
    $.ajax({
      method: "GET",
      url: "/api/set-card-trajeto",
      context: this,
    })
      .done(function (data) {
        return $('#trajetos-van').append(addCard(JSON.parse(data)))
      });
  });

  function addCard(data) {

    let optionState, optionCities, optionTrack

    $.each(data['cities'], function (i, item) {
      optionCities += "<option value='" + item.id + "'>" + item.name + "</option>"
    })

    $.each(data['track'], function (i, item) {
      optionTrack += "<option value='" + item.id + "'>" + item.name + "</option>"
    })

    var card = "<div class='card itemInput col-12 col-sm-4' style='width: 18rem;'>" +
      "<div class='card-body'>" +
      "<h5 class='card-title'>Trajeto</h5>" +
      "<select name='track' id=''>" +
      optionTrack
      + "</select>" +
      "<select name='cidade_saida' id=''>" +
      optionCities
      + "</select>" +
      "<select name='cidade_chegada' id=''>" +
      optionCities
      + "</select>" +
      "<select name='periodo'>" +
      "<option value='diurno'>Diurno</option>" +
      "<option value='vespertino'>Vespertino</option>" +
      "<option value='noturno'>Noturno</option>" +
      "</select>" +
      "</div>" +
      "</div>"

    return card;
  }

})



