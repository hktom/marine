<?php

function reservation()
{
    return <<< REM

    <div class="main-container bg-dark px-2 py-1">
        <div class="alert alert-success reservation-success d-none" role="alert">
        Votre demande réservation a bien été prise en compte. Nous vous contacterons dans les plus brefs délais.
        </div>
        <form id="form-reservation">
            <div class="my-2">
                <label for="guest" class="text-light">Nombre de personnes</label>
    
                <select class="form-select" id="guest" required name="guest">
                    <option value="1 personne seule">1 personne seule</option>
                    <option value="1 personne souhaitant rejoindre un groupe">
                        1 personne souhaitant rejoindre un groupe
                    </option>
                    <option value="2 personnes">2 personnes</option>
                    <option value="Groupe">Groupe</option>
                </select>
    
                <small><i><label for="guest" id="warning" class="text-light d-none my-2"></label></i></small>
            </div>
    
            <div id="group-field-people" class="d-none">
                <!-- input people number -->
                <label for="group-size" class="text-light"
                    >Nombre de personnes dans le groupe</label
                    >
                    <input
                    class="form-control"
                    type="number"
                    id="group-size"
                    name="group-size"
                    min="1"
                    />
                    <small
                    ><i
                        ><label for="guest" class="text-light my-2">
                        Une offre définitive vous sera communiquée après vérification
                        des disponibilités pour votre groupe
                        </label></i
                    ></small
                    >
            </div>
    
            <div class="my-2">
                <label for="from" class="text-light">Date d'arrivée</label>
                <input class="form-control" type="text" id="from" name="date-arrivee" required  autocomplete="off" />
            </div>
    
            <div class="my-2">
                <label for="to" class="text-light">Date de départ</label>
                <input class="form-control" type="text" id="to" name="date-depart" required  autocomplete="off" />
            </div>
    
            <div class="my-2">
                <label for="to" class="text-light">Code promo</label>
                <input class="form-control" type="text" name="promo" id="promo-field" />
            </div>
    
            <div class="alert alert-secondary my-2 d-none" role="alert" style="font-weight: bold" id="total"></div>
    
            <!-- <div class="form-check">
              <input
                class="form-check-input"
                type="checkbox"
                value=""
                id="gift-checked"
              />
              <label class="form-check-label text-light" for="gift-checked">
                offrir un bon cadeau
              </label>
            </div>
    
            <div id="form-gift" class="d-none my-4"></div> -->
    
            <button type="submit" class="btn btn-primary w-100 mt-3 mb-3">
                Réserver
                <div class="spinner-border text-dark d-none" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </button>
        </form>
    </div>
    
REM;
}
