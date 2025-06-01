<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div class="row">
    <div class="col-12 col-md-6">
        <div class="row">
            <div class="col-12">
                <h4 class="text-center">Promedio consumo galones por mes</h4>
                <canvas id="graficoPromedioGalones" width="100" height="40"></canvas>
            </div>
            <div class="col-12">
                <h4 class="text-center">Promedio horas viajes por mes</h4>
                <canvas id="graficoPromedioHorasViajes" width="100" height="40"></canvas>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6" style="width: 45%; height: auto;">
        <h4 class="text-center">KM recorridos por mes</h4>
        <canvas id="graficoKmRecorridos" width="400" height="100"></canvas>
    </div>
</div>
<script>
    const datosPromedioGalones = <?= json_encode($promedioGalonesConsumidosPorMes) ?>;
    const datosKmRecorridos = <?= json_encode($kmRecorridosPorMes) ?>;
    const datosPromedioHorasViajes = <?= json_encode($promedioHorasViajesPorMes) ?>;
    
    const etiquetasGrafico1 = datosPromedioGalones.map(d => d.fecha);
    const valoresGrafico1 = datosPromedioGalones.map(d => d.promedio_galones_consumidos);
    
    const etiquetasGrafico2 = datosKmRecorridos.map(d => d.fecha);
    const valoresGrafico2 = datosKmRecorridos.map(d => d.km_recorridos);
    
    const etiquetasGrafico3 = datosPromedioHorasViajes.map(d => d.fecha);
    const valoresGrafico3 = datosPromedioHorasViajes.map(d => d.promedio_horas);

    new Chart(document.getElementById('graficoPromedioGalones'), {
        type: 'bar',
        data: {
            labels: etiquetasGrafico1,
            datasets: [{
                label: 'Consumo galones',
                data: valoresGrafico1,
                backgroundColor: 'rgba(75, 192, 192, 0.5)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
    
    new Chart(document.getElementById('graficoKmRecorridos'), {
        type: 'pie',
        data: {
            labels: etiquetasGrafico2,
            datasets: [{
                label: 'KM recorridos',
                data: valoresGrafico2
            }]
        },
        options: {
            responsive: true
        }

    });
    
    new Chart(document.getElementById('graficoPromedioHorasViajes'), {
        type: 'line',
        data: {
            labels: etiquetasGrafico3,
            datasets: [{
                label: 'Horas viajes',
                data: valoresGrafico3
            }]
        },
        options: {
            responsive: true
        }
    });
</script>