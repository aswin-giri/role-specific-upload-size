(function( $ ){
	$( '#rsmus-settings-form' ).on( 'submit',function( e ){

		e.preventDefault();
		var form = $( '#rsmus-settings-form' );
		if( ! form.hasClass( 'busy') ){

			form.addClass( 'busy' );
			var response_div = form.find('.rsmus-form-response');
				response_div.html( '' );
			var data = form.serialize();
			var btn = form.find( '#rsmus-settings-btn' );
			var action_url = form.attr( 'action' );
			

			$.post( action_url, data, function( response ){
				form.removeClass( 'busy' );
				var obj = response;

				if( obj.success == true ){
					response_div.html( '<p class="success">'+obj.data+'</p>');
						setTimeout(function() {
						    location.reload();
						}, 3000);
				}else{
					response_div.html( '<p class="error">'+obj.data+'</p>');
				}

			});
		}

	});
})(jQuery);
