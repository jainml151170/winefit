<!DOCTYPE html>
<html lang="en">
<head>
  @include('admin.layout.head')
</head>
<body>
  @include('admin.layout.header')
  <section class="main-content">
      <div class="main-content-menu d-flex">
          @include('admin.layout.sidebar')
          <div class="main-content-msg px-3 w-100">
              @yield('section')
          </div>
      </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
      const sidebar = document.getElementById('sidebar');
      const content = document.getElementById('content');
      const toggleButton = document.getElementById('sidebarCollapse');

      let isOpen = true; // Assuming the sidebar starts open

      function toggleSidebar() {
          isOpen = !isOpen;

          sidebar.style.transition = 'width 0.3s linear, opacity 0.2s linear';

          if (isOpen) {
              sidebar.style.width = '200px';
              sidebar.style.opacity = '1';

          } else {
              sidebar.style.width = '0';
              sidebar.style.opacity = '0';
          }
      }
      toggleButton.addEventListener('click', toggleSidebar);
  </script>
</body>
</html>
