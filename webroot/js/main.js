$(document).ready(function(){

	$('input.search-input').focus();
	$('input.search-input').on('keyup', function(){
		if($(this).val()!=''){
			getSuggestions($(this).val());
		}
		else{
			if($(this).val()==''){
				$('div.suggestions').html('');
			}
		}
	});

	function getSuggestions(search){
		$.ajax({
		   url: '/recipes/searchAjax',
		   dataType: 'json',
		   type: 'post',
		   data: {
		      search: search
		   },
		   error: function() {
		      console.log('An error has occurred');
		   },
		   success: function(data) {
		   		var suggestionsHtml = '';
		   		if(data.length==0){
		   			suggestionsHtml += '<p>Aucune recette trouvée :(</p>';
		   		}
		   		else{
		   			suggestionsHtml = '<ul>';
		   			$.each(data, function() {
		   				suggestionsHtml += '<li><a href="/recettes/' + this.id + '">' + this.title + '</a></li>';
		   			});
		   			suggestionsHtml += '</ul>';
		   		}
		   		$('div.suggestions').html(suggestionsHtml);
		   },
		});
	}


});