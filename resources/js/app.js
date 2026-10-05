import { createApp } from 'vue/dist/vue.esm-bundler'
import CookiesWarning from "./components/CookiesWarning.vue"
import axios from 'axios';
import "./vendor/mobile-menu/mobile-menu.js"

if (document.querySelector("#modal_app")) {
    const mobile_app = createApp({
        components: {
            CookiesWarning,
        },
        setup() { }
    })

    mobile_app.use(axios)
    mobile_app.mount("#modal_app");
}
