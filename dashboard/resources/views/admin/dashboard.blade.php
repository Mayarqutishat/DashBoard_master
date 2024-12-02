@extends('layouts.master')

@section('title','Blog Dashboard')

@section('content')

<div class="container-fluid px-4">
<h1 class="mt-4">Dashboard</h1>
  <ol class="breadcrumb mb-4">
 <li class="breadcrumb-item active">Dashboard</li>
  </ol>
  <div class="row g-4">
        <!-- Dashboard Cards -->
        <div class="col-md-3">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Total Products</h5>
                    <p class="card-text" id="total-products">120</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">Total Orders</h5>
                    <p class="card-text" id="total-orders">80</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <h5 class="card-title">Customers</h5>
                    <p class="card-text" id="total-customers">45</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-danger">
                <div class="card-body">
                    <h5 class="card-title">Pending Orders</h5>
                    <p class="card-text" id="pending-orders">5</p>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-area me-1"></i>
                    Orders
                </div>
                <div class="card-body">
                    <canvas id="myAreaChart" width="100%" height="40"></canvas>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-bar me-1"></i>
                    Stock
                </div>
                <div class="card-body">
                    <canvas id="myBarChart" width="100%" height="40"></canvas>
                </div>
            </div>
        </div>
    </div>
    <!-- Admins CRUD -->
    <section id="admins" class="mt-5">
        <h2>Admins</h2>
        <button class="btn btn-primary mb-3" onclick="openModal('adminModal')">Add Admin</button>
        <div class="table-container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="adminTable">
                    <tr>
                        <td>1</td>
                        <td>John Doe</td>
                        <td>john@example.com</td>
                        <td>123-456-7890</td>
                        <td>
                            <button class="btn btn-warning btn-sm" onclick="editAdmin(this)">Edit</button>
                            <button class="btn btn-danger btn-sm" onclick="deleteAdmin(this)">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</div>

<!-- Include Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Orders Chart
    const ordersCtx = document.getElementById('myAreaChart').getContext('2d');
    const ordersChart = new Chart(ordersCtx, {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June'], // X-axis labels
            datasets: [{
                label: 'Orders',
                data: [65, 59, 80, 81, 56, 55], // Example data
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderWidth: 2,
                fill: true
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Stock Chart
    const stockCtx = document.getElementById('myBarChart').getContext('2d');
    const stockChart = new Chart(stockCtx, {
        type: 'bar',
        data: {
            labels: ['Product A', 'Product B', 'Product C', 'Product D'], // X-axis labels
            datasets: [{
                label: 'Stock',
                data: [20, 50, 80, 30], // Example data
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection
