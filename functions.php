<?php
// Registro de menus
function registrar_menus_tema()
{
    register_nav_menus(
        array(
            'menu-principal' => __('Menu Principal'),
            'footer' => __('Menu do Rodapé'),
        )
    );
}
add_action('after_setup_theme', 'registrar_menus_tema');

// Personalizações do tema
function tema_customizer_settings($wp_customize)
{
    // Seção para Identidade do Site (Logo)
    $wp_customize->add_setting('logo_site', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'logo_site', array(
        'label' => 'Logo do Site',
        'section' => 'title_tagline',
        'settings' => 'logo_site',
    )));

    // Seção para Identidade do Site (Logo Footer)
    $wp_customize->add_setting('logo_footer', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'logo_footer', array(
        'label' => 'Logo do Footer',
        'section' => 'title_tagline',
        'settings' => 'logo_footer',
    )));

    // Seção para Cores
    $wp_customize->add_section('colors_section', array(
        'title' => 'Cores Padrões',
        'priority' => 40,
    ));

    $wp_customize->add_setting('primary_color', array(
        'default' => '#232536',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary_color', array(
        'label' => 'Cor Primária',
        'section' => 'colors_section',
    )));

    $wp_customize->add_setting('secondary_color', array(
        'default' => '#FFD050',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'secondary_color', array(
        'label' => 'Cor Secundária',
        'section' => 'colors_section',
    )));

    $wp_customize->add_setting('tertiary_color', array(
        'default' => '#592EA9',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'tertiary_color', array(
        'label' => 'Cor Terciária',
        'section' => 'colors_section',
    )));

    $wp_customize->add_setting('text_color', array(
        'default' => '#4C4C4C',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'text_color', array(
        'label' => 'Cor do Texto',
        'section' => 'colors_section',
    )));

    $wp_customize->add_setting('second_text_color', array(
        'default' => '#6D6E76',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'second_text_color', array(
        'label' => 'Cor do Texto 2',
        'section' => 'colors_section',
    )));
}
add_action('customize_register', 'tema_customizer_settings');

// Inserindo bibliotecas
function tema_enqueue_scripts()
{
    // CSS do Bootstrap
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css');

    // JS do Bootstrap com dependência do jQuery
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', array('jquery'), null, true);

    // Fontes do Google: Poppins e Montserrat
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&family=Montserrat:wght@400;500;700&display=swap', array(), null);
}

add_action('wp_enqueue_scripts', 'tema_enqueue_scripts');

// Ativa suporte a imagem destacada
function tema_support_features()
{
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'tema_support_features');

// Configurações adicionais para resumo
function tema_excerpt_settings()
{
    
    function custom_excerpt_length($length)
    {
        return 20;
    }
    add_filter('excerpt_length', 'custom_excerpt_length');

    function custom_excerpt_more($more)
    {
        return '...'; 
    }
    add_filter('excerpt_more', 'custom_excerpt_more');
}
add_action('init', 'tema_excerpt_settings');

//Carregar mais posts
function my_enqueue_scripts()
{
    wp_enqueue_script('ajax-load-more', get_template_directory_uri() . '/js/ajax-load-more.js', array('jquery'), null, true);

    wp_localize_script('ajax-load-more', 'ajax_params', array(
        'ajax_url' => admin_url('admin-ajax.php')
    ));
}

add_action('wp_enqueue_scripts', 'my_enqueue_scripts');
add_action('wp_ajax_load_more_posts', 'load_more_posts');
add_action('wp_ajax_nopriv_load_more_posts', 'load_more_posts');

function load_more_posts()
{
    $paged = isset($_POST['page']) ? intval($_POST['page']) : 1;

    $args = array(
        'posts_per_page' => 3,
        'paged'          => $paged,
    );

    $query = new WP_Query($args);

    // Verifica se há posts
    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post(); ?>
            <article>
                <div class="row">
                    <div class="col-lg-5">
                        <div class="entry-header">
                            <div class="post-thumbnail">
                                <?php the_post_thumbnail('large'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <p class="category-names"><?php the_category(', '); ?></p>
                        <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <div class="post-meta">
                                <span class="author">Por: <?php the_author(); ?></span>
                                <span class="date"> | <?php echo get_the_date(); ?></span>
                            </div>
                            <div class="entry-content">
                                <?php the_excerpt(); ?>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="btn-default">Leia mais</a>
                    </div>
                </div>
            </article>
<?php endwhile;
        wp_reset_postdata();
    else :
        echo json_encode(array('no_more_posts' => true));
    endif;

    wp_die();
}

// Função para adicionar o campo de ícone ao formulário de criação de categoria
function add_category_icon_field() {
    ?>
    <div class="form-field">
        <label for="category_icon">Ícone da Categoria (URL da Imagem)</label>
        <input type="text" name="category_icon" id="category_icon" value="" placeholder="URL do ícone" />
        <p>Insira a URL de um ícone para representar esta categoria.</p>
    </div>
    <?php
}
add_action('category_add_form_fields', 'add_category_icon_field');

// Função para adicionar o campo de ícone ao formulário de edição de categoria
function edit_category_icon_field($term) {
    $icon_url = get_term_meta($term->term_id, 'category_icon', true);
    ?>
    <tr class="form-field">
        <th scope="row"><label for="category_icon">Ícone da Categoria (URL da Imagem)</label></th>
        <td>
            <input type="text" name="category_icon" id="category_icon" value="<?php echo esc_attr($icon_url); ?>" placeholder="URL do ícone" />
            <p class="description">Insira a URL de um ícone para representar esta categoria.</p>
        </td>
    </tr>
    <?php
}
add_action('category_edit_form_fields', 'edit_category_icon_field');


// Função para salvar o ícone da categoria ao criar
function save_category_icon_meta($term_id) {
    if (isset($_POST['category_icon']) && '' !== $_POST['category_icon']) {
        $icon_url = sanitize_text_field($_POST['category_icon']);
        update_term_meta($term_id, 'category_icon', $icon_url);
    }
}
add_action('created_category', 'save_category_icon_meta', 10, 2);

// Função para salvar o ícone da categoria ao editar
function update_category_icon_meta($term_id) {
    if (isset($_POST['category_icon']) && '' !== $_POST['category_icon']) {
        $icon_url = sanitize_text_field($_POST['category_icon']);
        update_term_meta($term_id, 'category_icon', $icon_url);
    } else {
        delete_term_meta($term_id, 'category_icon');
    }
}
add_action('edited_category', 'update_category_icon_meta', 10, 2);

// Adiciona a página de opções ao menu de administração
function theme_options_menu() {
    add_theme_page(
        'Opções do Tema',
        'Opções do Tema',
        'manage_options',
        'theme-options',
        'theme_options_page_html'
    );
}
add_action('admin_menu', 'theme_options_menu');

// Exibe o HTML da página de opções
function theme_options_page_html() {
    ?>
    <div class="wrap">
        <h1>Opções do Tema</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('theme_options');
            do_settings_sections('theme-options');
            submit_button('Salvar Configurações');
            ?>
        </form>
    </div>
    <?php
}

// Registra as configurações e os campos
function theme_options_init() {
    register_setting('theme_options', 'theme_options', 'sanitize_theme_options');

    add_settings_section(
        'theme_options_section',
        'Informações de Contato e Redes Sociais',
        'theme_options_section_cb',
        'theme-options'
    );

    add_settings_field(
        'social_media_facebook',
        'Facebook URL',
        'social_media_facebook_cb',
        'theme-options',
        'theme_options_section'
    );

    add_settings_field(
        'social_media_instagram',
        'Instagram URL',
        'social_media_instagram_cb',
        'theme-options',
        'theme_options_section'
    );

    add_settings_field(
        'social_media_linkedin',
        'LinkedIn URL',
        'social_media_linkedin_cb',
        'theme-options',
        'theme_options_section'
    );

    add_settings_field(
        'social_media_youtube',
        'YouTube URL',
        'social_media_youtube_cb',
        'theme-options',
        'theme_options_section'
    );

    add_settings_field(
        'email',
        'E-mail',
        'email_cb',
        'theme-options',
        'theme_options_section'
    );

    add_settings_field(
        'phone_number',
        'Número de Telefone',
        'phone_number_cb',
        'theme-options',
        'theme_options_section'
    );
}
add_action('admin_init', 'theme_options_init');

// Callbacks para exibir os campos
function theme_options_section_cb() {
    echo '<p>Preencha as informações de contato e redes sociais abaixo:</p>';
}

function social_media_facebook_cb() {
    $options = get_option('theme_options');
    echo '<input type="text" name="theme_options[social_media_facebook]" value="' . esc_attr($options['social_media_facebook'] ?? '') . '" />';
}

function social_media_instagram_cb() {
    $options = get_option('theme_options');
    echo '<input type="text" name="theme_options[social_media_instagram]" value="' . esc_attr($options['social_media_instagram'] ?? '') . '" />';
}

function social_media_linkedin_cb() {
    $options = get_option('theme_options');
    echo '<input type="text" name="theme_options[social_media_linkedin]" value="' . esc_attr($options['social_media_linkedin'] ?? '') . '" />';
}

function social_media_youtube_cb() {
    $options = get_option('theme_options');
    echo '<input type="text" name="theme_options[social_media_youtube]" value="' . esc_attr($options['social_media_youtube'] ?? '') . '" />';
}

function email_cb() {
    $options = get_option('theme_options');
    echo '<input type="email" name="theme_options[email]" value="' . esc_attr($options['email'] ?? '') . '" />';
}

function phone_number_cb() {
    $options = get_option('theme_options');
    echo '<input type="text" name="theme_options[phone_number]" value="' . esc_attr($options['phone_number'] ?? '') . '" />';
}

// Função de sanitização para os campos
function sanitize_theme_options($input) {
    $output = array();

    if (isset($input['social_media_facebook'])) {
        $output['social_media_facebook'] = esc_url_raw($input['social_media_facebook']);
    }

    if (isset($input['social_media_instagram'])) {
        $output['social_media_instagram'] = esc_url_raw($input['social_media_instagram']);
    }

    if (isset($input['social_media_linkedin'])) {
        $output['social_media_linkedin'] = esc_url_raw($input['social_media_linkedin']);
    }

    if (isset($input['social_media_youtube'])) {
        $output['social_media_youtube'] = esc_url_raw($input['social_media_youtube']);
    }

    if (isset($input['email'])) {
        $output['email'] = sanitize_email($input['email']);
    }

    if (isset($input['phone_number'])) {
        $output['phone_number'] = sanitize_text_field($input['phone_number']);
    }

    return $output;
}


