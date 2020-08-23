<template>
    <div>
        <form @submit="formSubmit">

            <button v-if="show" type="submit" class ="btn btn-success" style="width: 100%;">Apply</button>
        </form>
        <div v-else class="alert alert-success">
            Application sent successfully
        </div>

    </div>
</template>

<script>
    export default {
        props:["jobid"],
        mounted() {
            console.log('Component mounted.')
        },
        data(){
            return {
                'show':true
            }
        },
        methods: {
            formSubmit(e){
                e.preventDefault(e);
                axios.post('/applications/'+ this.jobid, {

                }).then((response)=>{
                    this.show = false
                });
            }
        }
    }
</script>
