document.addEventListener('DOMContentLoaded', function () {
    // Função de callback para o Intersection Observer
    const animateOnScroll = (entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Adiciona as classes de animação quando o elemento entra no viewport
                entry.target.classList.add('animate__animated', 'animate__fadeInUp');
                
                // Para evitar reanimações ao rolar novamente, pode remover o observer para este elemento
                observer.unobserve(entry.target);
            }
        });
    };

    // Configura o Intersection Observer
    const observer = new IntersectionObserver(animateOnScroll, {
        threshold: 0.1 // 10% do elemento visível para acionar a animação
    });

    // Seleciona todos os elementos que precisam da animação
    const elementsToAnimate = document.querySelectorAll('.animate-on-scroll');

    // Observa cada elemento
    elementsToAnimate.forEach(element => {
        observer.observe(element);
    });
});
