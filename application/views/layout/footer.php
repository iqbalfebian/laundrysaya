<!-- Modal Logout -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabelLogout">Konfirmasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Apakah anda benar ingin logout ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
        <a href="<?= base_url() . 'index.php/logout' ?>" class="btn btn-primary">Logout</a>
      </div>
    </div>
  </div>
</div>

<!-- Footer -->
<footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>copyright &copy; <script>
          document.write(new Date().getFullYear());
        </script> - LaundryAPP by
        <b>Iqbal Febian</b>
      </span>
    </div>
  </div>
</footer>
<!-- Footer -->
</div>
</div>

<!-- Scroll to top -->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<script src="<?= base_url() ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?= base_url(); ?>/js/ruang-admin.min.js"></script>
<!-- <script src="<?= base_url() ?>/vendor/chart.js/Chart.min.js"></script>
<script src="<?= base_url() ?>/js/demo/chart-area-demo.js"></script> -->
</body>

</html>