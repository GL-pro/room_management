<style>
  
</style>
<footer class="footer py-4  ">
  <div class="container-fluid">
    <div class="row align-items-center text-center ">
      <div class="col-lg-12 mb-lg-0 mb-4 ">
        <div class="copyright text-center text-sm text-muted text-lg-start">
          ©
          <script>
            document.write(new Date().getFullYear())
          </script>,

          <a href="" class="font-weight-bold" target="_blank"> </a>
        </div>
      </div>
      <!-- <div class="col-lg-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href=" " class="nav-link text-muted" target="_blank">one</a>
                </li>
                <li class="nav-item">
                  <a href=" " class="nav-link text-muted" target="_blank">two</a>
                </li>
                <li class="nav-item">
                  <a href=" " class="nav-link text-muted" target="_blank">three</a>
                </li>
                <li class="nav-item">
                  <a href=" " class="nav-link pe-0 text-muted" target="_blank">four</a>
                </li>
              </ul>
            </div> -->
    </div>
  </div>
</footer>
</main>

<!--   Core JS Files   -->
<script src="<?= base_url() ?>assets2/js/core/popper.min.js"></script>
<script src="<?= base_url() ?>assets2/js/core/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets2/js/plugins/perfect-scrollbar.min.js"></script>
<script src="<?= base_url() ?>assets2/js/plugins/smooth-scrollbar.min.js"></script>
<script src="<?= base_url() ?>assets2/js/plugins/password.js"></script>


<script>
  var win = navigator.platform.indexOf('Win') > -1;
  if (win && document.querySelector('#sidenav-scrollbar')) {
    var options = {
      damping: '0.5'
    }
    Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
  }
</script>

<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<!-- <script src="<?= base_url() ?>assets2/js/material-dashboard.min.js?v=3.1.0"></script> -->
<script src="<?= base_url() ?>assets2/js/prog.js"></script>
</body>

</html>