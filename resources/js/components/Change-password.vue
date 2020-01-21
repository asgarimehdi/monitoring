<template>
    <!-- /.content-header -->
    <div class="container">
        <div class="row" v-if="$gate.isAdmin()">
            <div class="col-md-8 container-fluid">
                <div class="card bg-info-gradient">
                    <div class="card-header">
                        <h3 class="card-title">
تعییر رمز عبور کاربر
                        </h3>


                    </div>
                    <!-- /.card-header -->
                    <div class="card-body  p-0">
                        <form @submit.prevent="updateUser()">

                            <div class="input-group p-2">
                                <input v-model="form.password" type="password" placeholder="رمز عبور فعلی" name="password"
                                       id="password"
                                       class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">رمز عبور فعلی</span>
                                </div>
                                <has-error :form="form" field="password"></has-error>
                            </div>

                            <div class="input-group p-2">
                                <input v-model="form.password" type="password" placeholder="رمز عبور جدید" name="password"
                                       id="password"
                                       class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">رمز عبور جدید</span>
                                </div>
                                <has-error :form="form" field="password"></has-error>
                            </div>

                            <div class="input-group p-2">
                                <input v-model="form.password" type="password" placeholder="تکرار رمز عبور" name="password"
                                       id="password"
                                       class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">تکرار رمز عبور</span>
                                </div>
                                <has-error :form="form" field="password"></has-error>
                            </div>


                            <button type="button" class="btn btn-danger mr-2" >بستن</button>

                            <button type="submit" class="btn btn-success mr-2">ویرایش</button>


                        </form>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">


                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <div v-if="!$gate.isAdmin()">
            <not-found></not-found>
        </div>

    </div>


</template>

<script>
    export default {
        data() {
            return {
                // Create a new form instance
                editmode: false,
                users: {},
                groups: {},
                roles: {},
                counties: [],
                types: {},
                centers: {},
                points: {},
                county_selected: false,
                type_selected: false,
                center_selected: false,
                point_selected: false,
                user_county: '',

                form: new Form({
                    id: '',
                    name: '',
                    username: '',
                    password: '',
                    role_id: '',
                    group_id: '',
                    county_id: '',
                    type_id: '',
                    center_id: '',
                    point_id: '',
                    g: '',
                    group: '',
                    r: '',
                    role: '',
                    region_point: ''
                })

            }
        },
        methods: {

            getResults(page = 1) {
                axios.get('api/user?page=' + page)
                    .then(response => {
                        this.users = response.data;
                    });
            },
            updateUser() {
                this.$Progress.start();
                //console.log('editmode');
                this.form.put('api/user/' + this.form.id)
                    .then(() => {
                        this.$emit('UserTableChanged');
                        $('#addNew').modal('hide');
                        toast.fire({
                            type: 'success',
                            title: 'کاربر با موفقیت ویرایش شد'
                        });
                        this.$Progress.finish();
                    })
                    .catch(() => {
                        this.$Progress.fail();
                    });
            },
            editModal(user) {
                this.editmode = true;
                this.form.reset();
                $('#addNew').modal('show');
                this.form.fill(user);
                this.county_selected = false;
                this.type_selected = false;
                this.center_selected = false;
                this.point_selected = false;
            },
            newModal() {
                this.editmode = false;
                this.form.reset();
                $('#addNew').modal('show');
                this.county_selected = false;
                this.type_selected = false;
                this.center_selected = false;
                this.point_selected = false;
            },
            deleteUser(id) {
                swal.fire({
                    title: 'آیا اطمینان دارید؟',
                    text: "این عملیات غیر قابل بازگشت است",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'بله حذف کن!',
                    cancelButtonText: 'بیخیال'
                }).then((result) => {
                    if (result.value) {
                        this.form.delete('/api/user/' + id).then(() => {
                            swal.fire(
                                'پاک شد',
                                'با موفقیت حذف شد',
                                'success'
                            );
                            this.$emit('UserTableChanged');
                        }).catch(() => {
                            swal("Failed!", "خطایی رخ داده", "warning");
                        });

                    }
                })
            },
            loadUsers() {
                if (this.$gate.isAdmin()) {
                    this.$Progress.start();
                    axios.get("api/user").then(({data}) => (this.users = data)).then(() => {
                        this.$Progress.finish();
                    }).catch(() => {
                        this.$Progress.fail();
                        toast.fire({
                            type: 'error',
                            title: 'خطایی در لود اطلاعات رخ داد'
                        });
                    });
                }
            },
            loadGroups() {
                axios.get("api/groupList").then(({data}) => (this.groups = data)).then(() => {
                }).catch(() => {
                    toast.fire({
                        type: 'error',
                        title: 'خطایی در لود اطلاعات رخ داد'
                    });
                });

            },
            loadRoles() {
                axios.get("api/roleList").then(({data}) => (this.roles = data)).then(() => {
                }).catch(() => {
                    toast.fire({
                        type: 'error',
                        title: 'خطایی در لود اطلاعات رخ داد'
                    });
                });

            },
            loadCounties() {
                this.user_county = this.$gate.user.region_point.region_center.county_id;
                if (this.$gate.isOstan()) {
                    axios.get("api/countyList").then(({data}) => (this.counties = data)).then(() => {
                    }).catch(() => {
                        toast.fire({
                            type: 'error',
                            title: 'خطایی در لود اطلاعات رخ داد'
                        });
                    });
                } else {
                    axios.get("api/county/" + this.user_county).then(({data}) => (this.counties[0] = data)).then(() => {
                    }).catch(() => {
                        toast.fire({
                            type: 'error',
                            title: 'خطایی در لود اطلاعات رخ داد'
                        });
                    });
                }


            },
            loadTypes() {
                axios.get("api/typeList").then(({data}) => (this.types = data)).then(() => {
                }).catch(() => {
                    toast.fire({
                        type: 'error',
                        title: 'خطایی در لود اطلاعات رخ داد'
                    });
                });


            },
            loadCenters() {
                axios.get("api/centerList/" + this.form.county_id + "/" + this.form.type_id).then(({data}) => (this.centers = data)).then(() => {
                }).catch(() => {
                    toast.fire({
                        type: 'error',
                        title: 'خطایی در لود اطلاعات رخ داد'
                    });
                });

            },
            loadPoints() {
                axios.get("api/pointList/" + this.form.center_id).then(({data}) => (this.points = data)).then(() => {
                }).catch(() => {
                    toast.fire({
                        type: 'error',
                        title: 'خطایی در لود اطلاعات رخ داد'
                    });
                });

            },
            createUser() {
                this.$Progress.start();
                this.form.post('api/user')
                    .then(() => {
                        this.$emit('UserTableChanged');
                        $('#addNew').modal('hide');
                        toast.fire({
                            type: 'success',
                            title: 'کاربر با موفقیت ایجاد گردید'
                        });
                        this.$Progress.finish();

                    })
                    .catch(() => {
                        this.$Progress.fail();
                    });

            }
        },
        created() {

            Fire.$on('searching', () => {
                let query = this.$parent.search;
                axios.get('api/findUser?q=' + query)
                    .then((data) => {
                        this.users = data.data
                    })
                    .catch(() => {

                    })
            });
            this.loadUsers();
            this.loadGroups();
            this.loadRoles();
            this.loadCounties();
            this.$on('UserTableChanged', () => {
                this.loadUsers();
            });

            this.$on('countySelected', () => {
//if(this.$refs.c.value){}
                this.loadTypes();
                this.county_selected = true;
                this.type_selected = false;
                this.center_selected = false;
                //  this.point_selected=false;
            });

            this.$on('typeSelected', () => {
                // console.log(this.$refs.c.value);
                this.loadCenters();
                this.type_selected = true;
                this.center_selected = false;
                // this.point_selected=false;
            });
            this.$on('centerSelected', () => {
                this.loadPoints();
                this.center_selected = true;
                // this.point_selected=false;
            });
            this.$on('pointSelected', () => {

                this.point_selected = true;
            });


            // setInterval(()=>this.loadUsers(),5000);
        }

    }
</script>
