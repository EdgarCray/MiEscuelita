//Arreglo de audio
        var audioFiles = [
            'Minecraft.mp3',
            'Cat Minecraft.mp3'
        ];

        // Función para reproducir un audio aleatorio
        function playRandomAudio() {
            var randomIndex = Math.floor(Math.random() * audioFiles.length);
            var audioPlayer = document.getElementById('audioPlayer');
            audioPlayer.src = audioFiles[randomIndex];
            audioPlayer.load();
            audioPlayer.play();
        }

        var tiempo = Math.random() * 3000;
        // Reproducir audio aleatorio cada cierto tiempo (por ejemplo, cada 5 segundos)
        setInterval(playRandomAudio, tiempo);  