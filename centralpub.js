

$(document).ready (function () {
	
	$('#nyBruker').dialog({autoOpen:false, width: "500px", modal: true });
	$('#endreBrukerdetaljer').dialog({autoOpen:false, width: "700px", modal: true });
	$('#blogEntryDisplayDialog').dialog({autoOpen:false, width: "700px", modal: true });
	$.ajax({
		url: 'ErPaalogget.php',
		success: function (tmp) {
			data = eval ('('+tmp+')');
			if (data.login=='OK') {
				$('#left').load ('loginok.php');
				$('#content').load ('mineBloggInnlegg.php');	
			} else {
				$('#content').load ('allBlogEntries.php');
			}
		}
	});
	$('#right').load('right.html');
});



function loggInn(form) {
	$.ajax({
		url: 'ErPaalogget.php',
		type: 'post',
		data: {'uname': form.uname.value, 'pwd': form.pwd.value},
		success: function (tmp) {
			data = eval ('('+tmp+')');
			if (data.ok == 'OK') {
				$('#left').load ('loginok.php');
				$('#content').load ('mineBloggInnlegg.php');
			} else {
				$('#left div').first().show();
				$('#left input').first().get(0).focus();
			}
		}
	});
};

function endreBrukerdetaljer () {
	$.ajax ({
		url: 'Brukerdetaljer.php',
		type: 'post',
		success: function (tmp) {
			data = eval ('('+tmp+')');
			if (data.error!=null) {
				alert (data.error);
				return;
			}
			var form = $('#endreBrukerdetaljer form').first()[0];
			form.uname.value = data.uid;
			form.uname.disabled = true;
			form.given.value = data.fornavn;
			form.suren.value = data.etternavn;
			form.url.value = data.url;
			$('#endreBrukerdetaljer img').first()[0].src = 'userImage.php';
			$('#endreBrukerdetaljer').dialog('open');
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
		data: { uname: form.uname.value, pwd: form.pwd.value, fornavn: form.given.value, 
						etternavn: form.suren.value, url: form.url.value },
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
				$('#nyBruker').dialog('close');
			} else {
				alert (data.message);
			}
		}
	});
}

function newUserDialog () {
	$('#newUserDialog').dialog('open');
}

function loggut () {
	$.ajax({
		url: 'loggut.php',
		success: function (tmp) {
			$('#left').load ('login.html');
		}
	});
	$('#content').load ('allBlogEntries.php');
};