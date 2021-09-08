<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="<?php echo base_url(); ?>/assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Rocker</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="<?php echo base_url(); ?>/dashboard">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Application</div>
            </a>
            <ul>
                <?php
                $list = $kegiatan;
                foreach ($list as $value) { ?>
                    <li> <a href="<?php echo base_url(); ?>/kegiatan/<?= $value['link']; ?>"><i class="bx bx-right-arrow-alt"></i><?= $value['keterangan']; ?></a>
                    </li>
                <?php
                }
                ?>
            </ul>
        </li>
        <li class="menu-label">UI Elements</li>
        <li>
            <a href="widgets.html">
                <div class="parent-icon"><i class='bx bx-cookie'></i>
                </div>
                <div class="menu-title">Widgets</div>
            </a>
        </li>
    </ul>
    <!--end navigation-->
</div>