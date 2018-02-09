var mvar = setInterval(function(){refreshposts()}, 100);

function refreshposts(){
	var xhr = new XMLHttpRequest();

	xhr.onreadystatechange = function () 
	{

		if (xhr.readyState == 4 && xhr.status == 200) 
		{
			document.getElementById("newdata").innerHTML = xhr.responseText;
		}
	}

	xhr.open("GET", "makepost.php?newp=no",true); 
	xhr.send(null);
}