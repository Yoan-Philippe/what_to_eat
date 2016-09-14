$(document).ready(function(){

	var ajaxEnable = true;
	$('input.search-input').on('keyup', function(){
		if($(this).val()!='' && ($(this).val().length)>1 && ajaxEnable){
			getSuggestions($(this).val());
		}
		else{
			if($(this).val()==''){
				$('div.suggestions').html('');
			}
		}
	});

	function getSuggestions(search){
		ajaxEnable = false;
		$.ajax({
		   url: '/recipes/searchAjax',
		   dataType: 'json',
		   type: 'post',
		   data: {
		      search: search
		   },
		   error: function() {
		      console.log('An error has occurred');
		      ajaxEnable = true;
		   },
		   success: function(data) {
		   		var suggestionsHtml = '';
		   		if(data.length==0){
		   			suggestionsHtml += '<p>Aucune recette trouvée :(</p>'
		   		}
		   		else{
		   			suggestionsHtml = '<ul>';
		   			$.each(data, function() {
		   				suggestionsHtml += '<li>' + this.title + '</li>';
		   			});
		   			suggestionsHtml += '</ul>';
		   		}
		   		$('div.suggestions').html(suggestionsHtml);

		      ajaxEnable = true;
		   },
		});
	}


});