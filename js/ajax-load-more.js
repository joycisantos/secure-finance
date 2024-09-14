jQuery(document).ready(function($) {
    var page = 1;

    // Função para carregar posts
    function loadPosts(action, idField) {
        page++;
        var data = {
            action: action,
            page: page
        };
        if (idField) {
            data[idField] = ajax_params.queried_object_id; // Adiciona o ID da categoria ou tag se necessário
        }

        $.ajax({
            url: ajax_params.ajax_url,
            type: 'POST',
            data: data,
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
        // Verifica o tipo de página e chama a função adequada
        if (ajax_params.is_category) {
            loadPosts('load_more_category_posts', 'category_id');
        } else if (ajax_params.is_tag) {
            loadPosts('load_more_tag_posts', 'tag_id');
        } else {
            loadPosts('load_more_general_posts'); // Posts gerais
        }
    });
});
