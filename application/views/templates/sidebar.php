<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" style="background: #000814;"id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-text mx-3 w-80%">
            <img src="<?= base_url('components'); ?>/img/logo-gportal.png" alt="" />
        </div>
    </a>

    <?php 
    $role_id = $this->session->userdata('role_id');
    $queryMenu = "SELECT `user_menu` . `id`, `menu` 
                    FROM `user_menu` JOIN `user_access_menu`
                    ON `user_menu` . `id` = `user_access_menu` . `menu_id`
                    WHERE `user_access_menu` . `role_id` = $role_id
                    ORDER BY `user_access_menu` . `menu_id` ASC"; 
    $menu = $this->db->query($queryMenu)->result_array();


?>


    <!-- Loops -->
    <?php foreach($menu as $m) : ?>
    <div class="sidebar-heading">
        <?= $m['menu']; ?>
    </div>

    <?php 
    $menuId = $m['id'];
    $querySubMenu = "SELECT *
                     FROM `user_sub_menu` JOIN `user_menu`
                     ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                     WHERE `user_sub_menu`.`menu_id` = $menuId
                     AND `user_sub_menu`.`is_active` = 1
                     ";
    $subMenu = $this->db->query($querySubMenu)->result_array();
?>

    <?php foreach($subMenu as $sm) : ?>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url($sm['url']); ?>">
            <i class="<?= $sm['icon']; ?>"></i>
            <span><?= $sm['title']; ?></span></a>
    </li>
    <?php endforeach ; ?>
    <!-- Divider -->

    <?php endforeach ; ?>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->