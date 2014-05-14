function showEntry (id, url) {
  $.ajax({
    type: 'post',
    
	success: function (tmp) 
	{
        if (data.lat!=0||data.lng!=0) 
		{
			$('#right').append ('Blog innlegget ble skrevet her : 
			<div id="entry_map" style="width:150px; height:200px"></div>');
			var latlng = new google.maps.LatLng(data.lat, data.lng);
         
			var myOptions = 
			{
				zoom: 8,
				center: latlng,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			};
		  
			var map = new google.maps.Map(document.getElementById("entry_map"), myOptions);
			var marker = new google.maps.Marker(
			{
				position: latlng, 
				map: map, 
				title: 'Innlegget ble skrevet her'
			});
        }
    } 
		else
			alert (data.message);
    }
  });
}