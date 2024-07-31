<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="sidebar">
        <div class="logo">
            <img src="images/LOGO.png" alt="Your Logo">
        </div>
        <ul>
            <li><i class="fas fa-tachometer-alt"></i> Dashboard</li>
            <li><i class="fas fa-box"></i> Orders</li>
            <li><i class="fas fa-users"></i> Customers</li>
            <li><i class="fas fa-sign-out-alt"></i> Logout</li>
        </ul>
    </div>
    <div class="main-content">
        <div class="header">
            <h1>Admin Dashboard</h1>
        </div>
        <div class="dashboard">
            <div class="box orders">
                <div class="box-header">
                    <h2>Orders</h2>
                    <i class="fas fa-box upper-right-icon"></i>
                </div>
                <p>Number of Orders: <span id="orders-count">150</span></p>
            </div>
            <div class="box customers">
                <div class="box-header">
                    <h2>Customers</h2>
                    <i class="fas fa-users upper-right-icon"></i>
                </div>
                <p>Number of Customers: <span id="customers-count">85</span></p>
            </div>
            <div class="box delivered-orders">
                <div class="box-header">
                    <h2>Delivered Orders</h2>
                    <i class="fas fa-check-circle upper-right-icon"></i>
                </div>
                <p>Number of Delivered Orders: <span id="delivered-count">120</span></p>
            </div>
        </div>
        <div class="chart-container chart-box">
            <canvas id="incomeChart"></canvas>
        </div>
    </div>
    <script src="admin.js"></script>
    <script>
        // Data for the chart
        const incomeData = {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                label: 'Total Income',
                data: [1200, 1900, 3000, 5000, 2300, 3400, 4100],
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        };

        // Config for the chart
        const config = {
            type: 'bar',
            data: incomeData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        // Render the chart
        const incomeChart = new Chart(
            document.getElementById('incomeChart'),
            config
        );
    </script>
</body>
</html>
