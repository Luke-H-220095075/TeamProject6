//JavaScript for the sidemenu Toggle effect

document.addEventListener('DOMContentLoaded', function () {
    const sidebar = document.getElementById('sidebar');
    const toggleBtn = document.getElementById('togglebtn');
    const navItems = document.querySelectorAll('.nav-item');

    toggleBtn.addEventListener('click', function () {
        const sidebarLeft = parseInt(window.getComputedStyle(sidebar).left);

        if (sidebarLeft >= 0) {
            sidebar.style.left = '-250px';
            navItems.forEach(item => item.classList.add('collapsed'));
        } else {
            sidebar.style.left = '0';
            navItems.forEach(item => item.classList.remove('collapsed'));
        }
    });

    document.getElementById('togglebtn').addEventListener('click', function () {
        document.getElementById('content').classList.toggle('left-collapsed');
    });
});

//Javascript for the user toggle menu

document.getElementById("user-icon").addEventListener("mouseover", function() {
    var dropdown = document.getElementById("user-dropdown");
    dropdown.classList.add("show");
  });
  
  document.getElementById("user-icon").addEventListener("mouseout", function() {
    var dropdown = document.getElementById("user-dropdown");
    dropdown.classList.remove("show");
  });
  

  //Charts Used on the Admin Dashboard
function fetchData() {
    fetch('fetch_data.php')
        .then(response => response.json())
        .then(data => {
            // Process the data and create the chart
            createChart(data);
        })
        .catch(error => console.error('Error fetching data:', error));
  }
  
  
//Apex AreaChart
// Fetch total orders data from the server
const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']; // Manually insert the months here
let totalOrders = [12, 16, 50, 30, 100, 40, 20, 28, 44, 82, 19, 50]; // Manually insert the total orders here

const areaChartOptions = {
    series: [
        {
            name: 'Sales Orders',
            data: totalOrders,
        },
    ],
    chart: {
        type: 'area',
        background: 'transparent',
        height: 350,
        stacked: false,
        toolbar: {
            show: false,
        },
    },
    colors: ['#FF5733'], // Light red color
    labels: months,
    dataLabels: {
        enabled: false,
    },
    fill: {
        gradient: {
            opacityFrom: 0.4,
            opacityTo: 0.1,
            shadeIntensity: 1,
            stops: [0, 100],
            type: 'vertical',
        },
        type: 'gradient',
    },
    grid: {
        show: true,
    },
    legend: {
        labels: {
            colors: '#f5f7ff',
        },
        show: true,
        position: 'top',
    },
    markers: {
        size: 6,
        strokeColors: '#1b2635',
        strokeWidth: 3,
    },
    stroke: {
        curve: 'smooth',
    },
    xaxis: {
        categories: months,
        axisBorder: {
            color: '#55596e',
            show: true,
        },
        axisTicks: {
            color: '#55596e',
            show: true,
        },
        labels: {
            offsetY: 5,
            style: {
                colors: '#f5f7ff',
            },
        },
        title: {
            text: 'Month',
            style: {
                color: '#f5f7ff',
            },
        },
    },
    yaxis: {
        title: {
            text: 'Sales Orders',
            style: {
                color: '#f5f7ff',
            },
        },
        labels: {
            style: {
                colors: ['#f5f7ff'],
            },
        },
    },
    tooltip: {
        shared: true,
        intersect: false,
        theme: 'dark',
    },
};

const areaChart = new ApexCharts(
    document.querySelector('#area-chart'),
    areaChartOptions
);
areaChart.render();