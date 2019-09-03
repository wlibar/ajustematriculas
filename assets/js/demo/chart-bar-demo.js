// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';


// Bar Chart Example
var ctx = document.getElementById("myBarChart");
var myBarChart = new Chart(ctx, {
type: 'horizontalBar',
    data: {
      labels: ["Cálculo I", "Algebra Lineal", "Vibraciones y ondas", 
          "Sistemas distribuidos", "Teoría de la computacion"],
      datasets: [
        {
          label: "Solicitudes",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
          data: [12,5,34,12,2]
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
