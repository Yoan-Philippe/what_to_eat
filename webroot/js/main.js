$(document).ready(function(){

	$('.reload').on('click', function(){
		reloadChoices();
	});

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

	function reloadChoices(){

		var arrIds = [];
		$('div.recipe-box').each(function(){
			arrIds.push($(this).attr('data-js-recipe-id'));
		});

		$.ajax({
		   url: '/recipes/reloadChoices',
		   dataType: 'json',
		   type: 'post',
		   data: {
		      ids: arrIds
		   },
		   error: function() {
		      console.log('An error has occurred');
		   },
		   success: function(data) {

		   		var choicesHtml = '';
		   		if(data.length==0){
		   			choicesHtml += '<p>Aucune recette disponible</p>';
		   		}
		   		else{
		   			$.each(data, function() {
		   				choicesHtml += '<div data-js-recipe-id="' + this.id + '" class="recipe-box" style="border-radius: 5px; border: 1px solid #ccc; padding:10px; width: 70%; margin-bottom: 8px;">';
		   			
		   			    choicesHtml += '<a href="/recipes/view/' + this.id + '">';
		   			        choicesHtml += '<h4>' + this.title + '</h4>';
		   			        if(this.link){
		   			        	choicesHtml += '<a target="_blank" href="' + this.link + '">En savoir plus</a>';
		   			        }
		   			        choicesHtml += '<p class="actions">';
		   			        choicesHtml += '<a href="/admin/recipes/edit/' + this.id + '">Éditer</a>';
		   			        choicesHtml += '</p>';
		   			    choicesHtml += '</a>';
		   			    choicesHtml += '</div>';
		   			});
		   		}
		   		$('div.recipes-home-list').html(choicesHtml);
		   },
		});
	}


});