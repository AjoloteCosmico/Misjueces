<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>misjueces.mx - Registro Ciudadano</title>
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90' fill='%232a9d8f'>⚖️</text></svg>">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* [Mantener todo el CSS existente igual] */
        /* Solo agregaremos un pequeño estilo para el enlace de alternar */
        .toggle-form-link {
            color: var(--primary-teal);
            cursor: pointer;
            font-weight: 600;
            text-decoration: underline;
            margin-top: 1rem;
            display: inline-block;
        }
        .toggle-form-link:hover {
            text-decoration: none;
        }
    </style>
</head>
<body>
    <!-- Contenido Principal -->
    <main class="auth-container">
        <div class="auth-header">
            <h1>Registro Ciudadano</h1>
            <p>Únete para evaluar y comentar sobre el desempeño judicial</p>
        </div>

        <div class="auth-card glass-card">
            <div class="auth-tabs" style="display: none;"> <!-- Ocultamos los tabs ya que usaremos otro método -->
                <div class="auth-tab">Iniciar Sesión</div>
                <div class="auth-tab active">Registro</div>
            </div>

            <!-- Formulario de Login - Oculto por defecto -->
            <form method="POST" action="{{ route('login') }}" id="loginForm" style="display: none;">
            @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input  class="form-control" placeholder="email@dominio.com" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="form-group">
                    <label for="loginPassword">Contraseña</label>
                    <input  class="form-control" placeholder="••••••••" type="password"
                            name="password"
                            required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                        <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-sign-in-alt" style="margin-right: 10px;"></i>
                        Acceder
                    </button>
                </div>

                <p class="toggle-form-link" onclick="showRegisterForm()">
                    ¿No tienes cuenta? Regístrate aquí
                </p>
            </form>

            <!-- Formulario de Registro - Visible por defecto -->
            <form method="POST" action="{{ route('register') }}" id="registerForm" style="display: block;">
            @csrf
                <div class="form-group">
                    <label for="registerName">Nombre Completo</label>
                    <input id="name" class="form-control"  type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div class="form-group">
                    <label for="registerEmail">Correo Electrónico</label>
                    <input id="email" class="form-control"  type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="form-group">
                    <label for="registerPhone">Número Celular (Opcional)</label>
                    <input type="tel" id="registerPhone" class="form-control" placeholder="+52 55 1234 5678" name="phone" :value="old('phone')" >
                </div>

                <div class="form-group">
                    <label for="registerPassword">Contraseña</label>
                    <input id="password" class="form-control"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="form-group">
                    <label for="registerPasswordConfirm">Confirmar Contraseña</label>
                    <input id="password_confirmation" class="form-control"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="privacy-notice">
                    <i class="fas fa-user-shield"></i>
                    <h3>Tu privacidad es importante</h3>
                    <p>Todas tus evaluaciones y comentarios se publicarán de manera anónima para proteger tu privacidad.</p>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-paper-plane" style="margin-right: 10px;"></i>
                    Enviar registro
                </button>

                <p class="toggle-form-link" onclick="showLoginForm()">
                    ¿Ya estás registrado? Ingresa aquí
                </p>
            </form>

            <div class="verification-process">
                <h3><i class="fas fa-clipboard-check"></i> Sobre tu cuenta</h3>
                <ol>
                    <li>Registro simple y rápido como ciudadano</li>
                    <li>Puedes evaluar y comentar sobre el desempeño judicial</li>
                    <li>Tus contribuciones ayudan a mejorar el sistema judicial</li>
                </ol>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p>misjueces.mx © 2023 - Plataforma de evaluación judicial</p>
        </div>
    </footer>

    <script>
        // Función para mostrar el formulario de registro
        function showRegisterForm() {
            document.getElementById('loginForm').style.display = 'none';
            document.getElementById('registerForm').style.display = 'block';
            document.querySelector('.auth-header h1').textContent = 'Registro Ciudadano';
            document.querySelector('.auth-header p').textContent = 'Únete para evaluar y comentar sobre el desempeño judicial';
        }

        // Función para mostrar el formulario de login
        function showLoginForm() {
            document.getElementById('registerForm').style.display = 'none';
            document.getElementById('loginForm').style.display = 'block';
            document.querySelector('.auth-header h1').textContent = 'Iniciar Sesión';
            document.querySelector('.auth-header p').textContent = 'Accede a tu cuenta para continuar';
        }
    </script>
</body>
</html>
