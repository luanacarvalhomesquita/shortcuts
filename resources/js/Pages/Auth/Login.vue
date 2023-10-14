<template>
    <form>
        <div class="w-1/2 mx auto">
            <div>
                <label for="email" class="label">Email</label>
                <input type="text" id="email" class="input" />
                <div class="input-error">Potential errors</div>
            </div>
            <div class="">
                <label for="password" class="label">Senha</label>
                <input type="password" id="password" class="input" />
                <div class="input-error">Potential errors</div>
            </div>
            <div>
                <button class="btn-primary" type="submit">
                    ENTRAR
                </button>
            </div>
            <div></div>
        </div>
    </form>
</template>

<script>
import LoginLayout from '@/Layouts/LoginLayout.vue'

export default {
layout: LoginLayout,
data() {
    return {
    pageTitle: 'Login',
    }
},
}
</script>
