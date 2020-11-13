<header>

    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="header.css?version=89" />
    </head>
    <div id="welcome">
        <?php echo "<h1>HELLO, ". strtoupper($_SESSION["username"]) . "</h1>" ?>
    </div>

    <div class="form-inline w-100" id="logOut">
        <form class="form-inline" action="search.php" method="post">
            <input type="text" name="search" placeholder="Search">
            <button id="search" class="btn btn-secondary" type="submit" value="Search" name="searchButton">Search</button>
        </form>

        <hr>

        <form class="home" action="Home.php" method="post">
            <button id="h" class="btn btn-secondary" type="submit">Home</button>
        </form>
        <form class="logout" action="logout.php" method="post">
            <button id="l" class="btn btn-secondary" type="submit" value="logout" name="logout">Logout</button>
        </form>
    </div>
    

</header>