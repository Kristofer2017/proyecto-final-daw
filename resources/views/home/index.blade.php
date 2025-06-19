@extends('layout.app')

@push('css')
    <style>
        .chart-area, .chart-pie {
            display: flex;
            justify-content: center;
            padding-right: 1rem;
        }
    </style>
@endpush

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>

<div class="row">

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total de citas
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalCitas }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Total de pacientes
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPacientes }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Total de doctores
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalDoctores }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fa-solid fa-briefcase-medical fa-2x text-gray-300"></i>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Aseguradoras
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalSeguros }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fa-solid fa-house-medical fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mb-5">
    <div class="col-xl-7">
        <div class="card shadow h-100">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Citas por doctor</h6>
            </div>
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-5">
        <div class="card shadow h-100">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Estados de citas</h6>
            </div>
            <div class="card-body">
                <div class="chart-pie">
                    <canvas id="pieChart" width="320" height="320"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')

<script>
    const doctores = @json($doctores); // nombres de los doctores
    const citas = @json($citas);     // número de citas
    const pieData = @json(array_values($data));
    const pieLabels = @json(array_keys($data));
    
    const ctx = document.getElementById('myChart');
    const pieCtx = document.getElementById('pieChart');

    new Chart(ctx, {
    type: 'bar',
    data: {
        labels: doctores,
        datasets: [{
        label: 'Citas',
        data: citas,
        borderWidth: 1
        }]
    },
    options: {
        scales: {
        y: {
            beginAtZero: true
        }
        }
    }
    });

    new Chart(pieCtx, {
    type: 'pie',
    data: {
      labels: pieLabels,
      datasets: [{
        data: pieData,
        backgroundColor: [
          '#007bff', // En Progreso
          '#28a745', // Completada
          '#dc3545'  // Cancelada
        ]
      }]
    },
    options: {
      responsive: false,
      plugins: {
        legend: {
          position: 'bottom'
        },
        tooltip: {
          callbacks: {
            label: function(context) {
              let total = context.chart._metasets[0].total || context.chart.data.datasets[0].data.reduce((a, b) => a + b, 0);
              let value = context.parsed;
              let percentage = (value / total * 100).toFixed(1);
              return `${context.label}: ${value} (${percentage}%)`;
            }
          }
        }
      }
    }
  });
</script>

@endpush