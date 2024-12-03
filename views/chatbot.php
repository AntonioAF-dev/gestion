<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Configuración de OpenAI API
define('OPENAI_API_URL', 'https://api.openai.com/v1/chat/completions');
define('OPENAI_API_KEY', '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');

if (!isset($_SESSION['chat_history'])) {
    $_SESSION['chat_history'] = array();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['message'])) {
    $userMessage = strip_tags($_POST['message']);
    $botResponse = getBotResponse($userMessage);

    $chatEntry = array(
        'user' => $userMessage,
        'bot' => $botResponse
    );

    array_push($_SESSION['chat_history'], $chatEntry);
    echo json_encode($chatEntry);
    exit;
}

function getBotResponse($message)
{
    $data = array(
        'model' => 'gpt-3.5-turbo',
        'messages' => array(
            array(
                'role' => 'system',
                'content' => 'Eres un asistente virtual amigable y servicial que proporciona respuestas claras y útiles.'
            ),
            array(
                'role' => 'user',
                'content' => $message
            )
        ),
        'temperature' => 0.7,
        'max_tokens' => 250
    );

    $ch = curl_init(OPENAI_API_URL);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Authorization: Bearer ' . OPENAI_API_KEY,
        'Content-Type: application/json'
    ));
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Solo para desarrollo local

    try {
        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            throw new Exception(curl_error($ch));
        }

        $responseData = json_decode($response, true);

        if (isset($responseData['choices'][0]['message']['content'])) {
            return $responseData['choices'][0]['message']['content'];
        } else {
            error_log("OpenAI Response Error: " . print_r($responseData, true));
            return "Lo siento, no pude procesar tu mensaje. ¿Podrías intentarlo de nuevo?";
        }
    } catch (Exception $e) {
        error_log("Error API: " . $e->getMessage());
        return "Hubo un error al procesar tu mensaje. Por favor, intenta nuevamente.";
    } finally {
        curl_close($ch);
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asistente Virtual</title>
    <style>
        .chat-container {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 380px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.2);
            display: none;
            z-index: 1000;
            font-family: system-ui, -apple-system, sans-serif;
        }

        .chat-header {
            background: linear-gradient(135deg, #00A3FF 0%, #0066FF 100%);
            color: white;
            padding: 15px 20px;
            border-radius: 15px 15px 0 0;
            cursor: pointer;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .chat-body {
            height: 450px;
            overflow-y: auto;
            padding: 20px;
            background: #F8FAFC;
        }

        .chat-input {
            padding: 15px;
            background: white;
            border-radius: 0 0 15px 15px;
            border-top: 1px solid #E2E8F0;
            display: flex;
            gap: 10px;
        }

        .chat-input input {
            flex: 1;
            padding: 12px 15px;
            border: 2px solid #E2E8F0;
            border-radius: 10px;
            outline: none;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .chat-input input:focus {
            border-color: #0066FF;
            box-shadow: 0 0 0 3px rgba(0, 102, 255, 0.1);
        }

        .chat-input button {
            padding: 12px 20px;
            background: #0066FF;
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .chat-input button:hover {
            background: #0052CC;
            transform: translateY(-1px);
        }

        .chat-toggle {
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
            box-shadow: 0 4px 15px rgba(0, 102, 255, 0.3);
            transition: all 0.3s ease;
        }

        .chat-toggle:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 20px rgba(0, 102, 255, 0.4);
        }

        .message {
            margin: 8px 0;
            padding: 12px 16px;
            border-radius: 15px;
            max-width: 85%;
            font-size: 14px;
            line-height: 1.5;
            position: relative;
            animation: messageSlide 0.3s ease;
        }

        @keyframes messageSlide {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .user-message {
            background: #0066FF;
            color: white;
            margin-left: auto;
            border-bottom-right-radius: 5px;
        }

        .bot-message {
            background: white;
            color: #1E293B;
            margin-right: auto;
            border-bottom-left-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .typing {
            display: flex;
            align-items: center;
            gap: 5px;
            padding: 12px 16px;
            background: white;
            border-radius: 15px;
            margin: 8px 0;
            max-width: fit-content;
            display: none;
        }

        .typing span {
            width: 8px;
            height: 8px;
            background: #0066FF;
            border-radius: 50%;
            opacity: 0.4;
            animation: pulse 1s infinite;
        }

        .typing span:nth-child(2) {
            animation-delay: 0.2s;
        }

        .typing span:nth-child(3) {
            animation-delay: 0.4s;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 0.4;
                transform: scale(1);
            }

            50% {
                opacity: 1;
                transform: scale(1.2);
            }
        }
    </style>
</head>

<body>
    <div class="chat-toggle" onclick="toggleChat()">
        💬
    </div>

    <div class="chat-container">
        <div class="chat-header">
            <span>Asistente Virtual</span>
            <span onclick="toggleChat()" style="cursor:pointer">✕</span>
        </div>
        <div class="chat-body">
            <div class="message bot-message">
                ¡Hola! Soy tu asistente virtual. ¿En qué puedo ayudarte hoy?
            </div>
            <?php foreach ($_SESSION['chat_history'] as $entry): ?>
                <div class="message user-message"><?php echo htmlspecialchars($entry['user']); ?></div>
                <div class="message bot-message"><?php echo htmlspecialchars($entry['bot']); ?></div>
            <?php endforeach; ?>
            <div class="typing">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <div class="chat-input">
            <input type="text" id="userMessage" placeholder="Escribe tu mensaje aquí..." autocomplete="off">
            <button onclick="sendMessage()">
                <span>Enviar</span>
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M22 2L11 13M22 2L15 22L11 13M22 2L2 9L11 13" />
                </svg>
            </button>
        </div>
    </div>

    <script>
        function toggleChat() {
            const chatContainer = document.querySelector('.chat-container');
            const isHidden = chatContainer.style.display === 'none';
            chatContainer.style.display = isHidden ? 'block' : 'none';

            if (isHidden) {
                document.getElementById('userMessage').focus();
            }
        }

        function showTyping() {
            document.querySelector('.typing').style.display = 'flex';
            const chatBody = document.querySelector('.chat-body');
            chatBody.scrollTop = chatBody.scrollHeight;
        }

        function hideTyping() {
            document.querySelector('.typing').style.display = 'none';
        }

        function sendMessage() {
            const input = document.getElementById('userMessage');
            const message = input.value.trim();

            if (!message) return;

            const chatBody = document.querySelector('.chat-body');

            // Mensaje del usuario
            const userDiv = document.createElement('div');
            userDiv.className = 'message user-message';
            userDiv.textContent = message;
            chatBody.appendChild(userDiv);

            // Limpiar input y mostrar typing
            input.value = '';
            showTyping();
            input.focus();

            // Enviar al servidor
            fetch(window.location.href, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'message=' + encodeURIComponent(message)
                })
                .then(response => response.json())
                .then(data => {
                    hideTyping();

                    const botDiv = document.createElement('div');
                    botDiv.className = 'message bot-message';
                    botDiv.textContent = data.bot;
                    chatBody.appendChild(botDiv);
                    chatBody.scrollTop = chatBody.scrollHeight;
                })
                .catch(error => {
                    console.error('Error:', error);
                    hideTyping();

                    const errorDiv = document.createElement('div');
                    errorDiv.className = 'message bot-message';
                    errorDiv.textContent = 'Lo siento, ocurrió un error. Por favor, intenta nuevamente.';
                    chatBody.appendChild(errorDiv);
                    chatBody.scrollTop = chatBody.scrollHeight;
                });
        }

        // Enter para enviar
        document.getElementById('userMessage').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                sendMessage();
            }
        });

        // Abrir chat automáticamente después de 2 segundos
        setTimeout(() => {
            if (document.querySelector('.chat-container').style.display === 'none') {
                toggleChat();
            }
        }, 2000);
    </script>
</body>

</html>