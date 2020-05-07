$('#login').click(function() {
      		if ($('#name').val()=='admin' && $('#pass').val()=='123456') {
      			window.location.href='index.html';
      		}else{
				if ($('#name').val()=='giaovien' && $('#pass').val()=='123456') {
      			window.location.href='index2.html';
	      		}else{
					$( ".alert-danger" ).show();
				}
			}

			
	});