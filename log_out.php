<?php 

session_start();

$_SESSION = array();

if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

session_destroy();

$title = "Log out";

include "includes/header.php";
?>


</head>

<body>


<div class="container pt-3">
	<h2><i class="fas fa-sign-out-alt"></i> Logged Out</h2>
	<p class="lead">You have been logged Out, See you next time!</p>
</div>



<?php 
include "includes/footer.php";

?>
<script>
    window.setTimeout(function() {
        window.location = "index.php";
    }, 3000);
</script>
</body>

</html>