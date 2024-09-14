jQuery(document).ready(function ($) {
    // Função para exibir ou ocultar a barra de pesquisa ao clicar no botão de busca
    $(".btn-search").click(function (e) {
        e.preventDefault(); // Previne o comportamento padrão do clique
        
        // Verifica se o campo de busca está ativo
        if ($(".input").hasClass("active")) {
            // Se o campo está ativo e tem um valor, submete o formulário
            if ($(".input").val().length > 0) {
                $("#searchForm").submit(); // Submete o formulário
            } else {
                // Se o campo está ativo mas não tem valor, fecha o campo
                $(".input").removeClass("active");
                $(this).removeClass("animate");
            }
        } else {
            // Se o campo não está ativo, ativa e dá foco
            $(".input").addClass("active").focus();
            $(this).addClass("animate");
        }
    });

    // Submete o formulário se o Enter for pressionado no campo de busca
    $(".input").on("keypress", function(e) {
        if (e.which === 13 && $(".input").val().length > 0) { // Verifica se foi "Enter" e se o campo tem valor
            $("#searchForm").submit();
        }
    });

    // Fecha o campo de busca se o usuário clicar fora dele
    $(document).click(function (e) {
        if (!$(e.target).closest('.search-box, .btn-search').length) {
            $(".input").removeClass("active");
            $(".btn-search").removeClass("animate");
        }
    });
});
