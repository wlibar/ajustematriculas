

<h4>Resultados</h4>
<div class="chart-bar">
    <canvas id="myBarChart"></canvas>
</div>


<script src="assets/vendor/chart.js/Chart.min.js"></script>

<script>
// Set new default font family and font color to mimic Bootstrap's default styling
//Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
//Chart.defaults.global.defaultFontColor = '#858796';


// Bar Chart Example
var ctx = document.getElementById("myBarChart");
var myBarChart = new Chart(ctx, {
type: 'horizontalBar',
    data: {
      labels: [
		<?php foreach($datos as $d):?>
        "<?php echo $d->nombre?>", 
        <?php endforeach; ?>
      ],
      datasets: [
        {
          label: "Solicitudes",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
          data: [
	   		<?php foreach($datos as $d):?>
	        <?php echo $d->total;?>, 
	        <?php endforeach; ?>
          ]
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'Solicitudes de adición de asignaturas 2019.2'
      }
    }
});
</script>