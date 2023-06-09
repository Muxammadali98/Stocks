<?php
/**
 * Created by PhpStorm.
 * User: Farhodjon
 * Date: 10.03.2018
 * Time: 15:17
 */

use app\modules\admin\widgets\Menu;

?>
<div class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <?php

            try {
                echo Menu::widget([
                    'options' => [ 'id' => 'sidebarnav' ],
                    'submenuTemplate' => "\n<ul aria-expanded='false' class='collapse'>\n{items}\n</ul>\n",
                    'badgeClass' => 'label label-rouded label-primary pull-right',
                    'activateParents' => true,
                    'items' => [
                        [
                            'label' => '',
                            'options' => [ 'class' => 'nav-devider' ]
                        ],
                        [
                            'label' => 'Home',
                            'options' => [ 'class' => 'nav-label' ]
                        ],
                        [
                            'label' => 'Dashboard',
                            'url' => ['stock-statistik/index'],
                            'icon' => '<i class="fa fa-tachometer"></i>',
                        ],
                        [
                            'label' => 'Core Stock',
                            'url' => ['core-stock/index'],
                        ],
                        [
                            'label' => 'Prdt Brand',
                            'url' => ['prdt-brand/index'],
                        ],
                        [
                            'label' => 'Prdt Category',
                            'url' => ['prdt-category/index'],
                        ],
                        [
                            'label' => 'Prdt Product',
                            'url' => ['prdt-product/index'],
                        ],
                        [
                            'label' => 'Prdt Product Activity',
                            'url' => ['prdt-product-activity/index'],
                        ],
                
                    ]
                ]);
            } catch ( Exception $e ) {
            }
            
            ?>
        </nav>
    </div>
</div>
