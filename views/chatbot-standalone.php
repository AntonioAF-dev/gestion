<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChatBot</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
        }

        #chatbot-toggle {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 60px;
            height: 60px;
            background: #0066FF;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            color: white;
            font-size: 24px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            z-index: 999;
            transition: transform 0.3s ease;
        }

        #chatbot-toggle:hover {
            transform: scale(1.1);
        }

        #chatbot-container {
            position: fixed;
            bottom: 90px;
            right: 20px;
            width: 350px;
            height: 500px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.2);
            display: none;
            z-index: 1000;
            overflow: hidden;
            flex-direction: column;
        }

        #chatbot-header {
            background: #0066FF;
            color: white;
            padding: 15px;
            font-weight: 600;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        #chatbot-close {
            cursor: pointer;
            font-size: 20px;
        }

        #chatbot-messages {
            flex: 1;
            overflow-y: auto;
            padding: 15px;
            background: #f8f9fa;
        }

        .message {
            margin: 8px 0;
            padding: 10px 15px;
            border-radius: 15px;
            max-width: 80%;
            word-wrap: break-word;
        }

        .user-message {
            background: #0066FF;
            color: white;
            margin-left: auto;
            border-bottom-right-radius: 5px;
        }

        .bot-message {
            background: white;
            color: #333;
            margin-right: auto;
            border-bottom-left-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        #chatbot-input-area {
            padding: 15px;
            background: white;
            border-top: 1px solid #eee;
            display: flex;
            gap: 10px;
        }

        #chatbot-input {
            flex: 1;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            outline: none;
        }

        #chatbot-submit {
            padding: 10px 20px;
            background: #0066FF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        #chatbot-submit:hover {
            background: #0052CC;
        }

        @media (max-width: 480px) {
            #chatbot-container {
                width: 100%;
                height: 100vh;
                bottom: 0;
                right: 0;
                border-radius: 0;
            }

            #chatbot-toggle {
                bottom: 20px;
                right: 20px;
            }
        }

        .message-time {
            font-size: 0.7em;
            opacity: 0.7;
            margin-top: 4px;
        }
    </style>
</head>
<body>
    <div id="chatbot-toggle">💬</div>

    <div id="chatbot-container">
        <div id="chatbot-header">
            <span>Asistente Virtual</span>
            <span id="chatbot-close">✕</span>
        </div>

        <div id="chatbot-messages">
            <div class="message bot-message">
                ¡Hola! Soy tu asistente virtual. ¿En qué puedo ayudarte?
            </div>
        </div>

        <div id="chatbot-input-area">
            <input type="text" id="chatbot-input" placeholder="Escribe tu mensaje aquí...">
            <button id="chatbot-submit">Enviar</button>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggle = document.getElementById('chatbot-toggle');
            const container = document.getElementById('chatbot-container');
            const close = document.getElementById('chatbot-close');
            const input = document.getElementById('chatbot-input');
            const submit = document.getElementById('chatbot-submit');
            const messages = document.getElementById('chatbot-messages');

            function formatDate(timestamp) {
                const date = new Date(timestamp * 1000);
                return date.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
            }

            async function loadChatHistory() {
                try {
                    const formData = new FormData();
                    formData.append('get_history', '1');

                    const response = await fetch('chat.php', {
                        method: 'POST',
                        body: formData
                    });

                    if (!response.ok) {
                        throw new Error('Error al cargar el historial');
                    }

                    const history = await response.json();
                    
                    messages.innerHTML = '<div class="message bot-message">¡Hola! Soy tu asistente virtual. ¿En qué puedo ayudarte?</div>';
                    
                    history.forEach(entry => {
                        addMessage(entry.user, true, entry.timestamp);
                        addMessage(entry.bot, false, entry.timestamp);
                    });
                } catch (error) {
                    console.error('Error cargando historial:', error);
                }
            }

            function toggleChat() {
                const isVisible = container.style.display !== 'none';
                container.style.display = isVisible ? 'none' : 'flex';
                toggle.style.display = isVisible ? 'flex' : 'none';
                
                if (!isVisible) {
                    loadChatHistory();
                    input.focus();
                }
            }

            function addMessage(text, isUser = false, timestamp = null) {
                const messageDiv = document.createElement('div');
                messageDiv.className = `message ${isUser ? 'user-message' : 'bot-message'}`;
                messageDiv.textContent = text;

                if (timestamp) {
                    const timeDiv = document.createElement('div');
                    timeDiv.className = 'message-time';
                    timeDiv.textContent = formatDate(timestamp);
                    messageDiv.appendChild(timeDiv);
                }

                messages.appendChild(messageDiv);
                messages.scrollTop = messages.scrollHeight;
            }

            async function sendMessage() {
                const message = input.value.trim();
                if (!message) return;

                input.value = '';
                addMessage(message, true, Math.floor(Date.now() / 1000));

                try {
                    const formData = new FormData();
                    formData.append('message', message);

                    const response = await fetch('chat.php', {
                        method: 'POST',
                        body: formData
                    });

                    if (!response.ok) {
                        throw new Error('Error en la respuesta del servidor');
                    }

                    const botResponse = await response.text();
                    addMessage(botResponse, false, Math.floor(Date.now() / 1000));
                } catch (error) {
                    console.error('Error:', error);
                    addMessage('Lo siento, ocurrió un error. Por favor, intenta nuevamente.');
                }

                input.focus();
            }

            toggle.addEventListener('click', toggleChat);
            close.addEventListener('click', toggleChat);
            submit.addEventListener('click', sendMessage);
            input.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    sendMessage();
                }
            });

            setTimeout(() => {
                toggleChat();
            }, 2000);
        });
    </script>
</body>
</html>