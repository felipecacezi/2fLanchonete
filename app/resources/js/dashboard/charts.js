import Chart from 'chart.js/auto'
import axios from "axios";
import Swal from 'sweetalert2';

const getChartsData = async () => { 
  try {
    const response = await axios.get('/dashboard/charts');
    
    new Chart(
      document.getElementById('acquisitions'),
      {
        type: 'bar',
        data: {
          labels: response.data.data.charts.map(row => row.week),
          datasets: [
            {
              label: 'Pedidos nas ultimas 4 semanas',
              data: response.data.data.charts.map(row => row.orders)
            }
          ]
        }
      }
    );

  } catch (error) {
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Something went wrong!',
    });
  }
}

(async function() {
  
  getChartsData();
  
})();