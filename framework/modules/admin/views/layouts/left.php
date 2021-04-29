<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Some User</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
					['label' => 'Меню', 'options' => ['class' => 'header']],
					[
                        'label' => 'Категории',
                        'icon' => 'cubes',
                        'url' => '#',
                        'items' => [
							['label' => 'Обзор', 'icon' => 'eye', 'url' => ['cats/index'],],
                            ['label' => 'Создать', 'icon' => 'plus-square', 'url' => ['cats/create'],],
                        ],
                    ],
					[
                        'label' => 'Продукты',
                        'icon' => 'gift',
                        'url' => '#',
                        'items' => [
							['label' => 'Обзор', 'icon' => 'eye', 'url' => ['products/index'],],
                            ['label' => 'Создать', 'icon' => 'plus-square', 'url' => ['products/create'],],
                        ],
                    ],
                     
                ],
            ]
                        
        ) ?>

    </section>

</aside>
