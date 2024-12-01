<?php include_once 'header.php'; ?>

<main>
    <div class="searchContainer">
        <?php include_once 'components/searchbar.php'; echo searchbar();?>
    </div>
    <?php include_once 'components/category.php'; 
        echo category("Comunidade", ["Acolhimento de Crianças", "Animais", "Artistas", "Atividades", "Aulas", "Compartilha de Carro", "Conexões Perdidas", "Eventos", "Músicos", "Perdidos", "Voluntários"]);
        echo category("Imóveis", ["Aluguéis de Férias", "Apartamentos e Moradias", "Escritórios e Comerciais", "Estacionamentos", "Moradias Procuradas", "Quartos Procurados", "Quartos", "Troca de Casa", "Venda de Imóveis"]);
        echo category("Empregos", ["Administração", "Alimentação e Hospedagem", "Arquitetura", "Beleza", "Ciência", "Contabilidade", "Educação", "Fabricação", "Governo", "Gravação e Edição", "Imobiliária", "Legal e Paralegal", "Marketing", "Informática", "Recursos Humanos", "Saúde", "Segurança", "Software", "Suporte Técnico", "Transporte", "Tv, Filme e Video", "Negócio"]);
        echo category("Vendas", ["Antiguidade", "Artesanato", "Aviação", "Barco", "Bicicleta", "Bilhete", "Carro", "Caminhão", "Coleção", "Computador", "Desejado", "Eletrodoméstico", "Eletrônico", "Equipamento Pesado", "Desporto", "Ferramenta", "Foto e Vídeo", "Infantil", "Instrumento Musical", "Jardinagem", "Jogo e Brinquedo", "Jóia", "Livro", "Material", "Mobília", "Mota", "Negócio", "Peça de Barco", "Peça de Bicicleta", "Peça de Carro", "Peça de Mota", "Peça de Computador", "Roupa", "Sáude e Beleza", "Troca", "Video Jogo"]);
        echo category("Serviços", ["Animais Estimação", "Aula", "Beleza", "Computador", "Criativo", "Evento", "Jardim", "Financeiros", "Imóveis", "Jurídica", "Lar", "Marítimos", "Pequenos Negócios", "Mudança", "Viagem e Férias"]);
    ?>
</main>

<?php include_once 'footer.php'; ?>