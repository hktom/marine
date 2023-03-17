$(function () {
  const guest = [
    "1 personne seule",
    "1 personne souhaitant rejoindre un groupe",
    "2 personnes",
    "Groupe",
  ];

  let total = 0;

//   const inputGroupeSize = `<label for="group-size" class="text-light"
//   >Nombre de personnes dans le groupe</label
// >
// <input
//   class="form-control"
//   type="number"
//   id="group-size"
//   name="group-size"
//   min="1"
//   required
// />
// <small
//   ><i
//     ><label for="guest" class="text-light my-2">
//       Une offre définitive vous sera communiquée après vérification
//       des disponibilités pour votre groupe
//     </label></i
//   ></small
// >`;

  let formGift = `<div class="my-2">
  <label class="text-light">Valeur du bon</label>

  <select
    class="form-select"
    id="gift-value"
    name="gift-value"
    required
  >
  <option value="50">50€</option>`;

  for (let i = 100; i <= 1000; i = i + 100) {
    formGift += `<option value="${i}">${i}€</option>`;
  }

  formGift += `</select>
</div>
<div class="my-2">
  <label class="text-light">De la part de</label>
  <input
    class="form-control"
    type="text"
    id="from-name"
    name="from-name"
    required
  />
</div>

<div class="my-2">
  <label class="text-light"> Pour offrir à</label>
  <input
    class="form-control"
    type="text"
    id="to-name"
    name="to-name"
    required
  />
</div>

<div class="my-2">
  <label class="text-light"> Ajouter un message </label>
  <textarea
    class="form-control"
    id="message"
    rows="3"
    required
    name="message"
  ></textarea>
</div>`;

  function getTotal(selected_guest, promo) {
    let _total = 0;
    if (selected_guest === guest[0] || selected_guest === guest[1]) {
      _total = promo === promo_code ? 850 : 950;
    } else if (selected_guest === guest[2]) {
      _total = promo === promo_code ? 1575 : 1750;
    } else if (selected_guest === guest[3]) {
      _total = 875 * $("#group-size").val();
      
    }
    return _total;
  }

  function checkFields() {
    let guest = $("#guest").val();
    let from = $("#from").val();
    let to = $("#to").val();
    let promo = $("#promo-field").val();
    // let groupSize = $("#group-size").val();
    

    if (guest != "" && from != "" && to != "") {
      $("#total").removeClass("d-none");
      total = getTotal(guest, promo);
      $("#total").text(`Total: ${total}€`);
    } else {
      $("#total").addClass("d-none");
    }
  }

  // check fields to display total
  $("#guest").change(function () {
    checkFields();
  });

  $("#from").change(function () {
    checkFields();
  });

  $("#to").change(function () {
    checkFields();
  });

  $("#promo-field").change(function () {
    checkFields();
  });

  const promo_code = "TCS2023";
  var dateFormat = "mm/dd/yy",
    from = $("#from")
      .datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 1,
        minDate: 0,
        dateFormat: "d MM yy",
        regional: "fr",
        //maxDate: "+1M +10D",
      })
      .on("change", function () {
        to.datepicker("option", "minDate", getDate(this));
      });

      // $("#from").datepicker($.datepicker.regional[ "fr" ]);
      
    to = $("#to")
      .datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 1,
        minDate: 1,
        dateFormat: "d MM yy",
        regional: "fr",
      })
      .on("change", function () {
        from.datepicker("option", "maxDate", getDate(this));
      });

  function getDate(element) {
    var date;
    try {
      date = $.datepicker.parseDate(dateFormat, element.value);
    } catch (error) {
      date = null;
    }

    return date;
  }

  // select guest
  $("#guest").change(function () {
    let selectedGuest = $(this).children("option:selected").val();
    if (selectedGuest === guest[1]) {
      //$("#group-field").show();
      $("#warning").removeClass("d-none");
      $("#warning").text(
        "un groupe de 4 personnes est un prérequis pour l’organisation de l’évènement"
      );
    } else if (selectedGuest === guest[3]) {
      $("#warning").removeClass("d-none");
      $("#warning").text(
        "retraite, team building, corporate event, workshop, regroupement d’amis"
      );
      $("#group-field-people").removeClass("d-none");
      $("#group-size").attr("required",);
      // $("#group-field-people").append(inputGroupeSize);
    } else {
      $("#group-field-people").addClass("d-none");
      $("#group-size").removeAttr("required");
      // $("#group-field-people").html("");
      $("#warning").addClass("d-none");
    }
  });

  $("#group-size").change(function () {
    checkFields();
  });

  // check all fields are filled
  $("#form-reservation").submit(function (e) {
    e.preventDefault();
    // show bootstrap modal
    $("#contact-modal-show-person").text($("#guest").val());
    $("#contact-modal-show-total").text(`${total}€`);
    $("#contact-modal-show-date-from").text($("#from").val());
    $("#contact-modal-show-date-to").text($("#to").val());

    // show alert
    $(".reservation-failed").addClass("d-none");
    $(".reservation-success").addClass("d-none");

    $("#modal-contact").modal("show");
  });

  $("#form-contact").submit(function (e) {
    e.preventDefault();
    let data = {
      guest: $("#guest").val(),
      from: $("#from").val(),
      to: $("#to").val(),
      promo: $("#promo-field").val(),
      group_size: $("#group-size").val(),
      last_name: $("#last_name").val(),
      first_name: $("#first_name").val(),
      email: $("#email").val(),
      mobile: $("#mobile").val(),
      wellness: $("#wellness").val(),
      sensory: $("#sensory").val(),
      hasArtisticPath: $("input[name='hasArtisticPath']").val(),
      message: $("#message").val(),
      total: total,
    };

    let plugin_dir = $("#plugin_dir").val();

    console.log(data);

    $(".reservation-failed").addClass("d-none");
    $(".reservation-success").addClass("d-none");

    axios
      .post(plugin_dir + "marine/ajax.php", data)
      .then(function (response) {
        $("#total").addClass("d-none");
        $(".reservation-success").removeClass("d-none");
        $("#modal-contact").modal("hide");
        // clear form
        $("#form-reservation")[0].reset();
        $("#form-contact")[0].reset();
      })
      .catch(function (error) {
        $(".reservation-failed").removeClass("d-none");
        console.log(error);
      });
  });

  $("#gift-checked").change(function () {
    if (this.checked) {
      $("#form-gift").removeClass("d-none");
      $("#form-gift").html(formGift);
    } else {
      $("#form-gift").addClass("d-none");
      $("#form-gift").html("");
    }
  });

  // end of script
});
