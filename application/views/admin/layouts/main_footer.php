<!-- jQuery -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?=base_url('assets/admin')?>/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?=base_url('assets/admin')?>/dist/js/sb-admin-2.js"></script>

<script type="text/javascript" src="<?=base_url('assets/admin')?>/bower_components/ajaxloader/loadingoverlay.min.js"></script>
<script>
var base_url = '<?=base_url()?>';	
$(document).ajaxStart(function(){$.LoadingOverlay("show");});
$(document).ajaxStop(function(){$.LoadingOverlay("hide");});
</script>
<?php if(isset($scripts)): ?>

<?php foreach($scripts as $script): ?>
<script type="text/javascript" src="<?=base_url('assets/admin')?>/<?=$script?>"></script>
<?php endforeach;?>

<?php endif;?>

</body>

</html>