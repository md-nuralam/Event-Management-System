<header>
    <div style="padding-bottom: 60px;">
        <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
          <div class="container">
            <a class="navbar-brand" href="#">
                    <h4>E V E N T &nbsp; &nbsp; M A N A G E M E N T</h4>
                </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <div class="navbar-nav">
                    <span class="nav-link" style="color : white;">Logged in as</span>
                    <a class="nav-link" style="color : white;" aria-current="page" href="admin_profile.php"
                     </a>
                    <a class="nav-link active" aria-current="page" href="logout.php">Logout</a>
                </div>
            </div>
          </div>
        </nav>
    </div>
</header>

<main class="row container-fluid">
        <section class="col-md-2">

            <div class="pt-3 ps-3 pb-3 bg-white" style="width: 200px;">

              <ul class="list-unstyled ps-0">

                <li class="mb-1">
                  <a href="admin.php" class="btn align-items-center rounded">Dashboard</a>
                </li>

                <li class="border-top my-3"></li>

                <li class="mb-1">
                  <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#manager-collapse" aria-expanded="false">
                    Event Type
                  </button>
                  <div class="collapse" id="manager-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                      <?php if($_SESSION['user_type'] == 'admin')
                      { 
                      ?><li><a href="" class="link-dark rounded">Add Event type</a></li>
                      <?php
                       }
                       ?>
                      <li><a href="" class="link-dark rounded">Event type  List</a></li>
                    </ul>
                  </div>
                </li>

                <li class="border-top my-3"></li>

                <li class="mb-1">
                  <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#customer-collapse" aria-expanded="false">
                    Food Package
                  </button>
                  <div class="collapse" id="customer-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                      <li><a href="" class="link-dark rounded">Add Pacakge</a></li>
                      <li><a href="" class="link-dark rounded">Pacakge List</a></li>
                    </ul>
                  </div>
                </li>

                <li class="border-top my-3"></li>

                <li class="mb-1">
                  <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#event-collapse" aria-expanded="false">
                    Event
                  </button>
                  <div class="collapse" id="event-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                      <li><a href="" class="link-dark rounded">Add Event</a></li>
                      <li><a href="" class="link-dark rounded">Event List</a></li>
                    </ul>
                  </div>
                </li>

                <li class="border-top my-3"></li>

                <li class="mb-1">
                  <a href="" class="btn align-items-center rounded ">Message</a>
                </li>

                <li class="border-top my-3"></li>

                <li class="mb-1">
                  <a href="" class="btn align-items-center rounded ">Profile</a>
                </li>

                <li class="border-top my-3"></li>

                <li class="mb-1">
                  <a href="" class="btn align-items-center rounded ">Change Password</a>
                </li>

                <li class="border-top my-3"></li>

                <li class="mb-1">
                  <a href="" class="btn align-items-center rounded ">Change Picture</a>
                </li>

                <li class="border-top my-3"></li>

                <li class="mb-1">
                  <a href="logout.php" class="btn align-items-center rounded ">Logout</a>
                </li>

              </ul>

            </div>

        </section>