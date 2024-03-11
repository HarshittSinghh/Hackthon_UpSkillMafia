$(document).ready(function () {
  $("#register").click(function () {
    name = $("#name").val();
    email = $("#email").val();
    password = $("#password").val();
    $.ajax({
      type: "POST",
      url: "adduser.php",
      data: "name=" + name + "&email=" + email + "&password=" + password,
      success: function (html) {
        if (html == true) {
          $("#add_err2").html(
            '<div class="alert alert-success"><strong>Success!</strong> User added successfully</div>'
          );
          window.location.href = "index.html";
        } else if (html == false) {
          $("#add_err2").html(
            '<div class="alert alert-Danger"><strong>Email Address</strong>Already Registered.</div>'
          );
        } else if (html == "name") {
          $("#add_err2").html(
            '<div class="alert alert-Danger"><strong>First Name</strong>is Required.</div>'
          );
        } else if (html == "password") {
          $("#add_err2").html(
            '<div class="alert alert-Danger"><strong>Password</strong>is Required.</div>'
          );
        } else {
          $("#add_err2").html(
            '<div class="alert alert-Danger"><strong>Error</strong>in Processing Request. Please Try Again</div>'
          );
        }
      },
      beforeSend: function () {
        $("#add_err2").html("Loading...");
      },
    });
    return false;
  });
});
