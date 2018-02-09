var mvar = setInterval(function(){refreshcomments()}, 100);

function refreshcomments(){
	var xhr = new XMLHttpRequest();

	xhr.onreadystatechange = function () 
	{

		if (xhr.readyState == 4 && xhr.status == 200) 
		{
			document.getElementById("commentgen").innerHTML = xhr.responseText;
		}
	}

	xhr.open("GET", "makecomment.php?newc=no",true); 
	xhr.send(null);
}