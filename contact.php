<?php

function contact()
{
  return <<<REM
  <div
        class="modal fade modal-xl"
        id="modal-reservation"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="w-100 d-flex justify-content-start align-items-start">
              <!-- left -->
              <div class="recap-order px-5 py-4">
                <h1 class="modal-title fs-4 mb-5" id="exampleModalLabel">
                  Votre reservation
                </h1>
                <!-- people -->
                <div class="d-flex align-items-center justify-content-start">
                  <span class="material-symbols-outlined"> person </span>
                  <h1 class="modal-title fs-5 mx-3" id="exampleModalLabel">
                    1 personne seule
                  </h1>
                </div>
                <!-- people -->
  
                <!-- calendar -->
                <div class="d-flex align-items-center justify-content-start mt-4">
                  <span class="material-symbols-outlined"> calendar_month </span>
                  <h1
                    class="modal-title fs-5 mx-3 d-flex align-items-center justify-content-start"
                    id="exampleModalLabel"
                  >
                    15 mars 2022
                    <span class="material-symbols-outlined">
                      arrow_right_alt
                    </span>
                    20 mars 2022
                  </h1>
                </div>
                <!-- calendar -->
  
                <!-- total -->
                <div
                  class="d-flex align-items-center justify-content-between"
                  style="margin-top: 5rem"
                >
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Total</h1>
                  <h1 class="modal-title fs-2 mx-3" id="exampleModalLabel">
                    800€
                  </h1>
                </div>
                <!-- total -->
              </div>
              <!-- right -->
              <div class="form-contact px-5 py-4">
                <div
                  class="d-flex justify-content-between align-items-center w-100 mb-4"
                >
                  <h1 class="modal-title fs-5" id="exampleModalLabel">
                    Check availability and plan your dream trip!
                  </h1>
                  <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                  ></button>
                </div>
  
                <div>
                  <form class="d-block w-100">
                    <!-- name -->
                    <div class="mb-3 row w-100">
                      <label class="col-sm-2 col-form-label">Nom</label>
                      <div class="col-sm-10">
                        <input
                          type="text"
                          class="form-control w-100"
                          id="lastname"
                        />
                      </div>
                    </div>
                    <!-- name -->
  
                    <!-- name -->
                    <div class="mb-3 row w-100">
                      <label class="col-sm-2 col-form-label">Prénom</label>
                      <div class="col-sm-10">
                        <input
                          type="text"
                          class="form-control w-100"
                          id="firstname"
                        />
                      </div>
                    </div>
                    <!-- name -->
  
                    <!-- email -->
                    <div class="mb-3 row w-100">
                      <label class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input
                          type="email"
                          class="form-control w-100"
                          id="email"
                        />
                      </div>
                    </div>
                    <!-- email -->
  
                    <!-- mobile -->
                    <div class="mb-3 row w-100">
                      <label class="col-sm-2 col-form-label">Mobile</label>
                      <div class="col-sm-10">
                        <input
                          type="email"
                          class="form-control w-100"
                          id="mobile"
                        />
                      </div>
                    </div>
                    <!-- mobile -->
  
                    <!-- wellness -->
  
                    <div class="my-2">
                      <label>Choix Wellness</label>
                      <select class="form-select" id="wellness" required></select>
                    </div>
                    <!-- wellness -->
  
                    <!-- activity sensory -->
                    <div class="my-2">
                      <label>Choix activité Sensory</label>
                      <select class="form-select" id="sensory" required></select>
                    </div>
                    <!-- activity sensory -->
  
                    <!-- artistique  -->
                    <div>
                      <label class="form-check-label" for="flexRadioDefault1">
                        Avez-vous un Parcours artistique ?
                      </label>
                      <div class="form-check">
                        <input
                          class="form-check-input"
                          type="radio"
                          name="flexRadioDefault"
                          id="flexRadioDefault1"
                        />
                        <label class="form-check-label" for="flexRadioDefault1">
                          Oui
                        </label>
                      </div>
                      <div class="form-check">
                        <input
                          class="form-check-input"
                          type="radio"
                          name="flexRadioDefault"
                          id="flexRadioDefault2"
                          checked
                        />
                        <label class="form-check-label" for="flexRadioDefault2">
                          Non
                        </label>
                      </div>
                    </div>
                    <!-- artistique  -->
  
                    <!-- message -->
                    <div class="my-2">
                      <label> Message </label>
                      <textarea
                        class="form-control w-100"
                        id="message"
                        rows="3"
                      ></textarea>
                    </div>
                    <!-- message -->
  
                    <!-- button submit -->
                    <button
                      type="submit"
                      class="btn btn-success mt-3 mb-3"
                      disabled
                    >
                      Envoyer
                      <div class="spinner-border text-dark d-none" role="status">
                        <span class="visually-hidden">Loading...</span>
                      </div>
                    </button>
                    <!-- button submit -->
                  </form>
                </div>
              </div>
            </div>
          
          </div>
        </div>
      </div>
  REM;
}
