function loggInn(form) {
	$.ajax({
		url: 'ErPaalogget.php',
		type: 'post',
		data: {'uname': form.uname.value, 'pwd': form.pwd.value},
		success: function (tmp) {
			data = eval ('('+tmp+')');
			if (data.ok == 'OK') {
				if(geo_position_js.init()) {
					geo_position_js.getCurrentPosition(geo_success,geo_error,{enableHighAccuracy:true});
				}	else {
					alert("Functionality not available");
				}
				$('#left').load ('loginok.php');
				$('#content').load ('mineBloggInnlegg.php');
			} else {
				$('#left div').first().show();
				$('#left input').first().get(0).focus();
			}
		}
	});
};

function changeUserDetailsDialog () {
	$.ajax ({
		url: 'Brukerdetaljer.php',
		type: 'post',
		success: function (tmp) {
			data = eval ('('+tmp+')');
			if (data.error!=null) {
				alert (data.error);
				return;
			}
			var form = $('#changeUserDetailsDialog form').first()[0];
			form.uname.value = data.uid;
			form.uname.disabled = true;
			form.given.value = data.givenname;
			form.suren.value = data.surename;
			form.url.value = data.url;
			$('#changeUserDetailsDialog img').first()[0].src = 'userImage.php';
			$('#changeUserDetailsDialog').dialog('open');
		}
	});
}

function newUser (form) {
	if (form.uname.value.length<6) {
		alert ("Brukernavnet må være minst 6 karakterer langt");
		form.uname.focus();
	} else if (form.pwd.value!=form.pwd1.value) {
		alert ("De to passordene må være like");
		form.pwd.focus();
	} else if (form.pwd.value.length<6) {
		alert ("Passordet må være minst 6 karakterer langt");
		form.pwd.focus();
	}
	$.ajax({
		url: 'db_ny_bruker.php',
		type: 'post',
		data: { uname: form.uname.value, pwd: form.pwd.value, givenname: form.given.value, 
						surename: form.suren.value, url: form.url.value },
		success: function (tmp) {
			data = eval ('('+tmp+')');
			if (data.ok=="OK") {
				$.ajax({
					url: 'ErPaalogget.php',
					type: 'post',
					data: {'uname': form.uname.value, 'pwd': form.pwd.value},
					success: function (tmp) {
						$('#left').load ('loginok.php');
					}
				});
				$('#newUserDialog').dialog('close');
			} else {
				alert (data.message);
			}
		}
	});
}