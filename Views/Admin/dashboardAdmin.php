<!DOCTYPE html>
<?php
require_once __DIR__ . '/../../Classes/Article.php';
require_once __DIR__ . '/../../Classes/Category.php';
require_once __DIR__ . '/../../Classes/Database.php';
require_once __DIR__ . '/../../Classes/User.php';
require_once __DIR__ . '/../Auth/check-auth.php';
?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template-free">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Admin Dashboard | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>
    <meta name="description" content="" />
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../../assets/img/favicon/favicon.ico" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
    <!-- Icons -->
    <link rel="stylesheet" href="../../assets/vendor/fonts/boxicons.css" />
    <!-- Core CSS -->
    <link rel="stylesheet" href="../../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../../assets/css/demo.css" />
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <!-- Helpers -->
    <script src="../../assets/vendor/js/helpers.js"></script>
    <!-- Config -->
    <script src="../../assets/js/config.js"></script>
</head>
<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="index.html" class="app-brand-link">
                        <span class="app-brand-logo demo">
                            <!-- Logo SVG -->
                        </span>
                        <span class="app-brand-text demo menu-text fw-bolder ms-2">Sneat</span>
                    </a>
                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>
                <div class="menu-inner-shadow"></div>
                <ul class="menu-inner py-1">
                    <!-- Dashboard -->
                    <li class="menu-item">
                        <a href="index.html" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Dashboard</div>
                        </a>
                    </li>
                    <!-- Other menu items -->
                </ul>
            </aside>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>
                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <!-- Search -->
                        <div class="navbar-nav align-items-center">
                            <div class="nav-item d-flex align-items-center">
                                <i class="bx bx-search fs-4 lh-0"></i>
                                <input type="text" class="form-control border-0 shadow-none" placeholder="Search..." aria-label="Search..." />
                            </div>
                        </div>
                        <!-- /Search -->
                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="../../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="../../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-semibold d-block">John Doe</span>
                                                    <small class="text-muted">Admin</small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="bx bx-user me-2"></i>
                                            <span class="align-middle">My Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="bx bx-cog me-2"></i>
                                            <span class="align-middle">Settings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="auth-login-basic.html">
                                            <i class="bx bx-power-off me-2"></i>
                                            <span class="align-middle">Log Out</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
                    </div>
                </nav>
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin /</span> Dashboard</h4>

                        <!-- Gestion des catégories -->
                        <div class="card mb-4">
                            <h5 class="card-header">Gestion des catégories</h5>
                            <div class="card-body">
                                <!-- Formulaire pour créer une catégorie -->
                                <form method="POST" class="mb-4">
                                    <div class="mb-3">
                                        <label for="nom" class="form-label">Nom de la catégorie</label>
                                        <input type="text" class="form-control" id="nom" name="nom" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control" id="description" name="description" required></textarea>
                                    </div>
                                    <button type="submit" name="create_category" class="btn btn-primary">Créer Catégorie</button>
                                </form>

                                <!-- Liste des catégories -->
                                <h5 class="card-title">Liste des catégories</h5>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nom</th>
                                            <th>Description</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $categories = $category->getAll();
                                        foreach ($categories as $cat) :
                                        ?>
                                            <tr>
                                                <td><?php echo $cat['id']; ?></td>
                                                <td><?php echo $cat['nom']; ?></td>
                                                <td><?php echo $cat['description']; ?></td>
                                                <td>
                                                    <form method="POST" style="display:inline;">
                                                        <input type="hidden" name="id" value="<?php echo $cat['id']; ?>">
                                                        <button type="submit" name="delete_category" class="btn btn-danger btn-sm">Supprimer</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Gestion des articles -->
                        <div class="card mb-4">
                            <h5 class="card-header">Gestion des articles</h5>
                            <div class="card-body">
                                <!-- Liste des articles en attente d'approbation -->
                                <h5 class="card-title">Articles en attente d'approbation</h5>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Titre</th>
                                            <th>Contenu</th>
                                            <th>Auteur</th>
                                            <th>Catégorie</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $pendingArticles = $article->getPendingArticles();
                                        foreach ($pendingArticles as $art) :
                                        ?>
                                            <tr>
                                                <td><?php echo $art['id']; ?></td>
                                                <td><?php echo $art['titre']; ?></td>
                                                <td><?php echo $art['contenu']; ?></td>
                                                <td><?php echo $art['author_name']; ?></td>
                                                <td><?php echo $art['category_name']; ?></td>
                                                <td>
                                                    <form method="POST" style="display:inline;">
                                                        <input type="hidden" name="articleId" value="<?php echo $art['id']; ?>">
                                                        <button type="submit" name="approve_article" class="btn btn-success btn-sm">Approuver</button>
                                                    </form>
                                                    <form method="POST" style="display:inline;">
                                                        <input type="hidden" name="articleId" value="<?php echo $art['id']; ?>">
                                                        <button type="submit" name="reject_article" class="btn btn-warning btn-sm">Rejeter</button>
                                                    </form>
                                                    <form method="POST" style="display:inline;">
                                                        <input type="hidden" name="articleId" value="<?php echo $art['id']; ?>">
                                                        <button type="submit" name="delete_article" class="btn btn-danger btn-sm">Supprimer</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Gestion des utilisateurs -->
                        <div class="card mb-4">
                            <h5 class="card-header">Gestion des utilisateurs</h5>
                            <div class="card-body">
                                <!-- Liste des utilisateurs -->
                                <h5 class="card-title">Liste des utilisateurs</h5>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nom</th>
                                            <th>Email</th>
                                            <th>Rôle</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $users = $user->getAllUsers();
                                        foreach ($users as $usr) :
                                        ?>
                                            <tr>
                                                <td><?php echo $usr['id']; ?></td>
                                                <td><?php echo $usr['nom']; ?></td>
                                                <td><?php echo $usr['email']; ?></td>
                                                <td><?php echo $usr['role']; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- / Content -->
                </div>
                <!-- / Content wrapper -->
            </div>
            <!-- / Layout container -->
        </div>
        <!-- / Layout wrapper -->
    </div>

    <!-- Core JS -->
    <script src="../../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../../assets/vendor/libs/popper/popper.js"></script>
    <script src="../../assets/vendor/js/bootstrap.js"></script>
    <script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../../assets/vendor/js/menu.js"></script>
    <!-- Main JS -->
    <script src="../../assets/js/main.js"></script>
    <!-- Page JS -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>
</html>