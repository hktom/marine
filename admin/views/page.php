<?php
defined('ABSPATH') or die('You silly human !');

require_once MARINE_RESERVATION_DIR . 'admin/constants.php';
require_once MARINE_RESERVATION_DIR . 'admin/function.php';

$pageName = MARINE_RESERVATION_PAGE;
$exportPage = MARINE_RESERVATION_URL . '/admin/views/export.php';

$from = reformat(isset($_POST['date_from']) ? $_POST['date_from'] : '');
$to = reformat(isset($_POST['date_to']) ? $_POST['date_to'] : '');
$reservations = get_reservations($from, $to);

// echo "<pre>";
// print_r($orders['sage']);
// echo "</pre>";

echo '
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.13.4/xlsx.core.min.js"></script>

<script>
var columns_name = ' . json_encode(COLUMNS) . ';
var reservations = ' . json_encode($reservations) . ';
console.log(reservations);
</script>

<script src="' . MARINE_RESERVATION_URL . '/admin/js/lib/FileSaver.js"></script>
<script src="' . MARINE_RESERVATION_URL . '/admin/js/lib/jhxlsx.js"></script>

<script src="' . MARINE_RESERVATION_URL . '/admin/js/export_to_xls.js"></script>
<script src="' . MARINE_RESERVATION_URL . '/admin/js/main.js"></script>';
?>


<div style="margin:auto" class="mt-1 px-1 py-1 w-100">
  <h1 class="mb-5 mt-5">Marine reservation</h1>

  <div class="container-fluid mt-4">
    <form class="row" method="POST" action="?page=<?php echo $pageName; ?>">

      <div class="col-12">
        <h6 class="mb-5 mt-1"><i>Choisissez la période d'exportation</i></h6>
      </div>
      <div class="col-md-3 col-12">
        Date début
        <?php customInput('from'); ?>

      </div>
      <div class="col-md-3 col-12 pr-0">
        Date fin
        <?php customInput('to'); ?>
      </div>
      <div class="col-md-4 col-12 px-0 d-flex align-items-end">
        <button type="submit" class="btn btn-primary w-50">Recherche</button>
      </div>
    </form>
  </div>

  <div class="container-fluid bg-light mt-4 py-2 px-5">
    <div class="row my-4">
      <h2 class="mb-4"> <?php echo isset($reservations['total']) ? $reservations["total"] : 0; ?> reservations trouvées </h2>

      <?php if (isset($reservations["total"]) && $reservations["total"] > 0) : ?>

        <div class="col-md-2 col-6">
          <a class="btn btn-info w-100" id='btn-export'>Export</a>
        </div>

        <!-- <div class="col-md-2 col-6">
    <a class="btn btn-warning w-100" id='downloadlink_simple'>Export Simple</a>
  </div> -->
      <?php endif; ?>

    </div>

  </div>

  <!-- table reservations -->
  <div class="container-fluid">
    <div class="mt-5 row flex-row flex-nowrap">
      <table class="table table-bordered table-hover">
        <thead class="table-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Email</th>
            <th scope="col">Mobile</th>
            <th scope="col">CWellness</th>
            <th scope="col">Sensory</th>
            <th scope="col">Parcours artistique</th>
            <th scope="col">Nbre de personnes</th>
            <th scope="col">Nbre de personnes groupe</th>
            <th scope="col">Arrivée</th>
            <th scope="col">Départ</th>
            <th scope="col">Promo</th>
            <th scope="col">Total</th>
            <th scope="col">Date</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($reservations['reservations'] as $key => $reservation) : ?>
            <tr>
              <th scope="row"><?php echo $reservation['id']; ?></th>
              <td><?php echo $reservation['last_name']; ?></td>
              <td><?php echo $reservation['first_name']; ?></td>
              <td><?php echo $reservation['email']; ?></td>
              <td><?php echo $reservation['mobile']; ?></td>
              <td><?php echo $reservation['wellness_choice']; ?></td>
              <td><?php echo $reservation['activity_sensory_choice']; ?></td>
              <td><?php echo $reservation['artistique_path_choice']; ?></td>
              <td><?php echo $reservation['guest']; ?></td>
              <td><?php echo $reservation['custom_number_guest']; ?></td>
              <td><?php echo $reservation['date_from']; ?></td>
              <td><?php echo $reservation['date_to']; ?></td>
              <td><?php echo $reservation['promo_code']; ?></td>
              <td><?php echo $reservation['total']; ?></td>
              <td><?php echo $reservation['created_at']; ?></td>
            </tr>

          <?php endforeach; ?>

        </tbody>
      </table>
    </div>
  </div>
  <!-- table reservations -->

</div>