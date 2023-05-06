
  // Get the canvas element
  var ctx = document.getElementById('myChart').getContext('2d');

  // Create the chart data
  var data = {
    labels: ['Nombre total de publications', 'Nombre moyen de publications par utilisateur', 'Type de publication le plus commun', 'Date de la publication la plus récente'],
    datasets: [{
      data: [<?= $num_pub ?>, <?= $avg_pub_per_user ?>, <?= $most_common_type['count'] ?>, 1],
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
      ],
      borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
      ],
      borderWidth: 1
    }]
  };

  // Create the chart options
  var options = {
    responsive: true,
    maintainAspectRatio: false,
  };

  // Create the pie chart
  var chart = new Chart(ctx, {
    type: 'pie',
    data: data,
    options: options,
  });
