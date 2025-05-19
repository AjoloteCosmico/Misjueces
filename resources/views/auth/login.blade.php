
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>misjueces.mx - Acceso Abogados</title>
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90' fill='%232a9d8f'>⚖️</text></svg>">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Sistema de diseño consistente */
        :root {
            --primary-teal: #2a9d8f;
            --deep-teal: #264653;
            --light-teal: #e9f5ef;
            --glass-white: rgba(255, 255, 255, 0.9);
            --glass-border: rgba(255, 255, 255, 0.3);
            --glass-shadow: 0 8px 32px rgba(31, 38, 135, 0.1);
            --text-dark: #2b2d42;
            --text-light: #f8f9fa;
            --error-red: #e76f51;

            --h1-size: 2.5rem;
            --h2-size: 1.8rem;
            --h3-size: 1.5rem;
            --body-size: 1.1rem;
            --caption-size: 0.9rem;

            --border-radius: 12px;
            --spacing-unit: 8px;
        }

        /* Reset y estilos base */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            color: var(--text-dark);
            background: linear-gradient(135deg, var(--light-teal) 0%, #ffffff 100%);
            line-height: 1.7;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        h1, h2, h3 {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            line-height: 1.3;
        }

        /* Utilidades */
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 var(--spacing-unit);
        }

        .glass-card {
            background: var(--glass-white);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid var(--glass-border);
            border-radius: var(--border-radius);
            box-shadow: var(--glass-shadow);
            padding: 2.5rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 1rem 2.5rem;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            position: relative;
            overflow: hidden;
            z-index: 1;
            border: none;
            cursor: pointer;
            width: 100%;
            margin-top: 1.5rem;
        }

        .btn-primary {
            background: var(--primary-teal);
            color: white;
            box-shadow: 0 4px 15px rgba(42, 157, 143, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(42, 157, 143, 0.4);
        }

        /* Página de Login/Registro */
        .auth-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            flex-grow: 1;
            padding: 4rem 0;
        }

        .auth-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .auth-header h1 {
            font-size: var(--h1-size);
            color: var(--deep-teal);
            margin-bottom: 1rem;
        }

        .auth-header p {
            font-size: var(--body-size);
            max-width: 600px;
            margin: 0 auto;
        }

        .auth-card {
            width: 100%;
            max-width: 500px;
            margin-bottom: 2rem;
        }

        .auth-tabs {
            display: flex;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
        }

        .auth-tab {
            padding: 1rem 2rem;
            cursor: pointer;
            font-weight: 600;
            color: var(--text-dark);
            opacity: 0.6;
            transition: all 0.3s ease;
            position: relative;
        }

        .auth-tab.active {
            opacity: 1;
            color: var(--primary-teal);
        }

        .auth-tab.active::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 0;
            width: 100%;
            height: 2px;
            background: var(--primary-teal);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            font-size: var(--body-size);
        }

        .form-control {
            width: 100%;
            padding: 1rem;
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: var(--border-radius);
            font-size: var(--body-size);
            transition: border 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-teal);
            box-shadow: 0 0 0 3px rgba(42, 157, 143, 0.2);
        }

        .privacy-notice {
            background: rgba(42, 157, 143, 0.1);
            padding: 1.5rem;
            border-radius: var(--border-radius);
            margin: 2rem 0;
            text-align: center;
        }

        .privacy-notice i {
            color: var(--primary-teal);
            font-size: 1.5rem;
            margin-bottom: 1rem;
            display: block;
        }

        .verification-process {
            margin-top: 3rem;
            padding: 1.5rem;
            background: rgba(233, 245, 239, 0.5);
            border-radius: var(--border-radius);
        }

        .verification-process h3 {
            font-size: var(--h3-size);
            margin-bottom: 1rem;
            color: var(--deep-teal);
            display: flex;
            align-items: center;
        }

        .verification-process h3 i {
            margin-right: 10px;
            color: var(--primary-teal);
        }

        .verification-process ol {
            padding-left: 1.5rem;
        }

        .verification-process li {
            margin-bottom: 0.8rem;
        }

        /* Footer */
        footer {
            background: var(--deep-teal);
            color: var(--text-light);
            padding: 2rem 0;
            text-align: center;
        }

        /* Responsive */
        @media (max-width: 768px) {
            :root {
                --h1-size: 2rem;
                --h2-size: 1.5rem;
            }

            .auth-container {
                padding: 2rem 0;
            }

            .auth-card {
                padding: 1.5rem;
            }

            .auth-tab {
                padding: 0.8rem 1rem;
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
    <!-- Contenido Principal -->
    <main class="auth-container">
        <div class="auth-header">
            <h1>Acceso para Abogados</h1>
            <p>Verificación de credenciales mediante el Registro Nacional de Profesionistas</p>
        </div>

        <div class="auth-card glass-card">
            <div class="auth-tabs">
                <div class="auth-tab active">Iniciar Sesión</div>
                <div class="auth-tab">Registro</div>
            </div>

            <!-- Formulario de Login -->
            <form method="POST" action="{{ route('login') }}" id="loginForm" style="display: block;">
            @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input  class="form-control" placeholder="email@dominio.com" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
<!--
                <div class="form-group">
                    <label for="loginCURP">CURP</label>
                    <input type="text" id="loginCURP" class="form-control" placeholder="Ej. ABCD123456HDFGHI01" required>
                </div>
                 -->
                <div class="form-group">
                    <label for="loginPassword">Contraseña</label>
                    <input  class="form-control" placeholder="••••••••" type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                  <!-- Remember Me -->
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

            </form>

            <!-- Formulario de Registro -->
            <form method="POST" action="{{ route('register') }}" id="registerForm" style="display: none;">
            @csrf
                <div class="form-group">
                    <label for="registerName">Nombre Completo</label>
                    <input id="name" class="form-control"  type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div class="form-group">
                    <label for="registerCedula">Número de Cédula Profesional</label>
                    <input type="text" id="registerCedula" name="cedula" :value="old('cedula')" class="form-control" placeholder="Ej. 12345678" required>
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
                    <h3>Tu identidad será anónima</h3>
                    <p>Todas tus evaluaciones y comentarios se publicarán de manera anónima para proteger tu privacidad.</p>
                </div>
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-user-plus" style="margin-right: 10px;"></i>
                    Registrar como Abogado
                </button>
            </form>

            <div class="verification-process">
                <h3><i class="fas fa-clipboard-check"></i> Proceso de Verificación</h3>
                <ol>
                    <li>Descarga diaria de la base de datos del Registro Nacional de Profesionistas (SEP)</li>
                    <li>Cotejo automático de tu cédula y nombre con los registros oficiales</li>
                    <li>Activación de tu cuenta como jurista verificada</li>
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
        // Toggle entre Login y Registro
        const tabs = document.querySelectorAll('.auth-tab');
        const loginForm = document.getElementById('loginForm');
        const registerForm = document.getElementById('registerForm');

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                tabs.forEach(t => t.classList.remove('active'));
                tab.classList.add('active');

                if (tab.textContent === 'Iniciar Sesión') {
                    loginForm.style.display = 'block';
                    registerForm.style.display = 'none';
                } else {
                    loginForm.style.display = 'none';
                    registerForm.style.display = 'block';
                }
            });
        });


    </script>
    // Modals para mostrar textos de legales
    <div class="modal fade" id="legalModal" tabindex="-1" aria-labelledby="legalModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="legalModalLabel"></h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body legal-content p-4">
                    <!-- Contenido dinámico se insertará aquí -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
    function showAvisoLegal(tipo) {
        fetch(`/avisos-legales/${tipo}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('legalModalLabel').textContent = data.titulo;
                document.querySelector('.legal-content').innerHTML = data.contenido;
                new bootstrap.Modal(document.getElementById('legalModal')).show();
            });
    }
    </script>

</body>
</html>
