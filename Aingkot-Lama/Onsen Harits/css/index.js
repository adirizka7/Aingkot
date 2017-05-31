var login = function()
{
	var user=document.getElementById(name).value;
	var email=document.getElementById(email).value;
	var password=document.getElementById(password).value;
	var phone=document.getElementById(phone).value;
	var cpassword=document.getElementById(cpassword).value;
	
	$.post("register.php", user, email, password, phone, cpassword);
};