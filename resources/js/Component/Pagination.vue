<template>
    <nav aria-label="Page navigation example">
        <ul class="pagination">

            <li
                v-for="link in links"
                :key="link.label"
                :class="['page-item',{'active':link.active},
                {'disabled':link.url===null}
                ]">
                <Link class="page-link" :href="link.url" v-html="link.label"></Link>
            </li>

        </ul>
    </nav>
</template>

<script>
export default {
    name: "Pagination",
    props: ['links']


}
</script>

<style scoped>

</style>
