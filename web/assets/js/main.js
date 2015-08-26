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
      $('#tiertable').append('<tr id="' + tiers[i].id + '"><td>'+tiers[i].id+'</td><td>'+tiers[i].name+'</td><td>'+tiers[i].price
      +'</td><td>'+tiers[i].sizeRange+'</td><td>'+tiers[i].minRange+' - '+tiers[i].maxRange+'</td>');
	  $('#tier-results-header').append('<th data-field="'+tiers[i].id+'">'+tiers[i].name+'</th>');
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
	var estimate = {};
	var data = $('form').serializeObject();
	$.ajax({
	  method: "POST",
	  url: "/newClient",
	  data: data,
	  async: false,
	  error: function(xhr, error) {
		console.debug(xhr); console.debug(error);
	  },
	  success: function(response) {
		console.log(response.estimate);
		displayEstimate(response.estimate);
		displayTierResults(response.estimate);
		displayCostResults(response.estimate);
		$('#artefact-results-header').addClass('active');
		$('#results-list').addClass('active');
		$('#artefact-results').css("display", "block");
	  }
	});
  });
}

function displayEstimate(json) {
  $('#artefact-results-table').append('<tr id="' + json.id + '"><td>'+json.total_artefacts+'</td><td>'+json.removed_artefacts+'</td><td>'+json.folded_artefacts+'</td></tr>');
}

function displayTierResults(json) {
  $('#tier-results-header').append('<th data-field="du_check_sum">DU Checksum</th>');
  for (var i = 0; i < $('#tiertable tr').length; i++) {
	 $('#artefacts-in-tiers').append('<td>'+json.artefacts_in_range[i]+'</td>');
  }
  $('#artefacts-in-tiers').append('<td>'+json.du_check_sum+'</td>');
  for (var i = 0; i < $('#tiertable tr').length; i++) {
	 $('#price-per-tier-per-month').append('<td>$'+json.price_for_tier_per_month[i]+' / month</td>');
  }
}

function displayCostResults(json) {
  $('#cost-results-table').append('<td>$'+json.price_per_month.toFixed(2)+'</td><td>$'+json.avg_price_per_drawing_per_month.toFixed(2)+'</td><td>$'+json.price_per_annum.toFixed(2)+'</td>');
}


$(document).ready(function() {
  getTiers();
  sendTierForm();
  removeTier();
  sendClientForm();
  $('.modal-trigger').leanModal();
});
