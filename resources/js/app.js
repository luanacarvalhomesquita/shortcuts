import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import '../css/app.css'
import { library } from '@fortawesome/fontawesome-svg-core'
import { faTrashAlt, faPenToSquare, faTrashRestore } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { ThemeProvider } from "@material-tailwind/react";

library.add(faTrashAlt)
library.add(faPenToSquare)
library.add(faTrashRestore)


createInertiaApp({
  resolve: async (name) => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })

    return pages[`./Pages/${name}.vue`]
  },
  setup({ el, App, props, plugin }) {
    const app = createApp({ render: () => h(App, props) });
        app.use(plugin);
        app.component('font-awesome-icon', FontAwesomeIcon)
        app.mount(el);
    },
})
