<template>
    <button @click="del()" class="btn btn-outline-danger" :disabled="isClicked">
        <i v-if="isLoading" class="fa-solid fa-pulse fa-spinner "></i>
        <i v-else class="fa-solid fa-trash-alt"></i>
    </button>
</template>

<script>
export default {
    name: "DeleteButton",
    props:['id'],
    data() {
        return {
            isClicked: false,
            isLoading: false
        }
    },
    methods: {
        del() {
            this.isClicked=true
            this.$swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.isLoading = true,
                    this.$inertia.delete(`user/${this.id}`,{
                        preserveScroll:true,
                        onSuccess:()=>{
                            const Toast = this.$swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter', this.$swal.stopTimer)
                                    toast.addEventListener('mouseleave', this.$swal.resumeTimer)
                                }
                            })

                            Toast.fire({
                                icon: 'success',
                                title: this.status
                            })
                        }
                    });
                }
                else{
                    this.isClicked=false
                }
            })


        },
    },
}
</script>

<style scoped>

</style>
