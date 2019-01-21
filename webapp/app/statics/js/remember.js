function Setpwdchk(){
	var a = document.getElementById('remember').checked;
	if (a==true){
		var user = document.getElementById("inputUsername").value;
		var pwd = document.getElementById("inputPassword").value;
		//alert(user);
		document.cookie="user"+user;"pwd"+pwd;
		alert(document.cookie);
	}
}
function getcookie{
	document.getElementById("inputUsername").value = user;
	document.getElementById("inputPassword").value = pwd;
}

/*$(":checkbox").on("change",function(){
    var $checkbox = $(this);
    var username = document.getElementById("inputUsername").value;
    var password = document.getElementById("inputPassword").value;
    alert(username);
        //console.log($('input:checked').length);
});*/
/*if (box.checked){
	alert(1);
	//alert(username);
}else{
	alert(0);
}*/
