
import { createApp, h } from 'vue'
import { createInertiaApp,Link } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress'
import VueSweetalert2 from 'vue-sweetalert2'


InertiaProgress.init({
    color:"var(--bs-primary)",
    showSpinner:true
})

createInertiaApp({
    resolve: name => require(`./Pages/${name}`),
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(VueSweetalert2)
            .component('Link',Link)
            .mount(el)

    },
})
