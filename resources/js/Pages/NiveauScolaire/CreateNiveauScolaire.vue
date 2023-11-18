<template>
    <div
        class="modal fade"
        id="createNVModal"
        data-backdrop="static"
        data-keyboard="false"
        tabindex="-1"
        aria-labelledby="staticBackdropLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">
                        Ajout d'un niveau scolaire
                    </h5>
                    <button
                        type="button"
                        class="close"
                        data-dismiss="modal"
                        aria-label="Close"
                    >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form @submit.prevent="soumettre" id="createForm">
                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input
                                required
                                type="text"
                                class="form-control"
                                v-model="nomNiveauScolaire"
                                :class="{ 'is-invalid': nomError != '' }"
                            />
                            <span
                                v-if="nomError != ''"
                                class="invalid-feedback error"
                                >{{ nomError }}</span
                            >
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn-danger"
                        data-dismiss="modal"
                    >
                        Fermer
                    </button>
                    <button
                        form="createForm"
                        type="submit"
                        class="btn btn-success"
                    >
                        Soumettre
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
import { onMounted, ref } from "vue";

import { Inertia } from "@inertiajs/inertia";
import {
    useSwalSuccess,
    useSwalError,
} from "@/Composables/alert";
const nomNiveauScolaire = ref("");
//variable permettant de constater l'erreur de duplication
const nomError = ref("");
let createModal = "";
onMounted(() => {
    createModal = $("#createNVModal");
});
const closeModal = () => {
    createModal.modal("hide");
    nomNiveauScolaire.value = "";
};

const soumettre = () => {
    const nom = nomNiveauScolaire.value;
    const url = route("niveauscolaire.store");
    Inertia.post(
        url,
        { nom: nom },
        {
            onSuccess: (page) => {
                closeModal();
                //afficher un message de succés
                useSwalSuccess("Niveau scolaire ajouté avec succès !");
            },
            onError: (errors) => {
                //afficher un message d'erreur
                useSwalError("Une erreur s'est produite");

                if (errors.nom != null) {
                    nomError.value = errors.nom;
                }
            },
        }
    );
};
</script>
