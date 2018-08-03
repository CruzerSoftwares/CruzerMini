 <footer class="page-footer blue-grey darken-3">
    <div class="footer-copyright">
      <div class="container">
       Copyright &copy; <?php echo date('Y');?>
        <span class="white-text"><?php __(_config('APP_TITLE'));?></span>
        <div class="right">Developed By
          <?php __a(_config('COPYRIGHT'),_config('COPYRIGHT_URL'),['class'=>'text-white text-lighten-4', 'target' => '_blank']);?>
        </div>
      </div>
    </div>
  </footer>