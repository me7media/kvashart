<?php

    header("Location: " . SiteRoot($g_config['admin_sector']['after_logout_page']));
    exit();
?>