<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GridNews - Crom</title>
    <!-- Link para o CSS do Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <!-- Adicione o link para o CSS do SweetAlert no <head> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- Adicione o script do SweetAlert no <head> -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        /* Reset e definição de tamanho total */
        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
        }

        /* Container principal do grid ocupa 100% da viewport */
        .parent {
            display: grid;
            grid-template-columns: repeat(10, 1fr);
            grid-template-rows: repeat(10, 1fr);
            gap: 5px;
            width: 100vw;
            height: 100vh;
        }

        .parent>div {
            background: rgba(108, 117, 125, 0.6);
            /* Cor de fundo com opacidade */
            border: 1px solid #495057;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            position: relative;
            overflow: hidden;

            background-size: cover;
            background-position: center;

            padding: 10px;

        }

        .parent>div::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0.75;
            z-index: 1;
            background-color: rgba(0, 0, 0, 1);
        }

        .parent>div>* {
            position: relative;
            z-index: 2;
        }

        .parent>div h3 {
            margin: 0;
            font-size: 2vw;
            color: #fff;
        }

        .parent>div p {
            margin: 5px 0 0;
            color: #ddd;
            /* tamanho font automatica */
            font-size: 1.5vw;
            max-height: 100px;
            max-width: 100%;

            /* se for maior que 100px, quebra a linha */
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        /* Painel lateral oculto à direita */
        .side-panel {
            position: fixed;
            top: 0;
            right: -250px;
            width: 250px;
            height: 100%;
            background: #495057;
            box-shadow: -2px 0 5px rgba(0, 0, 0, 0.3);
            transition: right 0.3s ease;
            padding: 20px;
            z-index: 100;
        }

        /* Classe para mostrar o painel */
        .side-panel.open {
            right: 0;
        }

        /* Tema escuro */
        body {
            background-color: #343a40;
            color: #fff;
        }

        .fade-out {
            animation: fadeOut 0.5s forwards;
        }

        .fade-in {
            animation: fadeIn 0.5s forwards;
        }

        @keyframes fadeOut {
            from {
                opacity: 1;
            }

            to {
                opacity: 0;
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        /* Estilos para o iframe e o botão de voltar */
        #newsIframe {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
            z-index: 200;
            display: none;
            background-color: rgba(0, 0, 0, 0.8);
        }

        #backButton {
            position: fixed;
            top: 10px;
            left: 10px;
            z-index: 300;
            display: none;
        }

        .service-iframe {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
            display: none;
            z-index: 150;

            background-color: rgba(0, 0, 0, 0.8);
        }

        #historyNews {

            margin: 0px !important;
            padding: 10px !important;
        }

        #historyNews li {
            border-radius: 15px;
            margin: 5px;
            padding: 10px;
            color: #fff;
            width: 100%;
            max-height: 100px;
            position: relative;
            overflow: hidden;
            /* remover ponto */
            text-overflow: ellipsis;
            white-space: nowrap;
            font-size: 0.75vw;
            background-size: cover;
            background-position: center;
            cursor: pointer;
        }

        #historyNews li::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0.75;
            z-index: 1;
            background-color: rgba(0, 0, 0, 1);
        }

        #historyNews li a {
            color: #fff;
            z-index: 2;
            position: relative;
            font-size: 0.75vw;
        }

        * {
            /* animation */
            transition: all 0.3s;
        }
    </style>
</head>

<body>

    <!-- Grid principal -->
    <div class="container-fluid parent">
        <div class="div1" style="background-image: url('https://picsum.photos/1000/1000?random=1');">
            <h3>Título 1</h3>
            <p>Descrição 1</p>
        </div>
        <div class="div2" style="background-image: url('https://picsum.photos/1000/1000?random=2');">
            <h3>Título 2</h3>
            <p>Descrição 2</p>
        </div>
        <div class="div3" style="background-image: url('https://picsum.photos/1000/1000?random=3');">
            <h3>Título 3</h3>
            <p>Descrição 3</p>
        </div>
        <div class="div4" style="background-image: url('https://picsum.photos/1000/1000?random=4');">
            <h3>Título 4</h3>
            <p>Descrição 4</p>
        </div>
        <div class="div5" style="background-image: url('https://picsum.photos/1000/300?random=5');">
            <h3>Título 5</h3>
            <p>Descrição 5</p>
        </div>
        <div class="div6" style="background-image: url('https://picsum.photos/1000/1000?random=6');">
            <h3>Título 6</h3>
            <p>Descrição 6</p>
        </div>
        <div class="div7" style="background-image: url('https://picsum.photos/1000/1000?random=7');">
            <h3>Título 7</h3>
            <p>Descrição 7</p>
        </div>
        <div class="div8" style="background-image: url('https://picsum.photos/1000/1000?random=8');">
            <h3>Título 8</h3>
            <p>Descrição 8</p>
        </div>
    </div>

    <!-- Painel lateral -->
    <div class="side-panel" id="sidePanel">
        <h2>Opções de Grid</h2>
        <label for="gridSelect">Selecione o grid:</label>
        <select id="gridSelect" class="form-control">
            <!-- As opções serão adicionadas via JavaScript -->
        </select>
        <label for="newsInterval">Tempo de troca de notícia (ms):</label>
        <input type="number" id="newsInterval" class="form-control" value="3500">
        <h2>Configuração de URLs</h2>
        <label for="googleUrl">Google URL:</label>
        <input type="text" id="googleUrl" class="form-control" value="https://www.google.com">

        <!-- input bootom reset localstorage and news -->
        <button class="btn btn-danger" id="btnReset">Reset</button>
    </div>

    <!-- painel lateral history -->
    <div class="side-panel" id="sidePanelHistory">
        <h2>Histórico de Notícias</h2>
        <ul id="historyNews">
            <!-- As opções serão adicionadas via JavaScript -->
        </ul>
    </div>

    <!-- Iframe para exibir a notícia -->
    <iframe id="newsIframe"></iframe>
    <!-- Botão para voltar à página inicial -->
    <button id="backButton" class="btn btn-primary">Voltar</button>

    <!-- Adicione os novos iframes -->
    <iframe id="googleIframe" class="service-iframe"></iframe>

    <script>
        // Array de layouts de grid – adicione novos objetos aqui conforme necessário
        const grids = [{
                name: "Grid Base",
                template: {
                    div1: "1 / 1 / 4 / 3",
                    div2: "1 / 3 / 4 / 7",
                    div3: "1 / 7 / 6 / 11",
                    div4: "4 / 1 / 8 / 3",
                    div5: "4 / 3 / 8 / 7",
                    div6: "6 / 7 / 11 / 9",
                    div7: "6 / 9 / 11 / 11",
                    div8: "8 / 1 / 11 / 7"
                }
            },
            {
                name: "Grid Alternativo",
                template: {
                    div1: "1 / 1 / 7 / 3",
                    div2: "7 / 1 / 11 / 3",
                    div3: "1 / 3 / 11 / 6",
                    div4: "1 / 6 / 3 / 9",
                    div5: "3 / 6 / 7 / 9",
                    div6: "7 / 6 / 11 / 9",
                    div7: "1 / 9 / 9 / 11",
                    div8: "9 / 9 / 11 / 11"
                }
            }
            // Adicione mais layouts aqui...
        ];

        const gridSelect = document.getElementById('gridSelect');
        const sidePanel = document.getElementById('sidePanel');
        const newsIframe = document.getElementById('newsIframe');
        const backButton = document.getElementById('backButton');
        const newsIntervalInput = document.getElementById('newsInterval');

        // Preenche o select com as opções definidas na array
        grids.forEach((grid, index) => {
            const option = document.createElement('option');
            option.value = index;
            option.textContent = grid.name;
            gridSelect.appendChild(option);
        });

        // Função que aplica o layout selecionado ao grid
        function applyGrid(index) {
            const grid = grids[index];
            // Para cada div definida no template, atualiza a propriedade grid-area
            for (const [divClass, area] of Object.entries(grid.template)) {
                const elements = document.querySelectorAll('.' + divClass);
                elements.forEach(el => {
                    el.style.gridArea = area;
                });
            }
            saveGridConfig(index); // Salva a configuração no localStorage
        }

        // Evento para atualizar o grid quando o usuário seleciona uma opção
        gridSelect.addEventListener('change', function(e) {
            applyGrid(e.target.value);
        });

        // Função para salvar a configuração do grid no localStorage
        function saveGridConfig(index) {
            localStorage.setItem('selectedGrid', index);
        }

        // Função para carregar a configuração do grid do localStorage
        function loadGridConfig() {
            const savedGrid = localStorage.getItem('selectedGrid');
            if (savedGrid !== null) {
                applyGrid(savedGrid);
                gridSelect.value = savedGrid;
            } else {
                applyGrid(0); // Aplica o layout base se não houver configuração salva
            }
        }

        // Carrega a configuração do grid ao carregar a página
        document.addEventListener('DOMContentLoaded', loadGridConfig);

        // Evento para abrir/fechar o painel lateral ao pressionar a tecla "p"
        document.addEventListener('keydown', function(e) {
            if (e.key.toLowerCase() === 'p') {
                sidePanel.classList.toggle('open');
            }
            if (e.key.toLowerCase() === 'r') {
                (async () => {
                    await RequestNews();
                    await setNewsStart();
                    await UpdateNews();
                    console.log(news);
                })();
            }
            if (e.key.toLowerCase() === 'y') {
                // toggleIframe('youtubeIframe', 'youtubeUrl');
            }
            if (e.key.toLowerCase() === 's') {
                // toggleIframe('spotifyIframe', 'spotifyUrl');
            }
            if (e.key.toLowerCase() === 'g') {
                toggleIframe('googleIframe', 'googleUrl');
            }
            if (e.key.toLowerCase() === 'c') {
                // toggleIframe('chatGptIframe', 'chatGptUrl');
            }
            if (e.key.toLowerCase() === 'h') {
                sidePanelHistory.classList.toggle('open');
            }
        });

        $("#btnReset").click(function() {
            localStorage.clear();
            (async () => {
                await RequestNews();
                await setNewsStart();
                await UpdateNews();
                console.log(news);
            })();
        });

        function toggleIframe(iframeId, urlInputId) {
            const iframe = document.getElementById(iframeId);
            const url = document.getElementById(urlInputId).value;
            const backButtonId = iframeId + 'BackButton';
            let backButton = document.getElementById(backButtonId);

            if (!backButton) {
                backButton = document.createElement('button');
                backButton.id = backButtonId;
                backButton.className = 'btn btn-primary';
                backButton.textContent = 'Voltar';
                backButton.style.position = 'fixed';
                backButton.style.top = '10px';
                backButton.style.left = '10px';
                backButton.style.zIndex = '300';
                backButton.style.display = 'none';
                backButton.addEventListener('click', () => {
                    iframe.style.display = 'none';
                    backButton.style.display = 'none';
                });
                document.body.appendChild(backButton);
            }

            if (iframe.style.display === 'block') {
                iframe.style.display = 'none';
                backButton.style.display = 'none';
            } else {
                if (url != document.getElementById(iframeId).src) {
                    iframe.src = url;
                }
                iframe.style.display = 'block';
                backButton.style.display = 'block';
            }
        }

        // Salvar e carregar URLs configuradas
        function saveUrls() {
            localStorage.setItem('googleUrl', document.getElementById('googleUrl').value);
        }

        function loadUrls() {
            document.getElementById('googleUrl').value = localStorage.getItem('googleUrl') || 'https://www.google.com/search?igu=1';

            // qudno o iframe for atualizado salva a url do iframe
            document.getElementById('googleIframe').addEventListener('load', saveUrls);
        }

        document.addEventListener('DOMContentLoaded', loadUrls);
        document.getElementById('googleUrl').addEventListener('change', saveUrls);

        // Aplica o layout base ao carregar a página
        applyGrid(0);

        function trocarNoticia(divClass, novoTitulo, novaDescricao, novaImagem, link) {
            const elemento = document.querySelector('.' + divClass);

            // Adiciona a classe de animação de saída
            elemento.classList.add('fade-out');

            // Após a animação de saída, troca o conteúdo e adiciona a animação de entrada
            setTimeout(() => {
                elemento.querySelector('h3').textContent = novoTitulo;

                // remover html
                novaDescricao = novaDescricao.replace(/<[^>]*>?/gm, '');

                elemento.querySelector('p').textContent = novaDescricao;
                elemento.style.backgroundImage = `url('${novaImagem}')`;

                // Remove a classe de animação de saída e adiciona a de entrada
                elemento.classList.remove('fade-out');
                elemento.classList.add('fade-in');

                // Adiciona evento de clique para abrir o iframe com a notícia
                elemento.onclick = () => {
                    newsIframe.src = link;
                    newsIframe.style.display = 'block';
                    backButton.style.display = 'block';
                };
            }, 500); // Tempo da animação de saída

            // Remove a classe de animação de entrada após a animação
            setTimeout(() => {
                elemento.classList.remove('fade-in');
            }, 1000); // Tempo total da animação (saída + entrada)
        }

        var news = [];

        async function RequestNews() {
            news = localStorage.getItem('news') ? JSON.parse(localStorage.getItem('news')) : [];
            await fetch('https://crom.run:5678/webhook/75469ded-9c12-4f40-9fea-9fbee5be5cd3')
                .then(response => response.json())
                .then(data => {
                    newsData = data.data;
                    newsData.forEach((item, index) => {
                        // verificar se existe na array pelo link
                        const existe = news.find((element) => element.link === item.link);
                        if (!existe) {
                            item.status = 0;
                            news.push(item);
                            addHistoryNews(item);
                        }
                    });
                });
            localStorage.setItem('news', JSON.stringify(news));
            loadHistoryNews();
        }

        var setTimepdate;
        var divSelected = 1;

        function updateNewsInterval() {
            const newInterval = parseInt(newsIntervalInput.value, 10);
            if (!isNaN(newInterval) && newInterval > 0) {
                clearInterval(setTimepdate);
                setTimepdate = setInterval(() => {
                    RequestNews();
                    if (news.length > 0) {
                        const randomIndex = Math.floor(Math.random() * news.length);
                        const randomNews = news[randomIndex];
                        // mudar status
                        if (randomNews.status === 0) {
                            randomNews.status = 1;
                            trocarNoticia('div' + (divSelected), randomNews.title, randomNews.description, randomNews.img, randomNews.link);
                            divSelected++;
                            if (divSelected > 8) {
                                divSelected = 1;
                            }
                        }
                    }
                }, newInterval);
            }
        }

        newsIntervalInput.addEventListener('change', updateNewsInterval);

        async function UpdateNews() {
            updateNewsInterval();
        }

        function setNewsStart() {
            // com status 0 pegar 8
            var randomNews = news.filter((item) => item.status === 0);
            if (randomNews.length < 8) {
                randomNews = news;
            }


            randomNews = randomNews.slice(0, 8);
            randomNews.forEach((item, index) => {
                trocarNoticia('div' + (index + 1), item.title, item.description, item.img, item.link);
            });


        }

        var historyNews = [];

        function addHistoryNews(news) {
            historyNews.push(news);
            localStorage.setItem('historyNews', JSON.stringify(historyNews));

            const li = document.createElement('li');
            li.innerHTML = `<a href="${news.link}" target="_blank">${news.title}</a>`;
            document.getElementById('historyNews').appendChild(li);
        }

        function loadHistoryNews() {
            historyNews = JSON.parse(localStorage.getItem('historyNews'));
            if (historyNews) {
                historyNews.forEach((item, index) => {
                    const li = document.createElement('li');
                    // colocar imagem de fundo
                    li.style.backgroundImage = `url('${item.img}')`;
                    li.innerHTML = `<a href="${item.link}" target="_blank">${item.title}</a>`;
                    document.getElementById('historyNews').appendChild(li);
                });
            }
        }

        (async () => {
            await RequestNews();
            setNewsStart();
            UpdateNews();
            loadHistoryNews();
        })();

        // Evento para fechar o iframe e voltar à página inicial
        backButton.addEventListener('click', () => {
            newsIframe.style.display = 'none';
            backButton.style.display = 'none';
        });

        // Função para exibir o tutorial
        function showTutorial() {
            Swal.fire({
                title: 'Bem-vindo ao GridNews!',
                html: `
                    <p>Este aplicativo pode ser usado em um monitor secundário, celular parado, televisão, etc.</p>
                    <h3>Atalhos:</h3>
                    <ul style="text-align: left;">
                        <li><strong>P:</strong> Abrir/Fechar painel lateral</li>
                        <li><strong>R:</strong> Atualizar notícias</li>
                        <li><strong>G:</strong> Abrir Google</li>
                        <li><strong>H:</strong> Abrir/Fechar histórico de notícias</li>
                    </ul>
                    <p>Divirta-se explorando as notícias!</p>
                `,
                icon: 'info',
                confirmButtonText: 'Entendi'
            });
        }

        // Chama a função showTutorial quando o documento estiver carregado
        document.addEventListener('DOMContentLoaded', showTutorial);
    </script>
    <!-- Link para o JS do Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>