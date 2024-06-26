<script src="../js/sweetalert.min.js"></script>
<?php
   if(!empty($_SESSION['message']))
   {?>
     <script>swal({
  title: "<?php echo $_SESSION['message']; ?>",
  icon: "<?php echo $_SESSION['status']; ?>",
}).then(function() {
    window.location = "<?php echo $_SESSION['location']; ?>"
});</script>
  <?php
  unset($_SESSION['message']);
  unset($_SESSION['status']);
  unset($_SESSION['location']);
}
  ?>