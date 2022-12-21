$("button#s_login").click(function() {
	$.post("functions.php", {
		perform: "s_login",
		roll: $("#s_rno").val(),
		pass: $("#s_pwd").val()
	}, function(data, status) {
		alert(data);
		if (data == "Login Successful.")
			window.location.replace("students.php");
	});
});

$("button#a_login").click(function() {
	var pass = $("input#a_pwd").val();
	if (pass == "admin")
	{
		alert("Login Successful.");
		window.location.replace("admin.php");
	}
	else
		alert("Invalid Password.");
});

function success(id)
{
	var x = confirm("Do you want to apply for this job ? Click ok to confirm.");
	if (x)
		$.post("functions.php", {
			perform: "apply",
			cid: id
		}, function(data, status) {
			alert("Thank you for applying. You will be notified about the interviews soon !");
			window.location.replace("recruiters.php");
		});
}