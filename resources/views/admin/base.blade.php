<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord de gestion de réservation d'hôtel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="style.css"/>
    <style>
      /* Sidebar */
.sidebar {
    background: #343a40;
    color: #fff;
    min-height: 100vh;
    padding: 0;
}

.sidebar-header {
    padding: 10px 15px;
}

.sidebar-header h3 {
    margin: 0;
    font-size: 1.5rem;
    text-transform: uppercase;
}

.components {
    padding: 20px;
}

.components li a {
    color: #fff;
    padding: 10px 15px;
    display: block;
    text-decoration: none;
}

.components li a:hover {
    background: #adb5bd;
}

.components li.active > a {
    background: #adb5bd;
}

.components ul li a {
    font-size: 0.9rem;
    padding-left: 30px;
}

.components ul li.active > a {
    background: #6c757d;
}

/* Content */
.content {
    padding: 20px;
}

/* Navbar */
.navbar {
    margin-bottom: 20px;
    border-radius: 0;
}

.navbar-brand {
    font-weight: bold;
    font-size: 1.5rem;
}

#sidebarCollapse {
    display: none;
}

@media (max-width: 991.98px) {
    .sidebar {
        position: fixed;
        top: 0;
        bottom: 0;
        left: -300px;
        width: 300px;
        z-index:1;
        transition: all 0.4s ease-in-out;
    }

    .sidebar.show {
        left: 0;
    }

    #sidebarCollapse {
        display: block;
        position: fixed;
        top: 10px;
        left: 10px;
        z-index: 2;
    }

    .content {
        margin-left: 300px;
    }
    .table-hover tbody tr:hover {
    background-color: #f5f5f5;
}

.table th, .table td {
    vertical-align: middle;
}

.table td img {
    max-height: 100px;
}
}
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 sidebar">
                <div class="sidebar-header">
                    <h3><i class="fas fa-hotel"></i> Dashboard</h3>
                </div>
                <ul class="list-unstyled components">
                    <li class="active">
                        <a href="#homeSubmenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-home"></i> Accueil</a>
                        <ul class="collapse list-unstyled" id="homeSubmenu">
                            <li>
                                <a href="{{route('admin.home')}}">Page d'accueil</a>
                            </li>
                            <li>
                                <a href="#">Statistiques</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fas fa-user"></i> Clients</a>
                    </li>
                    <li>
                        <a href=""><i class="fas fa-bed"></i> Chambres</a>
                    </li>
                    <li>
                        <a href="#"><i class="fas fa-dollar-sign"></i> Tarifs</a>
                    </li>
                    <li>
                        <a href="#"><i class="fas fa-chart-line"></i> Rapports</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-9 content">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">
                        <button type="button" id="sidebarCollapse" class="btn btn-info">
                            <i class="fas fa-align-left"></i>
                            <span>Menu</span>
                        </button>
                    </div>
                </nav>
                <h1>Bienvenue sur le tableau de bord de gestion de réservation d'hôtel</h1>
                <p>Cliquez sur une option de menu pour commencer.</p>
                @yield('content')
            </div>
            
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
</body>
</html>