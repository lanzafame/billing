$.fn.serializeObject = function() {
  var o = {};
  var a = this.serializeArray();

  $.each(a, function() {
	if (o[this.name] !== undefined) {
	  if (!o[this.name].push) {
		o[this.name] = [o[this.name]];
	  }
	  o[this.name].push(this.value || '');
	} else {
	  o[this.name] = this.value || '';
	}
  });

  return o;
};



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
      $('#tiertable').append('<tr id="' + tiers[i].id + '"><td>'+tiers[i].id+'<td>'+tiers[i].name+'</td><td>'+tiers[i].price
      +'</td><td>'+tiers[i].sizeRange+'</td><td>'+tiers[i].minRange+' - '+tiers[i].maxRange+'</td>');
    }
  });
}

function sendTierForm() {
  $('#addtierbtn').click(function() {
	var data = $('form').serializeArray();
    $.ajax({
        method: "POST",
        url: "/createTier",
        data: data,
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
	var data = $('form').serializeArray();
    $.ajax({
        method: "POST",
	  //this should work with key/value now
        url: "/removeTier/" + data[5].value,
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

function sendClientForm() {
  $('#getestimatebtn').click(function() {
	var data = $('form').serializeObject();
	$.ajax({
	  method: "POST",
	  url: "/newClient",
	  data: data,
	  error: function(xhr, error) {
		console.debug(xhr); console.debug(error);
	  },
	  success: function(response) {
		console.log("Success");
		console.log(response);
	  }
	});
  });
}


$(document).ready(function() {
  getTiers();
  sendTierForm();
  removeTier();
  sendClientForm();
  $('.modal-trigger').leanModal();
});
