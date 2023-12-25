<!DOCTYPE html>
<html lang="en">
<head>
  @include('admin.layout.head')
</head>
<body>

@include('admin.layout.sidebar')

<div id="content" class="d-flex justify-content-between align-items-baseline">
  <button type="button" id="sidebarCollapse">
    <span id="toggleText"><i class="fa-solid fa-bars"></i></span>
  </button>
  <a class="text-decoration-none text-white user-account" href=""><i class="fa-regular fa-user"></i></a>
  sdasdasd
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
  const sidebar = document.getElementById('sidebar');
  const content = document.getElementById('content');

  document.getElementById('sidebarCollapse').addEventListener('click', function () {
    const isOpen = sidebar.style.left === '0px';
    sidebar.style.left = isOpen ? '-250px' : '0';
    content.style.marginLeft = isOpen ? '0' : '250px';
  });
</script>

</body>
</html>
