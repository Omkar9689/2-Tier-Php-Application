<?php
require_once 'config.php';

// Check if user is logged in and is admin
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 'admin') {
    header('Location: login.php');
    exit();
}

// Handle delete request
if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $delete_sql = "DELETE FROM employees WHERE id = $delete_id AND role != 'admin'";
    mysqli_query($conn, $delete_sql);
    header('Location: admin_dashboard.php?deleted=1');
    exit();
}

// Fetch all employees
$sql = "SELECT * FROM employees ORDER BY created_at DESC";
$result = mysqli_query($conn, $sql);
$employees = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Get statistics
$total_employees = count($employees);
$total_users = count(array_filter($employees, function($emp) { return $emp['role'] == 'user'; }));
$total_admins = count(array_filter($employees, function($emp) { return $emp['role'] == 'admin'; }));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - EmployeeHub</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --gradient-1: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --gradient-2: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --gradient-3: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #0f0c29 0%, #302b63 50%, #24243e 100%);
            min-height: 100vh;
            color: white;
        }
        
        .navbar {
            background: rgba(26, 26, 46, 0.9) !important;
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-weight: 900;
            font-size: 1.8rem;
            background: var(--gradient-1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .nav-link {
            color: rgba(255, 255, 255, 0.8) !important;
            font-weight: 500;
            margin: 0 0.5rem;
            transition: all 0.3s ease;
        }
        
        .nav-link:hover {
            color: white !important;
        }
        
        .dashboard-container {
            padding: 120px 0 50px;
        }
        
        .welcome-card {
            background: var(--gradient-1);
            border-radius: 20px;
            padding: 2.5rem;
            margin-bottom: 2rem;
            animation: slideDown 0.8s ease-out;
        }
        
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .welcome-card h1 {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
        }
        
        .stat-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .stat-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            padding: 1.5rem;
            transition: all 0.3s ease;
            animation: fadeIn 0.6s ease-out both;
        }
        
        .stat-card:nth-child(1) { animation-delay: 0.1s; }
        .stat-card:nth-child(2) { animation-delay: 0.2s; }
        .stat-card:nth-child(3) { animation-delay: 0.3s; }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }
        
        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }
        
        .stat-card:nth-child(1) .stat-icon { background: var(--gradient-1); }
        .stat-card:nth-child(2) .stat-icon { background: var(--gradient-2); }
        .stat-card:nth-child(3) .stat-icon { background: var(--gradient-3); }
        
        .stat-value {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        
        .content-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 2rem;
            margin-bottom: 2rem;
            animation: slideUp 0.8s ease-out;
        }
        
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .content-card h3 {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            margin-bottom: 1.5rem;
        }
        
        .table-responsive {
            border-radius: 12px;
            overflow: hidden;
        }
        
        table {
            color: white;
            margin-bottom: 0;
        }
        
        thead {
            background: rgba(102, 126, 234, 0.2);
        }
        
        thead th {
            border: none;
            padding: 1rem;
            font-weight: 600;
        }
        
        tbody tr {
            background: rgba(255, 255, 255, 0.02);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }
        
        tbody tr:hover {
            background: rgba(255, 255, 255, 0.05);
            transform: scale(1.01);
        }
        
        tbody td {
            padding: 1rem;
            vertical-align: middle;
        }
        
        .badge {
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-weight: 600;
        }
        
        .badge-admin {
            background: var(--gradient-1);
        }
        
        .badge-user {
            background: var(--gradient-3);
        }
        
        .btn-action {
            padding: 0.5rem 1rem;
            border-radius: 8px;
            border: none;
            font-weight: 600;
            transition: all 0.3s ease;
            margin: 0 0.25rem;
        }
        
        .btn-view {
            background: rgba(79, 172, 254, 0.2);
            color: #4facfe;
            border: 1px solid #4facfe;
        }
        
        .btn-view:hover {
            background: #4facfe;
            color: white;
            transform: translateY(-2px);
        }
        
        .btn-delete {
            background: rgba(233, 69, 96, 0.2);
            color: #e94560;
            border: 1px solid #e94560;
        }
        
        .btn-delete:hover {
            background: #e94560;
            color: white;
            transform: translateY(-2px);
        }
        
        .alert {
            border-radius: 12px;
            border: none;
            animation: slideDown 0.5s ease-out;
        }
        
        .logout-btn {
            background: rgba(233, 69, 96, 0.2);
            border: 2px solid #e94560;
            color: white;
            padding: 0.5rem 1.5rem;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .logout-btn:hover {
            background: #e94560;
            transform: translateY(-2px);
        }
        
        .search-box {
            background: rgba(255, 255, 255, 0.08);
            border: 2px solid rgba(255, 255, 255, 0.1);
            color: white;
            padding: 0.8rem 1rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            width: 100%;
            max-width: 400px;
        }
        
        .search-box:focus {
            background: rgba(255, 255, 255, 0.12);
            border-color: #667eea;
            outline: none;
        }
        
        .search-box::placeholder {
            color: rgba(255, 255, 255, 0.4);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <i class="fas fa-building"></i> EmployeeHub
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="admin_dashboard.php">Admin Dashboard</a></li>
                    <li class="nav-item">
                        <a href="logout.php" class="logout-btn">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="dashboard-container">
        <div class="container">
            <div class="welcome-card">
                <h1><i class="fas fa-user-shield"></i> Admin Dashboard</h1>
                <p class="mb-0">Manage all employee records and system data</p>
            </div>
            
            <?php if (isset($_GET['deleted'])): ?>
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i> Employee record deleted successfully!
                </div>
            <?php endif; ?>
            
            <div class="stat-cards">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stat-value"><?php echo $total_employees; ?></div>
                    <h4>Total Employees</h4>
                </div>
                
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="stat-value"><?php echo $total_users; ?></div>
                    <h4>Regular Users</h4>
                </div>
                
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-user-shield"></i>
                    </div>
                    <div class="stat-value"><?php echo $total_admins; ?></div>
                    <h4>Administrators</h4>
                </div>
            </div>
            
            <div class="content-card">
                <h3><i class="fas fa-table"></i> All Employee Records</h3>
                
                <input type="text" id="searchInput" class="search-box" placeholder="Search employees...">
                
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Position</th>
                                <th>Role</th>
                                <th>Joined Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="employeeTable">
                            <?php foreach ($employees as $employee): ?>
                            <tr>
                                <td><?php echo $employee['id']; ?></td>
                                <td><?php echo htmlspecialchars($employee['full_name']); ?></td>
                                <td><?php echo htmlspecialchars($employee['email']); ?></td>
                                <td><?php echo htmlspecialchars($employee['position']); ?></td>
                                <td>
                                    <span class="badge badge-<?php echo $employee['role']; ?>">
                                        <?php echo strtoupper($employee['role']); ?>
                                    </span>
                                </td>
                                <td><?php echo date('M d, Y', strtotime($employee['created_at'])); ?></td>
                                <td>
                                    <button class="btn-action btn-view" onclick="viewEmployee(<?php echo $employee['id']; ?>)">
                                        <i class="fas fa-eye"></i> View
                                    </button>
                                    <?php if ($employee['role'] != 'admin'): ?>
                                    <a href="?delete=<?php echo $employee['id']; ?>" 
                                       class="btn-action btn-delete"
                                       onclick="return confirm('Are you sure you want to delete this employee?');">
                                        <i class="fas fa-trash"></i> Delete
                                    </a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- View Employee Modal -->
    <div class="modal fade" id="viewEmployeeModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="background: rgba(26, 26, 46, 0.95); color: white; border: 1px solid rgba(255,255,255,0.1);">
                <div class="modal-header" style="border-bottom: 1px solid rgba(255,255,255,0.1);">
                    <h5 class="modal-title" id="modalTitle">Employee Details</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" id="modalBody">
                    <!-- Content loaded via JavaScript -->
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Search functionality
        document.getElementById('searchInput').addEventListener('keyup', function() {
            const searchValue = this.value.toLowerCase();
            const rows = document.querySelectorAll('#employeeTable tr');
            
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(searchValue) ? '' : 'none';
            });
        });
        
        // View employee details
        const employees = <?php echo json_encode($employees); ?>;
        
        function viewEmployee(id) {
            const employee = employees.find(emp => emp.id == id);
            if (employee) {
                document.getElementById('modalTitle').textContent = employee.full_name;
                document.getElementById('modalBody').innerHTML = `
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <strong>ID:</strong><br>${employee.id}
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Email:</strong><br>${employee.email}
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Position:</strong><br>${employee.position}
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Role:</strong><br><span class="badge badge-${employee.role}">${employee.role.toUpperCase()}</span>
                        </div>
                        <div class="col-12 mb-3">
                            <strong>Bio:</strong><br>${employee.bio || 'No bio provided'}
                        </div>
                        <div class="col-12 mb-3">
                            <strong>Joined Date:</strong><br>${new Date(employee.created_at).toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' })}
                        </div>
                    </div>
                `;
                new bootstrap.Modal(document.getElementById('viewEmployeeModal')).show();
            }
        }
    </script>
</body>
</html>
