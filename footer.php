</main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="bootstrap-4.3.1/dist/js/popper.min.js"></script>
    <script src="bootstrap-4.3.1/dist/js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
feather.replace()
    </script>

    <!-- Graphs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script>
      var ctx = document.getElementById("myChart");
      var myChart = new Chart(ctx, {
    type: 'line',
        data: {
        labels: ["Segunda", "Terca", "Quarta", "Quinta", "Sexta", "Sabado", "Domingo"],
          datasets: [{
            data: [10, 9, 5, 15, 20, 7, 22],
            lineTension: 0,
            backgroundColor: 'transparent',
            borderColor: '#007bff',
            borderWidth: 4,
            pointBackgroundColor: '#007bff'
          }]
        },
        options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: false
              }
            }]
          },
        legend: {
            display: false,
          }
    }
      });
    </script>
  </body>
</html>
