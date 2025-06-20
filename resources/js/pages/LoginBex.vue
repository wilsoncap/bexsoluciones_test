<script setup lang="ts">
import TextLink from '@/components/TextLink.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import AuthBase from '@/layouts/AuthLayout.vue';
import { LoaderCircle } from 'lucide-vue-next';
import { reactive } from 'vue';
import { ref } from 'vue';
import axios from 'axios';
import { router } from '@inertiajs/vue3';

defineProps<{
    status?: string;
    canResetPassword: boolean;
}>();

const form = reactive({
  email: '',
  password: '',
  errors: {}
});


const submit = () => {

    axios.post('/api/v1/login', {
        email: form.email,
        password: form.password,
    }).then((res: any) => {
        localStorage.setItem('token', res.data.token);
        axios.defaults.headers.common['Authorization'] = `Bearer ${res.data.token}`;
        router.visit('/visits-data');
    }).catch(() => {
        alert('Login inválido');
        form.password = '';
    });// capturás lo que escribieron
};
</script>

<template>
    
    <AuthBase title="Login" description="Para entrar al sistema ingrese su email y password" class="bg-[#a3a2a2]">
        <Head title="Log in" />

        <div v-if="status" class="mb-4 text-center text-sm font-medium text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit" class="flex flex-col gap-6">
            <div class="grid gap-6">
                <div class="grid gap-2">
                    <Label for="email" class="text-gray-800">Email</Label>
                    <Input
                        id="email"
                        type="email"
                        required
                        autofocus
                        :tabindex="1"
                        autocomplete="email"
                        v-model="form.email"
                        placeholder="email@example.com"
                    />
                </div>

                <div class="grid gap-2">
                    <div class="flex items-center justify-between">
                        <Label for="email" class="text-gray-800">Password</Label>
                        <TextLink v-if="canResetPassword" :href="route('password.request')" class="text-sm" :tabindex="5">
                            Forgot password?
                        </TextLink>
                    </div>
                    <Input
                        id="password"
                        type="password"
                        required
                        :tabindex="2"
                        autocomplete="current-password"
                        v-model="form.password"
                        placeholder="Password"
                    />
                </div>



                <Button variant="ghost" type="submit" class="mt-4 w-full bg-[#ff8103]" :tabindex="4">
                    <!-- <LoaderCircle  class="h-4 w-4 animate-spin" /> -->
                    Ingresar
                </Button>
            </div>

            <!-- <div class="text-center text-sm text-muted-foreground">
                Don't have an account?
                <TextLink :href="route('register')" :tabindex="5">Sign up</TextLink>
            </div> -->
        </form>
    </AuthBase>
</template>
