
<html>
  <head>
    <title>Login Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <script>
      $(document).ready(function () {
  $("#register").click(function () {
    name = $("#name").val();
    email = $("#email").val();
    password = $("#password").val();
    $.ajax({
      type: "POST",
      url: "pcheck.php",
      data: "&email=" + email + "&password=" + password,
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
        } else if (html == "false") {
          $("#add_err2").html(
            '<div class="alert alert-Danger"><strong>First Name</strong>is Required.</div>'
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

    </script>
  </head>
  <body>
    <nav>
      <span class="open-slide">
        <a href="#" onclick="openSlideMenu()">
          <svg height="30px" width="30px">
            <path d="M0,5 30 5" stroke="#fff" stroke-width="5" />
            <path d="M0,14 30 14" stroke="#fff" stroke-width="5" />
            <path d="M0,23 30 23" stroke="#fff" stroke-width="5" />
          </svg>
        </a> </span
      >&nbsp;&nbsp;&nbsp;&nbsp;
      <img src="IMG/1.png" width="100px" />

      <ul class="nav-bar">
        <li><a href="index.html">Home</a></li>
        <li><a href="#Contact">Events</a></li>
        <li><a href="chatbot-master/index.html">Categories</a></li>
        <li><a href="login.php">Login/SignUp</a></li>
      </ul>
      <div id="side-menu" class="side-nav">
        <a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a>
        <a href="index.html">Home</a>
        <a href="#Contact">Events</a>
        <a href="chatbot-master/index.html">Categories</a>
        <a href="login.php">Login/SignUp</a>
      </div>
    </nav>
    <section class="sec-4">
      <section class="login">
        <div class="title">
          <center><h1>My Account</h1></center>
          <center><h4>Home / My Account</h4></center>
        </div>
        <center><h3>Login</h3></center>
        <div style="padding: 50px 30px">
          <center>
            <form role="form" method="post">
              <i class="fa fa-envelope icon"></i
              ><input
                type="email"
                placeholder="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email"
                required
              /><br /><br />

              <i class="fa fa-key icon"></i
              ><input
                type="password"
                placeholder="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Password"
                required
              /><br /><br />

              <input type="checkbox" /> Remember Me<br /><br />
              <input type="submit" value="Sign up" /><br /><br /><br />
              <a href="register.php">Create an Account</a>
            </form>
          </center>
        </div>
      </section>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Footer -->
    <section class="sec-7" id="int">
      <img src="IMG/1.png" width="100px" />
      <div class="main">
        <div class="sub-main">
          <p style="font-size: 13px">
            Consectetur adipiscing elit, sed do eiusmod tempor dunt ut labore et
            dolore magna aliqua.<br />
          </p>
          <br />

          <a href="#"
            ><i class="fa fa-instagram" style="font-size: 20px"></i
          ></a>
          <a href="#"><i class="fa fa-linkedin" style="font-size: 20px"></i></a>
          <a href="#"><i class="fa fa-twitter" style="font-size: 20px"></i></a>
          <a href="#"><i class="fa fa-github" style="font-size: 20px"></i></a>
          <a href="#"><i class="fa fa-youtube" style="font-size: 20px"></i></a>
        </div>
        <div class="sub-main-1">
          <div class="Address">
            <img src="IMG/asset%2014.svg" /><br /><b style="color: red"
              >Location</b
            >
            <p>
              4736 Poe Lane, HOT SPRINGS,<br />
              Montana-59845
            </p>
          </div>
          <div class="Phone">
            <img src="IMG/asset%2015.svg" /><br /><b style="color: red"
              >Contact</b
            >
            <p>913-473-7000 <br />contact@sports.com</p>
          </div>
        </div>
        <br />
      </div>
      <br />
      <br />
      <center>
        <p style="color: #777; font-size: 15px">
          &copy; 2024 SPORTS | DESIGNED BY SPORTS TEAM
        </p>
      </center>
      <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    </section>
    <script type="text/javascript">
      function openSlideMenu() {
        document.getElementById("side-menu").style.width = "250px";
        document.getElementById("main").style.marginleft = "250px";
      }
      function closeSlideMenu() {
        document.getElementById("side-menu").style.width = "0";
        document.getElementById("main").style.marginleft = "0";
      }
    </script>
  </body>
</html>
