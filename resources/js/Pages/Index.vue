<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="my-5">
                    <h1 class="mb-3">User Index</h1>
                    <ul class="list-group">
                        <li v-for="user in users" :key="user.id" class="list-group-item">
                            {{user}}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'
export default {
   props:['users']
}
</script>
<style scoped>

</style>

