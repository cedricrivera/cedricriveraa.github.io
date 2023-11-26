<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <title>Document</title>
</head>
<body>
<div>
  <canvas id="mybarChart"></canvas>
</div>
<div>
<canvas id="mylineChart"></canvas>
</div>
<div>
<canvas id="mydonutChart"></canvas>
</div>
<script>
  const myChart = new Chart(
    document.getElementById('mybarChart'),
    config
  );

  const data = {
    type: 'bar',
    data: {
      labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
      datasets: [{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2, 3],
        borderWidth: 1
  }]
    },
    options: {
      aspectRati0:1,
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  };

  // LINE CHART
  const ctx = document.getElementById('mylineChart');

  new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
      datasets: [{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2, 3],
        borderWidth: 1
      }]
    },
    options: {
      aspectRati0:1,
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  // DONUT CHART
  const ctx = document.getElementById('mydonutChart');

  new Chart(ctx, {
    type: 'pie',
    data: {
      labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
      datasets: [{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2, 3],
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
</script>
 
  
</body>
</html>