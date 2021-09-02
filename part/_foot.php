<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b><?php 
      
$today = new DateTime('today');
echo $today->format('d F, Y'), '.<br>', PHP_EOL;
     ?> </b>
    </div>
    <strong>Copyright &copy; <?php $today = new DateTime('today'); echo $today->format('2020 - Y'), PHP_EOL; ?>
        Allright reserved by <a href="">FASS/NK</a></strong>

</footer>