var ctx = document.getElementById('myChart');
var ctx2 = document.getElementById('myChart2');

const datapoints = [0, 20, 80, 60, 30, 120];
const DATA_COUNT = datapoints.length;
const labels = [];
for (let i = 0; i < DATA_COUNT; ++i) {
  labels.push(i.toString());
}

var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: labels,
        datasets: [
            {
                label: 'Orders',
                data: datapoints,
                borderColor: '#87574b',
                backgroundColor: '#87574b',
                fill: false,
                cubicInterpolationMode: 'monotone',
                tension: 0.4,
                radius:5
            }
        ]
    },
    options: {
    responsive: true,
    plugins: {
      title: {
        display: true,
        text: 'Weekly Income'
      },
    },
    interaction: {
      intersect: false,
    },
    scales: {
      x: {
        display: true,
        title: {
          display: true
        }
      },
      y: {
        display: true,
        title: {
          display: true,
          text: 'Income (Rs.)'
        },
        suggestedMax: 200
      }
    }
  }
});
var myChart = new Chart(ctx2, {
    type: 'line',
    data: {
        labels: labels,
        datasets: [
            {
                label: 'Orders',
                data: datapoints,
                borderColor: '#87574b',
                backgroundColor: '#87574b',
                fill: false,
                cubicInterpolationMode: 'monotone',
                tension: 0.4,
                radius:5
            }
        ]
    },
    options: {
    responsive: true,
    plugins: {
      title: {
        display: true,
        text: 'Weekly Sales'
      },
    },
    interaction: {
      intersect: false,
    },
    scales: {
      x: {
        display: true,
        title: {
          display: true
        }
      },
      y: {
        display: true,
        title: {
          display: true,
          text: 'Sales'
        },
        suggestedMax: Math.max(datapoints)
      }
    }
  }
});

//validate add admin form
function validateAddAdminForm() {
  let password = document.forms["addAdminForm"]["password"].value;
  let cPassword = document.forms["addAdminForm"]["cPassword"].value;
  if (password.length < 8) {
    alert("Password must have adleast 8 charactors!");
    return false;
  }
  if (password != cPassword) {
    alert("Confirm password did not matched!");
    return false;
  }
} 