<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fuentes de Financiamiento para Proyectos de Investigación en Huánuco</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --background-color: #ecf0f1;
            --card-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, var(--background-color) 0%, #f8f9fa 100%);
            color: var(--primary-color);
            line-height: 1.6;
        }

        .container {
            width: 100%;
            padding: 20px;
            max-width: 1400px;
            margin: 0 auto;
        }

        header {
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            color: white;
            text-align: center;
            padding: 40px 20px;
            clip-path: polygon(0 0, 100% 0, 100% 85%, 0 100%);
        }

        header h1 {
            font-size: 2.5rem;
            font-weight: 600;
            margin-bottom: 15px;
            letter-spacing: -1px;
        }

        header p {
            font-size: 1.2rem;
            opacity: 0.9;
        }

        .card-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            padding: 40px 20px;
        }

        .card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: var(--card-shadow);
            transition: all 0.3s ease;
            border: 2px solid transparent;
            position: relative;
            overflow: hidden;
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
        }

        .card:hover {
            transform: translateY(-10px);
            border-color: var(--secondary-color);
        }

        .card h2 {
            color: var(--secondary-color);
            margin-bottom: 15px;
            font-size: 1.5rem;
            display: flex;
            align-items: center;
        }

        .card p {
            color: #6c757d;
            margin-bottom: 15px;
        }

        .card ul {
            list-style-type: none;
            margin-bottom: 15px;
        }

        .card li {
            margin-bottom: 10px;
            padding-left: 20px;
            position: relative;
        }

        .card li::before {
            content: '•';
            color: var(--secondary-color);
            position: absolute;
            left: 0;
            font-weight: bold;
        }

        .btn {
            display: inline-block;
            background: var(--secondary-color);
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 25px;
            transition: all 0.3s ease;
            font-weight: 600;
        }

        .btn:hover {
            background: var(--primary-color);
            transform: scale(1.05);
        }

        footer {
            background: var(--primary-color);
            color: white;
            text-align: center;
            padding: 20px;
        }

        @media (max-width: 1200px) {
            .card-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .card-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Fuentes de Financiamiento para Proyectos de Investigación en Huánuco</h1>
            <p>Descubre opciones innovadoras para impulsar tu investigación desde Huánuco, Perú</p>
        </div>
    </header>

    <div class="container">
        <div class="card-grid">
            <div class="card">
                <h2>Fondos Gubernamentales</h2>
                <p>Recursos oficiales para potenciar la investigación científica nacional.</p>
                <ul>
                    <li>FONDECYT</li>
                    <li>ANII</li>
                    <li>Programa Nacional de Ciencia</li>
                </ul>
                <a href="https://www.concytec.gob.pe/" class="btn" target="_blank">Explorar</a>
            </div>

            <div class="card">
                <h2>Organismos Internacionales</h2>
                <p>Financiamiento global para proyectos con impacto internacional.</p>
                <ul>
                    <li>Banco Mundial</li>
                    <li>OMS</li>
                    <li>Fundación Gates</li>
                </ul>
                <a href="https://www.bancomundial.org/" class="btn" target="_blank">Descubrir</a>
            </div>

            <div class="card">
                <h2>Fundaciones y ONGs</h2>
                <p>Apoyo privado para investigaciones de alto impacto social.</p>
                <ul>
                    <li>Ford Foundation</li>
                    <li>Rockefeller Foundation</li>
                    <li>Fundación AVINA</li>
                </ul>
                <a href="https://www.fordfoundation.org/" class="btn" target="_blank">Investigar</a>
            </div>

            <div class="card">
                <h2>Financiamiento Corporativo</h2>
                <p>Subvenciones de empresas para proyectos innovadores.</p>
                <ul>
                    <li>Google Research</li>
                    <li>IBM Grants</li>
                    <li>Bayer Grants4Targets</li>
                </ul>
                <a href="https://research.google.com/" class="btn" target="_blank">Conocer más</a>
            </div>

            <div class="card">
                <h2>Crowdfunding</h2>
                <p>Financiamiento colectivo para proyectos científicos innovadores.</p>
                <ul>
                    <li>Kickstarter</li>
                    <li>Indiegogo</li>
                    <li>Experiment.com</li>
                </ul>
                <a href="https://www.kickstarter.com/" class="btn" target="_blank">Explorar</a>
            </div>
        </div>
    </div>

    <footer>
        <p>© 2024 Digitaliza UDH. Todos los derechos reservados</p>
    </footer>
</body>
</html>