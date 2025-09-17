<footer class="main-footer">
    <div class="pull-right hidden-xs">
    </div>
    <strong>Copyright &copy; <?php echo date("Y"); ?> .</strong> All rights reserved.
</footer>
    
<script src="<?php echo base_url(); ?>assets/js/jQuery-2.1.4.min.js"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/app.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/validation.js" type="text/javascript"></script>
 <!-- Page-specific scripts -->
<?php if (!empty($scripts)): ?>
    <?php foreach ($scripts as $script): ?>
        <script src="<?= base_url($script); ?>"></script>
    <?php endforeach; ?>
<?php endif; ?>

 <!-- Page active submenu part -->
    <script>
        $(document).ready(function() {
            var currentUrl = window.location.href;
            $('ul.sidebar-menu li a').each(function() {
                if (this.href === currentUrl) {
                    $(this).parent().addClass('active');       // highlight li
                    $(this).closest('.treeview').addClass('active menu-open'); // keep parent open
                }
            });
            if (currentUrl.toLowerCase().includes("dashboard")) {
                $('.treeview').removeClass('active menu-open');
                $('ul.sidebar-menu li').removeClass('active');
            }
        });
        
    </script>
    <script type="text/javascript">
        var baseURL = "<?php echo base_url(); ?>";
    </script>
    <style>
        input.error {
            color: inherit !important;  /* stop red text inside input */
        }
    	.error{
    		color:red;
    		font-weight: normal;
    	}
        .deleted-user {
            background-color: #f2dede; /* light red */
            color: #a94442; /* dark red text */
        }
    </style>
</body>
</html>
