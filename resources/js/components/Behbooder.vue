<template>
    <!-- /.content-header -->
    <div class="container">
        <div class="row" v-if="$gate.isAdmin()">
            <div class="col-md-8 container-fluid">
                <div class="card bg-info-gradient">
                    <div class="card-header">
                        <h3 class="card-title">
بهبود کننده دو هفته کرونا
                        </h3>


                    </div>
                    <!-- /.card-header -->
                    <div class="card-body  p-0">

                        <button @click="behbooder"  type="button" class="btn btn-warning mr-2">بهبودر</button>

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
    import moment from "moment-jalaali";

    export default {
        data() {
            return {
                // Create a new form instance

                minDate:moment(new Date()).subtract(14, 'days').format('YYYY-MM-DD'),
                maxDate:moment(new Date()).subtract(1, 'days').format('YYYY-MM-DD'),
                    return1: '',


            }
        },
        methods: {
            behbooder() {
                axios.get("api/tools/behbooder/"+ this.minDate + "/" + this.maxDate ).then(({data}) => (this.return1 = data)).then(() => {
                    toast.fire({
                        type: 'success',
                        title: this.return1
                    });
                }).catch(() => {
                    toast.fire({

                        type: 'error',
                        title: 'خطایی در لود نقاط رخ داد'
                    });
                });
            },

        },
        created() {
             //setInterval(()=>this.aa(),5000);
        }

    }
</script>
