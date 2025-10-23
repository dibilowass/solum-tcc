document.addEventListener('DOMContentLoaded', function() {
    // Seleciona todos os itens do menu
    const menuItems = document.querySelectorAll('.menu-item');
    
    // Adiciona evento de clique para cada item do menu
    menuItems.forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Remove a classe active de todos os itens do menu
            menuItems.forEach(i => i.classList.remove('active'));
            
            // Adiciona a classe active ao item clicado
            this.classList.add('active');
            
            // Pega a seção correspondente do atributo data-section
            const sectionId = this.getAttribute('data-section');
            
            // Esconde todas as seções
            document.querySelectorAll('.secao-conteudo').forEach(section => {
                section.classList.remove('active');
            });
            
            // Mostra a seção selecionada
            document.getElementById(sectionId).classList.add('active');
        });
    });
});