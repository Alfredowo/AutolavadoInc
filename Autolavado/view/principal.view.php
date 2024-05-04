<main>
    <h1>Bienvenido Dios</h1>
</main>
<style>
    .container {
        text-align: center;
    }
    .date {
        font-size: 40px;
        color: #333;
    }
    .time {
        font-size: 60px;
        color: #007bff;
    }
</style>

<div class="container">
    <br><br><br>
    <div class="date" id="date"></div>
    <div class="time" id="time"></div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>

<script>
    function updateTime() {
        var now = new Date();
        var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        document.getElementById('date').textContent = now.toLocaleDateString('es-ES', options);
        document.getElementById('time').textContent = now.toLocaleTimeString('es-ES');
    }
    updateTime();
    setInterval(updateTime, 1000); // Actualizar cada segundo
</script>