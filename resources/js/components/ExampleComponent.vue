<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header rtl"><b>داشبورد آماری</b></div>

                    <div class="card-body">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3 col-6">
                                    <!-- small card -->
                                    <div class="small-box bg-info">
                                        <div class="inner">
                                            <h3>150</h3>

                                            <p>New Orders</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fas fa-users"></i>
                                        </div>
                                        <a href="#" class="small-box-footer">
                                            More info <i class="fa fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-3 col-6">
                                    <!-- small card -->
                                    <div class="small-box bg-success">
                                        <div class="inner">
                                            <h3>53<sup style="font-size: 20px">%</sup></h3>

                                            <p>Bounce Rate</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fas fa-cog"></i>
                                        </div>
                                        <a href="#" class="small-box-footer">
                                            More info <i class="fa fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-3 col-6">
                                    <!-- small card -->
                                    <div class="small-box bg-warning">
                                        <div class="inner">
                                            <h3>{{users_count}}</h3>

                                            <p>کل کاربران سامانه</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fab fa-servicestack"></i>
                                        </div>
                                        <a href="#" class="small-box-footer">
                                            More info <i class="fa fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-3 col-6">
                                    <!-- small card -->
                                    <div class="small-box bg-danger">
                                        <div class="inner">
                                            <h3>65</h3>

                                            <p>Unique Visitors</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fas fa-tachometer-alt"></i>
                                        </div>
                                        <a href="#" class="small-box-footer">
                                            More info <i class="fa fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- ./col -->
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                users_count:''
            }
        },
        methods:{

            loadUsers(){
                axios.get("api/usercount").then(({data})=>(this.users_count=data));
            }
        },
        mounted() {
            this.loadUsers();
        }
    }
</script>
