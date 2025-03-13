<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-white flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md p-8">
        <form id="loginForm" class="bg-white border border-gray-200 rounded-xl shadow-md p-8 space-y-6"
            x-data="loginForm()">
            <h2 class="text-center text-2xl font-semibold text-gray-800 mb-4">
                Masuk
            </h2>

            <div>
                <input type="email" id="email" name="email" x-model="email" @blur="validateEmail"
                    placeholder="Email"
                    class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-300 focus:border-sky-500 focus:ring-1 focus:ring-sky-500 focus:outline-none"
                    :class="{ 'border-red-500': !isEmailValid && email !== '' }" required>
                <p x-show="!isEmailValid && email !== ''" class="text-red-500 text-sm mt-1">
                    Masukkan email yang valid
                </p>
            </div>

            <div>
                <div class="relative">
                    <input :type="showPassword ? 'text' : 'password'" id="password" name="password" x-model="password"
                        @blur="validatePassword" placeholder="Password"
                        class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-300 focus:border-sky-500 focus:ring-1 focus:ring-sky-500 focus:outline-none"
                        :class="{ 'border-red-500': !isPasswordValid && password !== '' }" required>
                    <button type="button" @click="togglePasswordVisibility"
                        class="absolute inset-y-0 right-0 px-3 flex items-center text-gray-500">
                        <i x-show="!showPassword" class="fas fa-eye"></i>
                        <i x-show="showPassword" class="fas fa-eye-slash"></i>
                    </button>
                </div>
                <p x-show="!isPasswordValid && password !== ''" class="text-red-500 text-sm mt-1">
                    Password minimal 8 karakter
                </p>
            </div>

            <div>
                <button type="submit" @click.prevent="submitForm" :disabled="!isFormValid"
                    class="w-full py-3 rounded-lg bg-sky-500 text-white font-medium hover:bg-sky-600 transition duration-300 ease-in-out"
                    :class="{ 'opacity-50 cursor-not-allowed': !isFormValid }">
                    Masuk
                </button>
            </div>

            <div class="text-center">
                <a href="#" class="text-sky-500 hover:text-sky-700 text-sm">
                    Lupa Password?
                </a>
            </div>
        </form>
    </div>

    @vite('resources/js/app.js')
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script>
        function loginForm() {
            return {
                email: '',
                password: '',
                showPassword: false,
                isEmailValid: false,
                isPasswordValid: false,

                validateEmail() {
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    this.isEmailValid = emailRegex.test(this.email);
                },

                validatePassword() {
                    this.isPasswordValid = this.password.length >= 8;
                },

                togglePasswordVisibility() {
                    this.showPassword = !this.showPassword;
                },

                get isFormValid() {
                    return this.isEmailValid && this.isPasswordValid;
                },

                submitForm() {
                    if (this.isFormValid) {
                        // Kirim data login ke backend
                        console.log('Login berhasil', this.email);
                        // Tambahkan logika login Laravel di sini
                    }
                }
            }
        }
    </script>
</body>

</html>
