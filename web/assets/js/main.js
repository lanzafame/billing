function getResponse(url, callback) {
  $.getJSON(url, callback);
}

// function getTiers() {
//   var res = $.getJSON('/getTiers');
//   var tiers = res['responseJSON'];
//   function(tiers) {
//     tiers.forEach(function(val) {
//       $('#tiertable').html('<tr id="' + val.id + '"><td>'+val.name+'</td><td>'+val.price
//       +'</td><td>'+val.sizeRange+'</td><td>'+val.minRange+' - '+val.maxRange+'</td>');
//     });
//   };
// }

function sendTierForm() {
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

function removeTier() {

}


$(document).ready(function() {
  getResponse('/getTiers', function(tiers) {
    console.log(tiers);
    for (var i = 0; i < tiers.length; i++) {
      $('#tiertable').append('<tr id="' + tiers[i].id + '"><td>'+tiers[i].name+'</td><td>'+tiers[i].price
      +'</td><td>'+tiers[i].sizeRange+'</td><td>'+tiers[i].minRange+' - '+tiers[i].maxRange+'</td>');
    }
  });
  sendTierForm();
  $('.modal-trigger').leanModal();
});
