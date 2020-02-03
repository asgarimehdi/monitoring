<template>
    <!-- /.content-header -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <button type="button" class="btn btn-success" @click="newModal" data-toggle="modal"
                                    data-target="#addNew">
                                ایجاد کاربر جدید
                                <i class="fa fa-user-plus fa-fw"></i>
                            </button>
                        </h3>


                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">



                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>

        <!-- Modal -->
        <div class="modal rtl fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">

                    <draggable-map-component></draggable-map-component>
                </div>
            </div>
        </div>
    </div>

    <!-- Button trigger modal -->


</template>

<script>
    export default {
        data() {
            return {
            }
        },
        methods: {

            newModal() {

                $('#addNew').modal('show');

            },
        },
        created() {

        }

    }
</script>
