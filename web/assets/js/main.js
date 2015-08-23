function getResponse(url, callback) {
  $.getJSON(url, callback);
}

function deleteTableRows(callback) {
  $('tbody#tiertable').empty();
  callback;
}

function getTiers() {
  getResponse('/getTiers', function(tiers) {
    for (var i = 0; i < tiers.length; i++) {
      $('#tiertable').append('<tr id="' + tiers[i].id + '"><td>'+tiers[i].name+'</td><td>'+tiers[i].price
      +'</td><td>'+tiers[i].sizeRange+'</td><td>'+tiers[i].minRange+' - '+tiers[i].maxRange+'</td>');
    }
  });
}

// function formSubmit(submitEvent) {
//   var name = document.querySelector('input').value
//   request({
//     uri: "http://example.com/upload",
//     body: name,
//     method: "POST"
//   }, postResponse)
// }
//
// function postResponse(err, response, body) {
//   var statusMessage = document.querySelector('.status')
//   if (err) return statusMessage.value = err
//   statusMessage.value = body
// }

// document.querySelector('form').onsubmit = formSubmit


function sendTierForm() {
  $('#addtierbtn').click(function() {
    // var formdata = $(':input#tierform');
    var formdata = $('#tierform');
    $.ajax({
        method: "POST",
        url: "/createTier",
        data: formdata,
        beforeSend: function(formdata) {
          console.log(formdata);
        },
        error: function(xhr, error) {
          console.debug(xhr); console.debug(error);
        },
        success: function(response) {
          deleteTableRows();
          getTiers();
          console.log(response);
        }
    });
  });
}

function removeTier() {
  $('#removetierbtn').click(function() {
    var id = $(':input#tier_id');
    $.ajax({
        method: "POST",
        url: "/removeTier/" + id[0].value,
        beforeSend: function(id) {
          console.log(id);
        },
        error: function(xhr, error) {
          console.debug(xhr); console.debug(error);
        },
        success: function(response) {
          deleteTableRows();
          getTiers();
          console.log("Success");
        }
    });
  });
}


$(document).ready(function() {
  getTiers();
  sendTierForm(deleteTableRows());
  removeTier(deleteTableRows());
  $('.modal-trigger').leanModal();
});
