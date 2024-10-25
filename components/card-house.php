<?php
function renderCardImovel($imovel) {
    $imagem = isset($imovel['imagem']) ? $imovel['imagem'] : 'caminho/para/imagem-padrao.jpg'; // Imagem padrão
    $titulo = isset($imovel['titulo']) ? $imovel['titulo'] : 'Título não disponível';
    $localizacao = isset($imovel['localizacao']) ? $imovel['localizacao'] : 'Localização não disponível';
    $suites = isset($imovel['suites']) ? $imovel['suites'] : 0;
    $quartos = isset($imovel['quartos']) ? $imovel['quartos'] : 0;
    $banheiros = isset($imovel['banheiros']) ? $imovel['banheiros'] : 0;
    $garagens = isset($imovel['garagens']) ? $imovel['garagens'] : 0;

    // Formata o preço corretamente
    $preco_string = isset($imovel['preco']) ? $imovel['preco'] : '0,00';
    $preco_float = (float) str_replace(',', '.', str_replace('.', '', $preco_string));
    $preco = number_format($preco_float, 2, ',', '.'); // Formatação do preço

    $status = isset($imovel['status']) ? $imovel['status'] : 'Indefinido';
    $id = isset($imovel['id']) ? $imovel['id'] : ''; // Verifica se o ID existe

    return '
        <div class="col-md-4 mb-4">
            <a href="../pages/detalhes_imovel.php?id=' . htmlspecialchars($id) . '" class="text-decoration-none">
                <div class="card pastel-card position-relative">
                    <img src="' . htmlspecialchars($imagem) . '" class="card-img-top" alt="Imagem do imóvel: ' . htmlspecialchars($titulo) . '">
                    <div class="position-absolute top-0 end-0 m-2 p-1 bg-success text-white rounded" style="font-size: 0.75rem;">
                        <strong>' . htmlspecialchars($status) . '</strong>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">' . htmlspecialchars($titulo) . '</h5>
                        <p class="card-text">
                            <i class="bi bi-geo-alt"></i> <strong>Localização:</strong> ' . htmlspecialchars($localizacao) . '
                        </p>
                        <p class="card-text">
                            <span title="Suítes">
                                <img src="../icons/bathtub_bathroom_shower_bath_icon_196815.svg" alt="Suítes" style="width: 16px; height: 16px;"> ' . htmlspecialchars($suites) . '
                            </span>
                            <span title="Quartos">
                                <img src="../icons/sleepingbedsilhouette_89127.svg" alt="Quartos" style="width: 16px; height: 16px;"> ' . htmlspecialchars($quartos) . '
                            </span>
                            <span title="Banheiros">
                                <img src="../icons/toilet_paper_wc_restroom_sanitary_hygienetoilet_bathroom_icon_124451.svg" alt="Banheiros" style="width: 16px; height: 16px;"> ' . htmlspecialchars($banheiros) . '
                            </span>
                            <span title="Vagas de Garagem">
                                <img src="../icons/car-front-fill.svg" alt="Garagens" style="width: 16px; height: 16px;"> ' . htmlspecialchars($garagens) . '
                            </span>
                        </p>
                        <p class="card-text"><strong>Preço:</strong> <span style="font-size: 1.25rem;">R$ ' . $preco . '</span></p>
                    </div>
                </div>
            </a>
        </div>
    ';
}
?>
