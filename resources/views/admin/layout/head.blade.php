<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap 5 Sidebar Menu with Dropdown</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    body {
      font-family: 'Roboto', sans-serif;
    }
    #sidebar {
      height: 100vh;
      width: 250px;
      position: fixed;
      top: 0;
      left: -250px;
      background-color: #343a40; 
      transition: left 0.3s;
    }
    #sidebar a {
      padding: 15px;
      text-decoration: none;
      font-size: 18px;
      color: white;
      display: block;
      transition: all 0.3s;
    }
    .sidebar-header h3 {
      color: #fff;
      padding: 15px;
    }
    #sidebar a:hover {
      background-color: #45a8f1; 
    }
    #sidebar .dropdown-menu {
      background-color: #343a40;
      border: none;
      z-index: 9999; /* Adjust the z-index */
    }
    #content {
      margin-left: 0;
      padding: 20px;
      transition: margin-left 0.3s;
      background-color:#343a40;
    }
    #content .user-account {
        border: 1px solid #fff;
        font-size: 26px;
        border-radius: 25px;
        padding: 4px 12px;
    }
    #sidebarCollapse {
      color: white;
      border: none;
      font-size: 30px;
      cursor: pointer;
      background: none;
    }
    .dropdown-toggle::after {
      margin-left: 7.255em !important;
      vertical-align: 0px !important;
    }
  </style>