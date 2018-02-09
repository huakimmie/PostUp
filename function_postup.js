function login(){
	var divObj = document.getElementById("userform"); 
	divObj.style.display = "block";
	divObj = document.getElementById("newuserform");
	divObj.style.display = "none";
}

function newreg(){
	var divObj = document.getElementById("newuserform");
	divObj.style.display = "block";
	divObj = document.getElementById("userform"); 
	divObj.style.display = "none";
}

function login_form(){
	var cur_username = document.getElementById("username").value;
	var cur_password = document.getElementById("password").value;
	var query_string = "username=" + cur_username + "&password=" + cur_password;
	login_ajax(query_string);
}

function new_reg_form(){
	var new_user = document.getElementById('new_username').value;
	var new_pass = document.getElementById('new_password').value;
	var query_string = "new_username=" + new_user + "&new_password=" + new_pass;
	new_user_ajax(query_string);
}

function make_post_form(){
	var title = document.getElementById('wid').value;
	var body = document.getElementById('pbody').value;
	var query_string = "title=" + title + "&body=" + body;
	make_post_ajax(query_string);
}

function comment_form(post_title,cur_in){
	var ptitle = post_title;
	var cur_log = cur_in;
	var cbody = document.getElementById('carea').value;
	var query_string = "body="+cbody+"&post_title="+ptitle+"&cur_log="+cur_log;
	make_comment_ajax(query_string);
}

function new_user_ajax(query_string){
	var xhr = new XMLHttpRequest();

	xhr.onreadystatechange = function () 
	{

		if (xhr.readyState == 4 && xhr.status == 200) 
		{
			var result = xhr.responseText;
			var ar = result.split('|');
			alert(ar[1]);
		}
	}

	xhr.open("GET", "newmemberpage.php?" + query_string,true); 
	xhr.send(null);
}

function login_ajax(query_string){
	var xhr = new XMLHttpRequest();

	xhr.onreadystatechange = function () 
		{

			if (xhr.readyState == 4 && xhr.status == 200) 
			{
				var result = xhr.responseText;
				var ar = result.split('|');
				alert(ar[1]);
			}
		}

	xhr.open("GET", "loginpage.php?" + query_string,true); 
	xhr.send(null);
}

function make_post_ajax(query_string){
	var xhr = new XMLHttpRequest();

	xhr.onreadystatechange = function () 
	{

		if (xhr.readyState == 4 && xhr.status == 200) 
		{
			document.getElementById("newdata").innerHTML = xhr.responseText;
			document.getElementById("makepostdiv").style.display="none";
		}
	}

	xhr.open("GET", "makepost.php?newp=yes&" + query_string,true); 
	xhr.send(null);
}

function make_comment_ajax(query_string){
	var xhr = new XMLHttpRequest();

	xhr.onreadystatechange = function () 
	{

		if (xhr.readyState == 4 && xhr.status == 200) 
		{
			document.getElementById("commentgen").innerHTML = xhr.responseText;
		}
	}
	xhr.open("GET", "makecomment.php?newc=yes&" + query_string,true); 
	xhr.send(null);
}

function direct_to_post(post_title,post_timestamp){
	var xhr = new XMLHttpRequest();
	var query_string = "post_title=" + post_title;
	xhr.open("GET", "commentcookie.php?" + query_string,false);
	xhr.send(null);
	window.location.href = "http://www.pic.ucla.edu/~kimmiehua/final_project/storypage.php?title="+post_title+"&time_stamp="+post_timestamp;
}

function newpostappear(){
	document.getElementById("makepostdiv").style.display="block";
}

function logout(){
	var xhr = new XMLHttpRequest();
	xhr.open("GET","logout.php",false);
	xhr.send(null);
	alert("You've logged out, or nobody was logged in to begin with! Redirecting to home page!");
	window.location.href = "http://www.pic.ucla.edu/~kimmiehua/final_project/postup.php";

}