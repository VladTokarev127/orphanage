<?php

	add_action('wp_enqueue_scripts', 'house_media');

	add_action('after_setup_theme', 'house_after_setup');

	/**
	 * Enqueues script with WordPress and adds version number that is a timestamp of the file modified date.
	 * 
	 * @param string      $handle    Name of the script. Should be unique.
	 * @param string|bool $src       Path to the script from the theme directory of WordPress. Example: '/js/myscript.js'.
	 * @param array       $deps      Optional. An array of registered script handles this script depends on. Default empty array.
	 * @param bool        $in_footer Optional. Whether to enqueue the script before </body> instead of in the <head>.
	 *                               Default 'false'.
	 */
	function enqueue_versioned_script( $handle, $src = false, $deps = array(), $in_footer = false ) {
		wp_enqueue_script( $handle, get_stylesheet_directory_uri() . $src, $deps, filemtime( get_stylesheet_directory() . $src ), $in_footer );
	}
	
	/**
	 * Enqueues stylesheet with WordPress and adds version number that is a timestamp of the file modified date.
	 *
	 * @param string      $handle Name of the stylesheet. Should be unique.
	 * @param string|bool $src    Path to the stylesheet from the theme directory of WordPress. Example: '/css/mystyle.css'.
	 * @param array       $deps   Optional. An array of registered stylesheet handles this stylesheet depends on. Default empty array.
	 * @param string      $media  Optional. The media for which this stylesheet has been defined.
	 *                            Default 'all'. Accepts media types like 'all', 'print' and 'screen', or media queries like
	 *                            '(orientation: portrait)' and '(max-width: 640px)'.
	 */
	function enqueue_versioned_style( $handle, $src = false, $deps = array(), $media = 'all' ) {
		wp_enqueue_style( $handle, get_stylesheet_directory_uri() . $src, $deps = array(), filemtime( get_stylesheet_directory() . $src ), $media );
	}

	function house_media() {
		enqueue_versioned_style('test-main', '/style.css');
		enqueue_versioned_script('test-main', '/js/main.min.js', array( 'jquery'), false);
	}

	function house_after_setup() {
		register_nav_menu('menu', 'Menu');

		add_theme_support('post-thumbnails');
	}
	
	if( function_exists('acf_add_options_page') ) {
		
		acf_add_options_page(array(
			'page_title'   => 'Основные настройки',
			'menu_title'  => 'Настройки темы',
			'menu_slug'   => 'theme-general-settings',
			'capability'  => 'edit_posts',
			'redirect'    => false
		));
	}

	add_action( 'init', 'tpl_fees' );
	function tpl_fees() {
		register_post_type( 'fees', array(
			'public' => true,
			'has_archive' => false,
			'show_in_nav_menus' => true,
			'labels' => array(
				'name' => 'Сборы',
				'all_items' => 'Все Сборы',
				'add_new' => 'Добавить Сбор',
				'add_new_item' => 'Добавление Сбора'
				),
			'supports' => array( 'title', 'thumbnail' ),
			)
		);
	};

	add_action( 'init', 'tpl_projects' );
	function tpl_projects() {
		register_post_type( 'projects', array(
			'public' => true,
			'has_archive' => true,
			'show_in_nav_menus' => true,
			'labels' => array(
				'name' => 'Проекты',
				'all_items' => 'Все Проекты',
				'add_new' => 'Добавить Проект',
				'add_new_item' => 'Добавление Проекта'
				),
			'supports' => array( 'title', 'thumbnail' ),
			)
		);
	};
	function add_new_taxonomy_projects_type() {
	
		$labels = array(
			'name' => _x( 'Категории', 'Taxonomy plural name', 'text-domain' ),//Название таксономии во множественном числе
			'singular_name' => _x( 'Категория', 'Taxonomy singular name', 'text-domain' ),//Название для единичного элемента таксономии
			'search_items' => __( 'Найти проект', 'text-domain' ),//Текст для кнопки поиска элемента таксономии
			'popular_items' => __( 'Популярные проекты', 'text-domain' ),//Текст для популярных элементов таксономии
			'all_items' => __( 'Все проекты', 'text-domain' ),//Текст для всех элементов таксономии
			'parent_item' => __( 'Родительский проект', 'text-domain' ),//Текст для родительского элемента таксономии
			'parent_item_colon' => __( 'Родительский проект:', 'text-domain' ),//Тоже самой, что и parent_item только с двоеточием в конце
			'edit_item' => __( 'Редактировать проект', 'text-domain' ),//Текст для редактирования элемента таксономии
			'update_item' => __( 'Обновить проект', 'text-domain' ),//Текст для обновления элемента таксономии
			'add_new_item' => __( 'Добавить категорию', 'text-domain' ),//Текст для добавления нового элемента таксономии
			'new_item_name' => __( 'Создать проект', 'text-domain' ),//Текст для создания нового элемента таксономии
			'add_or_remove_items' => __( 'Добавить', 'text-domain' ),//Текст для "удаления или добавления элемента", который используется в блоке админке, при отключенном javascript. Не для древовидных таксономий.
			'choose_from_most_used' => __( 'Редактировать', 'text-domain' ),//Текст для блога при редактировании поста. Не используется для древовидных таксономий.
			'menu_name' => __( 'Категории', 'text-domain' ),//Название таксономии в меню
		);

		$args = array(
			'has_archive' => true,
			'labels' => $labels,
			'public' => true,//Показывать/Не показывать таксономию в админ-панели
			'show_in_nav_menus' => true,//Добавить/Удалить возможность добавления элементов этой таксономии в навигационном меню
			'show_admin_column' => true,//Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи
			'hierarchical' => true,//true - таксономия древовидная, false - нет
			'show_tagcloud' => true,//Создавать/Не создавать виджет облака для элементов данной таксономии (как у меток)
			'show_ui' => true,//Показать блок управления для текущей таксономии в админ-панели
			'query_var' => true,//false - отключает запрос и его параметры
			'rewrite' => true,//false - отключает перезапись
			'capabilities' => array(),//Массив прав для этой таксономии: manage_terms - 'manage_categories', edit_terms - 'manage_categories', delete_terms - 'manage_categories', assign_terms - 'edit_posts'
		);

		register_taxonomy(
			'projects_type',//Уникальный идентификатор таксономии
			array( 'projects' ),//К какому типу записей привязать таксономию - post, page или к произвольному типу записей (в нашем случае это store)
			$args
		);
	}
	add_action( 'init', 'add_new_taxonomy_projects_type' );

	add_action( 'init', 'tpl_houses' );
	function tpl_houses() {
		register_post_type( 'houses', array(
			'public' => true,
			'has_archive' => true,
			'show_in_nav_menus' => true,
			'labels' => array(
				'name' => 'Детские Дома',
				'all_items' => 'Все Дома',
				'add_new' => 'Добавить Дом',
				'add_new_item' => 'Добавление Дома'
				),
			'supports' => array( 'title', 'thumbnail' ),
			)
		);
	};
	function add_new_taxonomy_houses_type() {
	
		$labels = array(
			'name' => _x( 'Категории', 'Taxonomy plural name', 'text-domain' ),//Название таксономии во множественном числе
			'singular_name' => _x( 'Категория', 'Taxonomy singular name', 'text-domain' ),//Название для единичного элемента таксономии
			'search_items' => __( 'Найти проект', 'text-domain' ),//Текст для кнопки поиска элемента таксономии
			'popular_items' => __( 'Популярные проекты', 'text-domain' ),//Текст для популярных элементов таксономии
			'all_items' => __( 'Все проекты', 'text-domain' ),//Текст для всех элементов таксономии
			'parent_item' => __( 'Родительский проект', 'text-domain' ),//Текст для родительского элемента таксономии
			'parent_item_colon' => __( 'Родительский проект:', 'text-domain' ),//Тоже самой, что и parent_item только с двоеточием в конце
			'edit_item' => __( 'Редактировать проект', 'text-domain' ),//Текст для редактирования элемента таксономии
			'update_item' => __( 'Обновить проект', 'text-domain' ),//Текст для обновления элемента таксономии
			'add_new_item' => __( 'Добавить категорию', 'text-domain' ),//Текст для добавления нового элемента таксономии
			'new_item_name' => __( 'Создать проект', 'text-domain' ),//Текст для создания нового элемента таксономии
			'add_or_remove_items' => __( 'Добавить', 'text-domain' ),//Текст для "удаления или добавления элемента", который используется в блоке админке, при отключенном javascript. Не для древовидных таксономий.
			'choose_from_most_used' => __( 'Редактировать', 'text-domain' ),//Текст для блога при редактировании поста. Не используется для древовидных таксономий.
			'menu_name' => __( 'Категории', 'text-domain' ),//Название таксономии в меню
		);

		$args = array(
			'has_archive' => true,
			'labels' => $labels,
			'public' => true,//Показывать/Не показывать таксономию в админ-панели
			'show_in_nav_menus' => true,//Добавить/Удалить возможность добавления элементов этой таксономии в навигационном меню
			'show_admin_column' => true,//Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи
			'hierarchical' => true,//true - таксономия древовидная, false - нет
			'show_tagcloud' => true,//Создавать/Не создавать виджет облака для элементов данной таксономии (как у меток)
			'show_ui' => true,//Показать блок управления для текущей таксономии в админ-панели
			'query_var' => true,//false - отключает запрос и его параметры
			'rewrite' => true,//false - отключает перезапись
			'capabilities' => array(),//Массив прав для этой таксономии: manage_terms - 'manage_categories', edit_terms - 'manage_categories', delete_terms - 'manage_categories', assign_terms - 'edit_posts'
		);

		register_taxonomy(
			'houses_type',//Уникальный идентификатор таксономии
			array( 'houses' ),//К какому типу записей привязать таксономию - post, page или к произвольному типу записей (в нашем случае это store)
			$args
		);
	}
	add_action( 'init', 'add_new_taxonomy_houses_type' );

	add_filter('post_type_labels_post', 'rename_posts_labels');
	function rename_posts_labels( $labels ){

		$new = array(
			'name'                  => 'Новости',
			'singular_name'         => 'Новость',
			'add_new'               => 'Добавить Новость',
			'add_new_item'          => 'Добавить Новость',
			'edit_item'             => 'Редактировать Новость',
			'new_item'              => 'Новая Новость',
			'view_item'             => 'Просмотреть Новость',
			'search_items'          => 'Поиск Новостей',
			'not_found'             => 'Новостей не найдено.',
			'not_found_in_trash'    => 'Новостей в корзине не найдено.',
			'parent_item_colon'     => '',
			'all_items'             => 'Все Новости',
			'archives'              => 'Архивы Новостей',
			'insert_into_item'      => 'Вставить в Новость',
			'uploaded_to_this_item' => 'Загруженные для этой Новости',
			'featured_image'        => 'Миниатюра Новости',
			'filter_items_list'     => 'Фильтровать список Новостей',
			'items_list_navigation' => 'Навигация по списку Новостей',
			'items_list'            => 'Список Новостей',
			'menu_name'             => 'Новости',
			'name_admin_bar'        => 'Новость', // пункте "добавить"
		);

		return (object) array_merge( (array) $labels, $new );
	}