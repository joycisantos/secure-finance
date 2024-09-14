jQuery(document).ready(function($) {
    var page = 1;

    // Função para carregar posts
    function loadPosts() {
        page++;
        $.ajax({
            url: ajax_params.ajax_url,
            type: 'POST',
            data: {
                action: 'load_more_posts',
                page: page
            },
            success: function(response) {
                // Verifica se a resposta é um JSON
                try {
                    var data = JSON.parse(response);
                    if (data.no_more_posts) {
                        $('.load-more-button').hide(); // Oculta o botão se não houver mais posts
                    }
                } catch (e) {
                    // Se não for JSON, adiciona posts ao conteúdo
                    if (response.trim()) {
                        $('.posts-list').append(response);
                    } else {
                        $('.load-more-button').hide(); // Oculta o botão se não houver mais posts
                    }
                }
            }
        });
    }

    // Evento de clique no botão de carregamento
    $('.load-more-button').on('click', function() {
        loadPosts();
    });
});
