<template>
    <!-- /.content-header -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card bg-info-gradient">
                    <div class="card-header">
                    <h6 >
                    کاربران آنلاین
                    </h6>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <tbody>
                            <tr v-for="user in users.data" :key="user.id">



                                <td v-bind:title=" user.role.name +' '+ user.group.name+' '+ user.region_point.name+' '+ user.region_point.region_center.region_county.name">{{user.name}}</td>



                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->

                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- Modal -->

    </div>

    <!-- Button trigger modal -->


</template>

<script>
export default {
    data() {
        return {

            users: {},
        }
    },
    methods: {

        loadUsers() {


                axios.get("api/users/online").then(({data}) => (this.users = data)).then(() => {

                }).catch(() => {

                });

        },

    },
    created() {

        this.loadUsers();
         setInterval(()=>this.loadUsers(),60000);
    }

}
</script>
