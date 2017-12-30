<?php
  class indexController extends controller{
    public function __construct(){
        parent::__construct();
       $this->_view->setStyle('admin');
       $this->_view->assign('_title','الصفحه الرئيسية');
       $this->_view->assign('_page','الصفحه الرئيسية');

     
    }
    public function index(){
    $this->_view->tmpDir('index');
         $path['template']=system::_data("url_site").'App/template/admin/';
    ?>
          <!-- BEGIN JAVASCRIPT CODES FOR THE CURRENT PAGE -->
        <script src="<?php echo $path['template'];?>/plugins/jquery.fullcalendar/fullcalendar.min.js"></script>
    <script src="<?php echo $path['template'];?>plugins/jquery.jqvmap/jquery.vmap.min.js"></script>
    <script src="<?php echo $path['template'];?>plugins/jquery.jqvmap/maps/jquery.vmap.world.js"></script>
    <script src="<?php echo $path['template'];?>plugins/jquery.jqvmap/data/jquery.vmap.sampledata.js"></script>
    <script src="<?php echo $path['template'];?>plugins/jquery.flot/jquery.flot.js"></script>
    <script src="<?php echo $path['template'];?>plugins/jquery.flot/jquery.flot.resize.js"></script>
    <script src="<?php echo $path['template'];?>plugins/jquery.flot/jquery.flot.selection.js"></script>
    <script src="<?php echo $path['template'];?>plugins/jquery.sparkline/jquery.sparkline.min.js"></script>
    <script src="<?php echo $path['template'];?>plugins/jquery.justgage/raphael.2.1.0.min.js"></script>
    <script src="<?php echo $path['template'];?>plugins/jquery.justgage/justgage.1.0.1.min.js"></script>
    <script src="<?php echo $path['template'];?>plugins/jquery.gritter/jquery.gritter.min.js"></script>
    <script src="<?php echo $path['template'];?>plugins/bootstrap.daterangepicker/moment.js"></script>
        <script src="<?php echo $path['template'];?>plugins/jquery.pulsate/jquery.pulsate.min.js"></script>

    <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="/templates/social/assets/plugins/jquery.flot/excanvas.min.js"></script><![endif]-->

    <script src="<?php echo $path['template'];?>js/dashboard.js"></script>

    <script>
      $(function() {
        var urlAvatar = "<?php echo $path['template'];?>img/avatar-55.png";
        Dashboard.init({urlAvatar:urlAvatar});
      });
    </script>
    <?php
    }

  }

?>