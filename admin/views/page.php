<?php
defined('ABSPATH') or die('You silly human !');

require_once MARINE_RESERVATION_DIR . 'admin/constants.php';
require_once MARINE_RESERVATION_DIR . 'admin/function.php';

$pageName = MARINE_RESERVATION_PAGE;
$exportPage = MARINE_RESERVATION_URL . '/admin/views/export.php';

$from = reformat($_POST['date_from']);
$to = reformat($_POST['date_to']);
$orders = $from != "" && $to != "" ? get_orders($from, $to) : [];

// echo "<pre>";
// print_r($orders['sage']);
// echo "</pre>";

echo '
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.13.4/xlsx.core.min.js"></script>

<script>
var columns_name=' . json_encode(COLUMNS) . ';
var orders=' . json_encode($orders) . ';
console.log(orders);
</script>

<script src="' . MARINE_RESERVATION_URL . '/admin/js/lib/FileSaver.js"></script>
<script src="' . MARINE_RESERVATION_URL . '/admin/js/lib/jhxlsx.js"></script>

<script src="' . MARINE_RESERVATION_URL . '/admin/js/export_to_xls.js"></script>
<script src="' . MARINE_RESERVATION_URL . '/admin/js/main.js"></script>';
?>


<div style="width:98%" class="mt-4">
    <h1 class="mb-5 mt-5">Silikin Village Sage Export</h1>

<div class="container-fluid mt-4">
    <form class="row" method="POST" action="?page=<?php echo $pageName; ?>">

    <div class="col-12">
    <h6 class="mb-5 mt-5"><i>Choisissez la periode d'exportation</i></h6>
    </div>
      <div class="col-md-3 col-12">
      Date début
     <?php customInput('from');?>

      </div>
      <div class="col-md-3 col-12 pr-0">
      Date fin
      <?php customInput('to');?>
      </div>
      <div class="col-md-4 col-12 px-0 d-flex align-items-end">
      <button type="submit" class="btn btn-primary w-50">Recherche</button>
      </div>
    </form>
</div>

<div class="container-fluid bg-light mt-5 py-5 px-5">
 <div class="row my-4">
  <h2 class="mb-4"> <?php echo $orders['total']; ?> commandes trouvées </h2>

  <?php if ($orders["total"] > 0): ?>

  <div class="col-md-2 col-6">
    <a class="btn btn-info w-100" id='downloadlink_sage'>Export Sage</a>
  </div>

  <div class="col-md-2 col-6">
    <a class="btn btn-warning w-100" id='downloadlink_simple'>Export Simple</a>
  </div>
   <?php endif;?>

  </div>

</div>

</div>
