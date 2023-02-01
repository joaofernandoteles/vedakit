# BASE DE PROJETOS SITES INSTITUCIONAIS - ALSITE
Base de projetos institucionais utilizando Bootstrap v4.4.1 com SCSS, concatenização, minificação dos arquivos, autoprefixer, Browsersync e sourcemaps utilizando Gulp 4.

![bootstrap logo](https://user-images.githubusercontent.com/10498583/31125543-e2a88c2c-a848-11e7-87b0-d20ea38d41d0.jpg)
![sass logo](https://user-images.githubusercontent.com/10498583/31125541-e2a732e6-a848-11e7-959d-7d7b0c138124.jpg)
![gulp logo](https://user-images.githubusercontent.com/10498583/31125542-e2a78b88-a848-11e7-8ac5-c396f46e811f.jpg)
![browsersync logo](https://user-images.githubusercontent.com/10498583/31125540-e2a6eed0-a848-11e7-817a-69c5619f772a.jpg)

## Pré Requisitos
- [Node.js](https://nodejs.org/en/download/ "Node Js")
-  NPM (Comes with Node.js)
- [Gulp 4](https://gulpjs.com/ "Gulp")

Instale Gulp cli

     $ npm install --global gulp-cli
     

## Iniciando o Projeto

1. Clone o repositorio:
`git clone https://alsitedev@bitbucket.org/alsite/modelo.git`

2. Renomeie o diretorio

3 Navegue até o diretório
`cd NOME_DO_DIRETORIO`
    
4. Instale todas as bibliotecas e dependências do NodeJS
   `npm install`

5. Inicie o servidor:
  - `gulp dev`  - inicia um servidor localhost com sincronização de navegador, verificando PHP, SCSS, JS com recarregamento de página.

  - `gulp`      - minimiza o CSS / JS e publica o projeto no diretório **dist**, pronto para subir no FTP.

## Comandos do Gulp
**gulp dev**

O comando gulp serve inicia um servidor local Browsersync que roda seus arquivos no navegador.
Ele recarrega a página atual ao alterar arquivos PHP, Sass e JS.
A saída de todos os arquivos Sass vai para main.css
Todos os arquivos JS são concatenados em main.js
Você pode acessar o servidor de desenvolvimento com outros dispositivos na mesma rede. Vá para o endereço "Externo" especificado pelo Browsersync (consulte o terminal) no navegador da web do seu dispositivo.
```
gulp dev
```

**gulp (build)**

O comando principal gulp está configurado para criar um diretório "dist" com uma versão de produção do projeto, pronta para ser implantada.
Minifica e renomeia os recursos JS / CSS, além de limpar o antigo diretório "dist". O CSS é autoprefixado para as duas últimas versões dos navegadores.
```
gulp
```

**gulp concatScripts**

O comando gulp concatScripts combina os recursos JS especificados em main.js
Você pode adicionar novos arquivos JS a este comando na linha 16 em gulpfile.js
Você pode executar concatScripts separadamente após adicionar novos arquivos JS.
```
gulp concatScripts
```

## Sobrescrevendo as variáveis sass do Bootstrap
Você pode sobrescrever variáveis sass de bootstrap específicas removendo o comentário de linhas em `assets/scss/_bootstrap_variable_overrides.scss`