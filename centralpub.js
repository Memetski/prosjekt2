

/*$(document).ready (function () {
	
	$('#nyBruker').dialog({autoOpen:false, width: "500px", modal: true });
	$('#endreBrukerdetaljer').dialog({autoOpen:false, width: "700px", modal: true });
	$.ajax({
		url: 'ErPaalogget.php',
		success: function (tmp) {
			data = eval ('('+tmp+')');
			if (data.login=='OK') {
				$('#left').load ('loginok.php');	
			} else {
				$('#content').load ('centralpub.html');
			}
		}
	});
});
*/

    $(document).ready (function () {
    $.ajax({
    url: 'aktivSesjon.php',
    success: function (data) {
    if (data.login=='OK') {
    $('#left').load ('loginok.php');
    } else
    $('#left').load ('login.html');
    }
    });
    })



function loggInn(form) {
	$.ajax({
		url: 'ErPaalogget.php',
		type: 'post',
		data: {'uname': form.uname.value, 'pwd': form.pwd.value},
		success: function (data) {
			if (data.ok == 'OK') {
				$('#left').load ('loginok.php');
				console.log(data);
			} else {
				$('#left div').first().show();
				$('#left input').first().get(0).focus();
			}
		}
	});
}

function endreBrukerdetaljerDialog () {
	$.ajax ({
		url: 'Brukerdetaljer.php',
		type: 'post',
		success: function (tmp) {
			data = eval ('('+tmp+')');
			if (data.error!=null) {
				alert (data.error);
				return;
			}
			var form = $('#endreBrukerdetaljerDialog form').first()[0];
			form.uname.value = data.uid;
			form.uname.disabled = true;
			form.fornavn.value = data.fornavn;
			form.etternavn.value = data.etternavn;
			form.email.value = data.email;
			$('#endreBrukerdetaljerDialog').dialog('open');
		}
	});
}

function endreBrukerdetaljer (form) {
/*	if (form.pwd.value.length>0&&form.opwd.value.length<6) {
		alert ("Du må oppgi det gamle passordet for å sette nytt passord");
		form.opwd.focus();
	} else if (form.pwd.value!=form.pwd1.value) {
		alert ("De nye passordene dine matcher ikke");
		form.pwd.focus();
	} else if (form.pwd.value.length>0&&form.pwd.value.length<6) {
		alert ("Passord må være minst 6 karakterer langt");
		form.pwd.focus();
	}*/
	$.ajax({
		url: 'Endre_brukerdetaljer.php',
		type: 'post',
		data: { uname: form.uname.value, opwd: form.opwd.value, pwd: form.pwd.value, 
						fornavn: form.fornavn.value, etternavn: form.etternavn.value, email: form.email.value },
		success: function (tmp) {
			data = eval ('('+tmp+')');
			alert (data.message);
		}
	});
}

function nyBruker (form) {

/*
	if (form.uname.value.length<6) {
		alert ("Brukernavnet må være minst 6 karakterer langt");
		form.uname.focus();
	} else if (form.pwd.value!=form.pwd1.value) {
		alert ("De to passordene må være like");
		form.pwd.focus();
	} else if (form.pwd.value.length<6) {
		alert ("Passordet må være minst 6 karakterer langt");
		form.pwd.focus();
	}*/
	$.ajax({
		url: 'opprettBruker.php',
		type: 'post',
		data: { uname: form.uname.value, pwd: form.pwd.value, fornavn: form.fornavn.value, 
						etternavn: form.etternavn.value, email: form.email.value },
		success: function (tmp) {
			data = eval ('('+tmp+')');
			if (data.ok=="OK") {
				$.ajax({
					url: 'ErPaalogget.php',
					type: 'post',
					data: {'uname': form.uname.value, 'pwd': form.pwd.value},
					success: function (tmp) {
						$('#content').load ('loginok.php');
					}
				});
				$('#nyBrukerDialog').dialog('close');
			} else {
				alert (data.message);
			}
		}
	});
}

function nyBrukerDialog () {
	$('#nyBrukerDialog').dialog('open');
}




function loggut () {
	$.ajax({
		url: 'loggut.php',
		success: function (tmp) {
			$('#left').load ('login.html');
		}
	});
}

function map () {
	$.ajax({
		url: 'map.html',
		success: function (tmp) {
			$('#content').load ('map.html');
		}
	});
	
	
}


function band () {
	$.ajax({
		url: 'band.php',
		success: function (tmp) {
			$('#content').load ('band.php');
		}
	});
}

function bandInsert (form) {
	$.ajax({
		url: 'opprettBand.php',
		type: 'post',
		data: { bname: form.bname.value, year: form.year.value, info: form.info.value},
		success: function (tmp) {
			data = eval ('('+tmp+')');
			if (data.ok=="OK") {
				$.ajax({
					url: 'opprettBand.php',
					type: 'post',
					data: {'bname': form.bname.value, 'year': form.year.value, 'info': form.info.value},
					success: function (tmp) {
						$('#content').load ('band.php');
					}
				});
				$('#nyttBand').dialog('close');
			} else {
				alert (data.message);
			}
		}
	});
}

function bruker () {
	$.ajax({
		url: 'regbruk.php',
		success: function (tmp) {
			$('#content').load ('regbruk.php');
		}
	});
}

function brukerInsert (form) {
	$.ajax({
		url: 'opprettBruker.php',
		type: 'post',
		data: { uname: form.uname.value, pwd: form.pwd.value, fornavn: form.fornavn.value, etternavn: form.etternavn.value, email: form.email.value},
		success: function (tmp) {
			data = eval ('('+tmp+')');
			if (data.ok=="OK") {
				$.ajax({
					url: 'opprettBruker.php',
					type: 'post',
					data: {'uname': form.uname.value, 'fornavn': form.fornavn.value, 'etternavn': form.etternavn.value, 'email': form.email.value, 'pwd': form.pwd.value},
					success: function (tmp) {
						$('#content').load ('regbruk.php');
					}
				});
				$('#nyBruker').dialog('close');
			} else {
				alert (data.message);
			}
		}
	});
}
















