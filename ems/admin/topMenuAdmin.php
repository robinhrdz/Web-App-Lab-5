<nav class="navbar navbar-expand-lg bg-body-tertiary"  class="navbar bg-dark" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Admin Profile</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="viewStudent.php">View Students</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="viewFaculty.php">View Faculty</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Settings
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="addStudent.php">Add a student</a></li>
            <li><a class="dropdown-item" href="addFaculty.php">Add a Faculty</a></li>
            <li><a class="dropdown-item" href="addCourse.php">Add a Course</a></li>
            <li><a class="dropdown-item" href="addDepartment.php">Add a Department</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="/ems/CloseSession.php">Log out</a></li>
          </ul>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>