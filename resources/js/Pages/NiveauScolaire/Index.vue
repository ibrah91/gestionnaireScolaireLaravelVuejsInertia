<template>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Liste des niveaux scolaire</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <!-- <h3 class="card-title">Simple Full Width Table</h3> -->
                        <div class="card-tools">
                            <ul class="pagination pagination-sm float-right">

                                <li class="page-item" v-for="link in props.niveauScolaires.links">
                                    <Link class="page-link" :href="link.url">{{ link.label }}</Link>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="card-body p-0">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Niveau scolaire</th>
                                    <th style="width: 100px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="niveauScolaire in props.niveauScolaires.data">
                                    <td>{{ niveauScolaire.nom }}</td>

                                    <td>
                                        <div class="d-flex justify-items-center">
                                            <button class="btn btn-info mr-2">
                                                <i class="fas fa-pen"></i>
                                            </button>

                                            <button class="btn btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
//retour des données grâce aux v-for
const props = defineProps({
    niveauScolaires : {
        type:Object,
        required:true
    }
});
</script>
