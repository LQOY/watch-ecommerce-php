<!-- Navigation bar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="home.php">Melbourne Watch Gallery</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="home.php">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="management.php">Product Management</a>
            </li>

            <?php
            session_start();
          if (isset($_SESSION['username'])){
          echo "
                <li class='nav-item'>
                    <a class='nav-link' href='addproduct.php'>Add Product</a>
                </li>
                
                <li class='nav-item'>
                      <a class='nav-link' href='logout.php'>Logout</a>
                 </li>
                 
                <li>
                <a class='nav-link' href='management.php'>Username: $_SESSION[username]
                 </a></li>
                 
                 ";
                }

          ?>
              
          </ul>
          

          <form class="d-flex" role="search" method="GET" action="home.php">
            <input
              class="form-control me-2"
              type="search"
              placeholder="Search"
              aria-label="Search"
              name="searchkeyword"
            />
            <button class="btn btn-outline-success" type="submit">
              Search
            </button>
          </form>
        </div>
      </div>
    </nav>