<link rel="stylesheet" type="text/css" href="<?= base_url('gambar/stylees.css') ?>">
<div class="logo_content"><br>
            <div class="sidebar">
                            <div class="logo">
                                <i class='bx bxs-cat'>
                                <div class="logo_name">Kantor Dinas</div>
                            </div></i>
                            <i class='bx bx-menu' id="btn"></i>
                        </div>
                        <ul class="nav_list"><br>
                        <li>
                    <i class='bx bx-search'></i>
                        <input type="text" placeholder="search...">
                     <span class="tooltip">Search</span>
                        </li>
                        <li>
                        <a href="<?= base_url('home') ?>">
                            <i class='bx bx-home'></i>
                            <span class="link_name">Home</span>
                        </a>
                            <span class="tooltip">Home</span>
                        </li>

                        <li>
                        <a href="<?= base_url('wisata') ?>"">
                            <i class='bx bx-heart'></i>
                            <span class="link_name">Wisata</span>
                        </a>
                            <span class="tooltip">Wisata</span>
                        </li>

                        <li>
                        <a href="<?= base_url('budaya') ?>">
                            <i class='bx bx-folder'></i>
                            <span class="link_name">Budaya</span>
                        </a>
                            <span class="tooltip">Budaya</span>
                        </li>

                        <li>
                        <a href="<?= base_url('berita') ?>">
                            <i class='bx bx-chat'></i>
                            <span class="link_name">Berita</span>
                        </a>
                            <span class="tooltip">Berita</span>
                        </li>

                <?php if ($this->session->userdata('username')<>"") { ?>
                    <li>
                        <a href="<?= base_url('wisata/input') ?>">
                            <i class='bx bx-pie-chart-alt-2'></i>
                            <span class="link_name">Input Objek Wisata Lokal Dan Budaya</span>
                        </a>
                            <span class="tooltip">Input Objek Wisata Lokal Dan Budaya</span>
                        </li>

                        <li>
                        <a href="<?= base_url('budaya/input') ?>">
                            <i class='bx bx-pie-chart-alt-2'></i>
                            <span class="link_name">Input Budaya Rokan Hulu</span>
                        </a>
                            <span class="tooltip">Input Budaya Rokan Hulu</span>
                        </li>

                        <li>
                        <a href="<?= base_url('berita/input') ?>">
                            <i class='bx bx-pie-chart-alt-2'></i>
                            <span class="link_name">Input Berita</span>
                        </a>
                            <span class="tooltip">Input Berita</span>
                        </li>

                        <li>
                        <a href="<?= base_url('user') ?>">
                            <i class='bx bx-user'></i>
                            <span class="link_name">User</span>
                        </a>
                            <span class="tooltip">User</span>
                        </li>

                        <li>
                        <a href="<?= base_url('user/input') ?>">
                            <i class='bx bx-pie-chart-alt-2'></i>
                            <span class="link_name">Input User</span>
                        </a>
                            <span class="tooltip">Input User</span>
                        </li>
                        <i class='bx bx-log-out' id="log_out"></i>
                        
                        <div class="profil_content">
                            <div class="profil">
                                <div class="profil_details">
                                    <img src="<?= base_url('gambar/profil.jpeg') ?>" alt="">
                                    <div class="name_job">
                                        <?php if ($this->session->userdata('username')=="") { ?>
                                            <a href="<?= base_url('login') ?>" class="btn btn-danger square-btn-adjust">Login</a> 
                                            <?php }else{ ?>
                                                <div class="name"><?=$this->session->userdata('nama_user') ?></div>
                                                <div class="job">Universitas Pasir Pengaraian
                                                <a href="<?= base_url('login/logout') ?>" class='bx bx-log-out' id="log_out"></a></div>
                                                <?php }?>
                                                
                                                <?php } ?>
                                            </ul>
                                        </div>

                                        </div>
                                    </div>
            <script>
            let btn = document.querySelector("#btn");
            let sidebar = document.querySelector(".sidebar");
            let searchBtn = document.querySelector(".bx-search");

            btn.onclick = function () {
                sidebar.classList.toggle("active");
            }
            searchBtn.onclick = function () {
                sidebar.classList.toggle("active");
            }
        </script>
        </div>
        
    </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2><?= $title; ?></h2>
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr/>