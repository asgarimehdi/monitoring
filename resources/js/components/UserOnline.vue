<template>
    <!-- /.content-header -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">



                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <tbody>
                            <tr v-for="user in users.data" :key="user.id">

                                <td>{{user.name}}</td>

                                <td v-bind:title=" user.role.name +' '+ user.group.name+' '+ user.region_point.name+' '+ user.region_point.region_center.region_county.name">{{user.username}}</td>



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


         setInterval(()=>this.loadUsers(),5000);
    }

}
</script>
