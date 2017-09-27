/**
 * Gulp-file.
 * CONFIGURAÇÃO.
 *
 * Configuração do projeto para tarefas do gulp.
 *
 * Este arquivo é simplesmente um modelo para correr um peueno projecto
 * Nos caminho você pode adicionar << glob ou array of globs >>.
 * Edite as variáveis de acordo com os requisitos do seu projeto.
 *
 * Atualiza-o sempre consuante a tua necessidade.
 *
 * SÊ FELIZ SIMPLIFICANDO... code!
 *
 * @author Shir Hashirim (@shir-hashirim)
 * @version 0.0.1
 *
 */

/**
 * Tarefas aki implementadas:
 *
 *      1. Recarrega o navegador com browser-sync.
 *      2. Injeção dos pacotes Bower.
 *      2. Conversão Sass para CSS, prefixação automática e Minualização.
 *      3. Concatena e uglifica (min) os arquivos JS.
 *      4. Comprimir as imagens PNG, JPEG, GIF e SVG.
 *      2. Automatização do PHPUnit para teste.
 *      5. Relata mudanças no ficheiros HTML, PHP, CSS e JS.
 *      6. InjectCSS em vez de recarregar a página do navegador.
 *
 * Futura implementações:
 *      *. Automatização com Travis CI
 *      *. Mode de Desenvolvimento e Produção
 *
 */

// 'use strict';

/**
 * Carregar os Plugins.
 *
 * Carregue o gulp com seus plugins e atribua-lhes nomes mais intuitivos.
 */

var gulp = require('gulp'), // Gulp o anfitrião da festa... DAaHah!

    // Plugins primários ('roda')
    // Asynchronous, reloads browser and injects CSS.
    syncB = require('browser-sync').create(),
    recarregar = syncB.reload, // For manual browser reload.
    porta = process.env.SERVER_PORT || 3000,

    minifica = require('gulp-uglify'), // Minificar ficheiros JS.
    sass = require('gulp-sass'), //  Para compilar Sass.
    prefixo = require('gulp-autoprefixer'), // Auto-prefixing p/ .
    // Comprimir imagens
    imagens = require('gulp-imagemin'),



    // Plugins Tet Unit ('acessórios')
    // Gerenciador de pacotes para aweb
    sys = require('sys'),
    exec = require('child_process').exec,

    // Plugins Compulsório ('acessórios')
    // Gerenciador de pacotes para aweb
    bower = require('gulp-bower'),
    wiredep = require('wiredep').stream,
    // plugins relacionado com ficheiros JS.
    // jshint = require('gulp-jshint'), // Breve implementção
    junta = require('gulp-concat'), // Concatenates JS files
    // gutil util em notificar sms de erros e passar em flags
    gutil = require('gulp-util'),
    // Plugin de notificação para você ( deprecido: implementção de gutil [incompleto])
    nota = require('gulp-notify'),
    // Plugin para renomear ficheiros Ex: style.css -> style.min.css
    renomea = require('gulp-rename'),


    /**
     * INICIANDO Projecto por Editando as Variáveis ...
     *
     * Carregue a configuração relacionada ao projeto.
     *
     */

    Projecto = {

        // Nome do Projeto, usado para criar pacote zip.
        nome: 'DojoPhp',
        url: 'http://www.dojo.ao/dojophp/', //  URL do projeto. Pode ser algo como localhost: 7777.( o url é um exmplo )
        origem: './src/', // Direção do seu coódigo fonte. Deixe-o como está, já que o nosso gulpfile.js está na pasta raiz..
        destino: './app/', // Os ficheiros que você deseja empacotar em um zip vão aqui
        bower: {
            pasta: './bower_components/', // Caminho para o bower.
            json: 'bower.json', // .
            // O padrão é deixar a pasta raiz.
        },
        team: 'deborla <dojophp@cda.ao>' // Team a ser culpado..(o.0)ehehehe..(;-D)
    },

    // Definindo caminhos gerais
    caminho_d = {
        estilos: {
            origem: Projecto.origem + 'sass/', // Caminho para o .scss principal.
            destino: Projecto.destino + 'assets/css/', // Caminho para colocar o CSS compilado.
            // O padrão é deixar a pasta raiz.
        },

        // Relacionado com JS Vendor & Personalizado .
        scripts: {
            origemVen: Projecto.origem + 'js/vendor/', // Caminho para a pasta JS vendor.
            origem: Projecto.origem + 'js/', // Caminho para a pasta de scripts JS personalizados.
            destino: Projecto.destino + 'assets/js/', // Caminho para colocar os scripts personalizados JS compilado.
        },
        imagens: {
            // Pasta de imagens que deve ser otimizada..
            origem: Projecto.origem + 'img/',
            // Pasta de destino de imagens otimizadas. Deve ser diferente da pasta images de origem.
            destino: Projecto.destino + 'assets/img/'
        },
    },
    // Definindo os ficheiros e seus caminhos
    ficheiros_da_App = {
        // Caminho paraProjecto todos os ficheiros * .php
        // e Exclusão ficheiros e pastas
        php: [
            Projecto.origem + '**/*.php', // Pasta raiz dir
            // Excluindo os pastas e ficheiros
            '!node_modules/**/*',
            '!vendor/**/*',
            // '!tests/**/*',
            '!tmp/**/*',
            '!bower_components/**/*',
            '!style.css.map',
        ],
        // incluindo tipo de ficheiros communs
        outros: [
            '**/*.html',
            '**/*.css',
            '**/*.js',
            '**/*.{png,jpeg,jpg,gif,svg}',
            '**/*.ttf',
            '**/*.otf',
            '**/*.eot',
            '**/*.woff',
            '**/*.woff2',
        ],
        estilos: caminho_d.estilos.origem + '**/*.scss', // **/*.scss Caminho para *.scss dentro da pasta de estilos.
        // Caminho para os ficheiros JS.
        scripts: {
            vendor: {
                nome: 'main',
                origem: caminho_d.scripts.origemVen + '*.js'
            },
            origem: caminho_d.scripts.origem + '*.js' // Todos JS personalizados.
        },
        imagens: caminho_d.imagens.origem + '**/*.{png,jpeg,jpg,gif,svg}', //Caminho da origem das imagens
    },

    // TERMINANDO a Edição das Variáveis do Projecto.

    // Manipulação de mensagens ou erros
    ver_uEvento = function(artista) {
        gutil.log('File',
            gutil.colors.cyan(artista.path.replace(
                new RegExp('/.*(?=/' + Projecto.origem + ')/'), '')),
            'era', gutil.colors.magenta(artista.type));
        // console.error.bind(error);
        // this.emit('end');
    };

// Browsers que importa fazer o css prefixo. Cheka a lista https://github.com/ai/browserslist
const PREFIXO_DOS_BROWSERS = [
    'last 2 version', '> 1%', 'ie >= 9',
    'ie_mob >= 10', 'ff >= 30', 'chrome >= 34',
    'safari >= 5', 'opera >= 23', 'ios >= 6',
    'android >= 4', 'bb >= 10'
];

// Função para manipulação de erros
// function mostra_uErro(error) {
//     console.error.bind(error);
//     this.emit('end');
// }

//###################################################################
// TAREFAS DE DESENVOLVIMENTOS
// ##################################################################

// Tarefas do Travis
// TODO: Implementação e automatização do Travis CI
// Start a Travis webserver.
gulp.task('travis', ['build', 'testServJS'], function() {
    // Forçar as tarefas terminar sem erro algum
    process.exit(0);
})

// Iniciando o browserSync para webserver.
gulp.task('sync_na_tela', function() {
    syncB.init({

        server: Projecto.destino,
        notify: false,

        // Quando seu aplicativo também usa sockets web
        // proxy: Projecto.url,

        // Use uma porta específica (sempre melhor).
        port: porta,

        // 'true' é abrir automaticamente o browser com o syncB ativo.
        open: true,

        // Injecta mudanças do CSS
        // E recarregar o browser em cada alteração CSS.
        injectChanges: true,

        // forçando para abrir no com o meu FF
        browser: ["firefox"],
        reloadOnRestart: false
    });
});

// Bower gerenciador de pacotes
gulp.task('bower', function() {
    return bower();
});

// Tarefa wiredep, injector de reursos bower
gulp.task('injector-bower', function() {
    gulp.src(Projecto.destino + '/index.html')
        .pipe(wiredep({
            optional: 'configuration',
            goes: 'here'
        }))
        .pipe(gulp.dest(Projecto.destino));
});

// Tarefa de Estilos
gulp.task('estilos', function() {
    gulp.src(ficheiros_da_App.estilos)
        .pipe(sass({
            errLogToConsole: true,
            outputStyle: 'compressed',
            precision: 10
        }))
        // .on('error', mostra_uErro)
        .on('error', function(erro) {
            new gutil.PluginError('CSS', erro, {
                showStack: true
            });
        })
        .pipe(prefixo(PREFIXO_DOS_BROWSERS))
        .pipe(renomea({ suffix: '.min' }))
        .pipe(gulp.dest(caminho_d.estilos.destino))
        .pipe(syncB.stream()) // Recarrega os ficheiros.min.css caso haja alteração.
        .pipe(nota({
            message: 'Tarefa de: "ESTILOS" Completo!',
            onLast: true
        }));
});

// Tarefa Uglify - minificar os ficehiros JS
gulp.task('scripts', function() {
    gulp.src(ficheiros_da_App.scripts.origem)
        .pipe(junta(ficheiros_da_App.scripts.vendor.nome + '.js')) // Juntar todos files JS com o Concat.
        .pipe(minifica()) // minificar o ficheiro com o Uglify
        // .on('error', mostra_uErro) // reportar caso haja error
        .pipe(renomea({ suffix: '.min' })) // incluir 'min' aos ficheiros após minificação
        .pipe(gulp.dest(caminho_d.scripts.destino))
        .pipe(nota({
            message: 'Tarefa de: "SCRIPTS" Completo!',
            onLast: true
        }));
});

// Tarefa para compressão de imagens
gulp.task('imagens', function() {
    gulp.src(ficheiros_da_App.imagens)
        .pipe(imagens({
            interlaced: true,
            progressive: true,
            optimizationLevel: 5
        }))
        .pipe(gulp.dest(caminho_d.imagens.destino))
        .pipe(nota({
            message: 'Tarefa de: "IMAGENS" Completo!',
            onLast: true
        }));
});

// TODO: Testes
// Tarefa PHPUnit (teste automático)
gulp.task('phpunit', function() {
    exec('phpunit', function(error, fora) {
        sys.puts(fora)
    })
});

// Tarefa do Vigia
gulp.task('vigia', ['bower', 'estilos', 'scripts', 'imagens', 'sync_na_tela'], function() {

    // Vigiar mudanças nos ficheiros PHP, SCSS, JS, e recarregar o browser.
    gulp.watch(ficheiros_da_App.php, { debounceDelay: 2000 }, ['phpunit']).on('change', recarregar, function(artista) {
        ver_uEvento(artista);
    });

    // Injectar bower em cada mudança.
    gulp.watch(Projecto.bower.json, ['injector-bower']).on('change', function(artista) {
        ver_uEvento(artista);
    });

    // Recarregar a cada mudança dos ficheiros SCSS.
    gulp.watch(ficheiros_da_App.estilos, ['estilos']).on('change', function(artista) {
        ver_uEvento(artista);
    });

    // Recarregar a cada mudança dos ficheiros JS.
    gulp.watch(ficheiros_da_App.scripts.origem, ['scripts']).on('change', recarregar, function(artista) {
        ver_uEvento(artista);
    });

    // Vigiando a pasta de imagens ex:'./img/raw/**/*'
    gulp.watch(ficheiros_da_App.images, ['imagens']).on('change', recarregar, function(artista) {
        ver_uEvento(artista);
    });

    gulp.src(caminho_d.scripts.destino + 'main.js')
        .pipe(nota({
            message: 'o Gulp agora está Vigiando. Feliz Coding...!',
        }));
});

// Tarefas do Pai Grande (padrão)
gulp.task('default', ['phpunit', 'estilos', 'scripts', 'imagens', 'sync_na_tela'], function() {
    gulp.src(caminho_d.scripts.destino + 'main.js')
        .pipe(nota({
            message: 'Compilação dos Assets com Sucesso.'
        }));
});