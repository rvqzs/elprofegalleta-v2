<?php include_once __DIR__ . "/shared/header.php" ?>

<div class="container-fluid">
    <div class="row">
        <!-- Toggle button for mobile -->
        <button class="btn btn-primary d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">Dashboard Menu</span>
        </button>

        <!-- Sidebar -->
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="#dashboard" class="nav-link active" data-bs-toggle="collapse" data-bs-target="#dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a href="#courses" class="nav-link" data-bs-toggle="collapse" data-bs-target="#courses">Courses</a>
                    </li>
                    <li class="nav-item">
                        <a href="#reports" class="nav-link" data-bs-toggle="collapse" data-bs-target="#reports">Reports</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Main content area -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <!-- Dashboard Section -->
            <div id="dashboard" class="collapse show">
                <h2>Dashboard</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="coursesTable">
                        <thead>
                            <tr>
                                <th>Curso</th>
                                <th>Duracion</th>
                                <th>Modalidad</th>
                                <th>Categoria</th>
                                <th>Precio</th>
                                <th>Promotor</th>
                                <th>Inscripciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Data will be inserted here via jQuery/AJAX -->
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Courses Section -->
            <div id="courses" class="collapse">
                <h2>Courses</h2>
                <button class="btn btn-primary mb-3" id="newCourseBtn">New Course</button>
                <div id="coursesCards" class="row">
                    <!-- Cards will be populated here via AJAX -->
                </div>
                <!-- New Course Modal -->
                <div class="modal fade" id="newCourseModal" tabindex="-1" aria-labelledby="newCourseModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="newCourseModalLabel">Add New Course</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="newCourseForm" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="mainImageUrl" class="form-label">Imagen Principal (96x96) <a href="https://icons8.com/icon/set/flags/color">(URL)</a></label>
                                        <input type="text" class="form-control" id="mainImageUrl" name="mainImageUrl" placeholder="Enter main image URL" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="additionalImage1" class="form-label">Imagen Adicional 1</label>
                                        <input type="file" class="form-control" id="additionalImage1" name="additionalImage1" accept="image/*">
                                    </div>
                                    <div class="mb-3">
                                        <label for="additionalImage2" class="form-label">Imagen Adicional 2</label>
                                        <input type="file" class="form-control" id="additionalImage2" name="additionalImage2" accept="image/*">
                                    </div>
                                    <div class="mb-3">
                                        <label for="courseName" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" id="courseName" name="courseName" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="duration" class="form-label">Duración</label>
                                        <input type="text" class="form-control" id="duration" name="duration" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="mode" class="form-label">Modalidad</label>
                                        <input type="text" class="form-control" id="mode" name="mode" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Descripción</label>
                                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="category" class="form-label">Categoria</label>
                                        <input type="text" class="form-control" id="category" name="category" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="price" class="form-label">Precio</label>
                                        <input type="number" class="form-control" id="price" name="price" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="promoterName" class="form-label">Promotor</label>
                                        <select id="promoterName" class="form-select" name="promoterName" required>
                                            <option value="" disabled selected>Select a promoter</option>
                                            <!-- Options will be populated here -->
                                        </select>
                                    </div>
                                    <button id="btnSaveCourse" type="submit" class="btn btn-primary">Guardar</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Reports Section -->
            <div id="reports" class="collapse">
                <h2>Reports</h2>
                <form id="filterForm" class="mb-3">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="filterCategory" class="form-label">Categoria</label>
                                <input type="text" class="form-control" id="filterCategory">
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary" id="applyFilters">Apply Filters</button>
                    <button id="clearFilters" class="btn btn-secondary">Clear Filters</button>
                    <button type="button" class="btn btn-success" id="exportPdf">Export to PDF</button>
                </form>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="reportsTable">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Duracion</th>
                                <th>Modalidad</th>
                                <th>Categoria</th>
                                <th>Precio</th>
                                <th>Promotor</th>
                                <th>Inscripciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Data will be inserted here via jQuery -->
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</div>

<?php include_once __DIR__ . "/shared/footer.php" ?>