function getResponse(url, callback) {
  $.getJSON(url, callback);
}

function deleteTableRows(callback) {
  $('tbody#tiertable').empty();
}

function getTiers() {
  getResponse('/getTiers', function(tiers) {
    for (var i = 0; i < tiers.length; i++) {
      $('#tiertable').append('<tr id="' + tiers[i].id + '"><td>'+tiers[i].name+'</td><td>'+tiers[i].price
      +'</td><td>'+tiers[i].sizeRange+'</td><td>'+tiers[i].minRange+' - '+tiers[i].maxRange+'</td>');
    }
  });
}

function sendTierForm(callback) {
  $('#addtierbtn').click(function() {
    var formdata = $(':input');
    // var formdata = $('#tierform');
    $.ajax({
        method: "POST",
        url: "/createTier",
        data: formdata,
        success: function(response) {
          console.log(response);
        }
    });
  });
}

function removeTier(callback) {
  $('#removetierbtn').click(function() {
    var id = $(':input#tier_id');
    console.log(id);
    $.ajax({
        method: "POST",
        url: "/removeTier/" + id[0].value,
        success: function(response) {
          console.log("Success");
        }
    });
  });
}


$(document).ready(function() {
  sendTierForm(deleteTableRows(getTiers()));
  removeTier(deleteTableRows(getTiers()));
  $('.modal-trigger').leanModal();
});
