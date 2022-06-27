# Web1-TrabalhoFinal

## Titulo da aplicacao
**PS4Review.**

## Descricao

A pagina eh um blog ficticio administrado pelo usuario lucas,
que escreve posts com sua opiniao sobre games de PlayStation4.
Os usuarios por sua vez, visualizam e comentam os posts se assim desejarem.
O objetivo da aplicacao eh consolidar os conhecimentos e tecnicas abordados
na disciplina de Desenvolvimento Web. 

## Recursos

O projeto possui os seguintes recursos disponiveis ao usuario:

* **Todos**:
* Criar conta;
    * Visualizar pagina inicial;

* **Usuarios logados**:
    * Visualizacao de posts. 
    * Criacao, visualizacao, edicao e exclusao de seus PROPRIOS comentarios;

* **Exclusivo Administrador**:
    * Criacao, visualizacao, edicao e exclusao de posts; 

## Tecnologias (Stack):

* **Cliente**
    * *Visual*
        * HTML;
        * CSS;
        * Bootstrap;
    
    * *Funcionalidades*   
        * JavaScript;
        * JQuery;

* **Servidor**
    * *Sistema Operacional*
        * Linux;

    * *Servidor* 
        * Apache;

    * *Banco de dados*    
        * MySQL;

    * *Linguagem de programacao*    
        * PHP;
## Organizacao:

O projeto foi dividido em diretorios com arquivos, sendo:

* **app** : Diretorio base da aplicacao.

* **Subdiretorios de /app**

    * *css*
        * form_view.css : Folha de estilos exclusiva da pagina view.php.
        * index.css : Folha de estilos contendo a barra superior, rodape e cores;
        * main.css : Folha de estilos com regras e estilos para formularios;

    * *database*
        * db_create.php : Script de criacao do banco de dados;
        * db_credentials.php : Arquivo com as credenciais de acesso ao BD;
        * db_functions.php : Arquivo com funcoes de conexao do BD;

    * *validation*
        * authenticate.php : Arquivo para validacao de login e nivel de acesso;
        * val_functions.php : Arquivo com funcoes de validacao de campos;
        * register_check.php : Arquivo para validacao de criacao de conta e insercao no BD;
        * login_check.php : Arquivo para validacao de login;
        * check_new_post.php : Arquivo de validacao de novo post e insercao no BD;
        * check_update_post.php : Arquivo de validacao de post alterado e atualizacao no BD;
        * check_delete_post.php : Arquivo de validacao de exclusao de post e exclusao no BD;
        * check_new_comment.php : Arquivo de validacao de novo comentario e insercao no BD;
        * edit_comment.php : Arquivo de validacao de comentario alterado e atualizacao no BD;
        * comment_delete.php : Arquivo de validacao de exclusao de comentario e exclusao no BD;
        * check_posts.php : Arquivo com funcoes para manipular posts e comentarios.
        * check_form_....js : Arquivos de validacao de formulario no lado cliente;

* **Arquivos em /app sem subdiretorio**
    * index.php : Pagina principal;
    * login.php : Pagina de login;
    * register.php : Pagina de criacao de conta;
    * logout.php : Pagina que realiza logout, nao possui aparencia.
    * new_post.php : Pagina exclusiva do admin para criacao de posts.
    * edit_post.php : Pagina exclusiva do admin para alteracao de posts.
    * posts.php : Pagina exclusiva do admin que lista seus posts.
    * view.php : Pagina para visualizar um post e seus comentarios, permitindo adicionar,
                   editar e excluir seus comentarios. 

## Autor
**LUCAS FRISON GONCALVES**   

## Status
Projeto utilizado como ferramenta de aprendizado, nao ha planos de producao.
Desenvolvimento encerrado.
