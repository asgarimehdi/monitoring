<template>
    <!-- /.content-header -->
    <div class="container">
        <div class="row">
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
                                <input v-model="form.new_password" type="password" placeholder="رمز عبور جدید" name="new_password"
                                       id="new_password"
                                       class="form-control" :class="{ 'is-invalid': form.errors.has('new_password') }">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">رمز عبور جدید</span>
                                </div>
                                <has-error :form="form" field="new_password"></has-error>
                            </div>

                            <div class="input-group p-2">
                                <input v-model="form.confirm_password" type="password" placeholder="تکرار رمز عبور" name="confirm_password"
                                       id="confirm_password" data-match="new_password"
                                       class="form-control" :class="{ 'is-invalid': form.errors.has('confirm_password') }">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">تکرار رمز عبور</span>
                                </div>
                                <has-error :form="form" field="confirm_password"></has-error>
                            </div>

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


    </div>


</template>

<script>
    export default {
        data() {
            return {
                // Create a new form instance
                form: new Form({

                    password: '',
                    new_password: '',
                    confirm_password: ''
                })
            }
        },
        methods: {
            updateUser() {
                this.$Progress.start();
                this.form.put('api/changePassword')
                    .then(() => {
                        toast.fire({
                            type: 'success',
                            title: 'رمز عبور ویرایش شد'
                        });
                        this.$Progress.finish();
                        axios.post('/logout').then(() => {
                            window.location.href = '/login';
                        });
                    })
                    .catch(() => {
                        this.$Progress.fail();
                    });
            },

        },
        created() {
            // setInterval(()=>this.loadUsers(),5000);
        }

    }
</script>
