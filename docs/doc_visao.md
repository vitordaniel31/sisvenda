<h4 align="center"> 

	🛍️  Sistema de Compra e Venda de Loja de Roupas 🛍️
    
</h4>


# Documento de Visão

<p align="justify">Esse projeto tem como intuito desenvolver um sistema que seja capaz de auxiliar o administrador a gerenciar as vendas de sua loja de roupas. De modo que possa ser facilmente cadastrado todas as vendas realizadas e que o dono da loja possa observar o funcionamento da empresa com mais eficácia.</p>

## Equipe e Definição de Papéis

Membro     |     Papel   |   E-mail   |
---------  | ----------- | ---------- |
José Marques     | Desenvolvedor e Testador             | jose.marques.707@ufrn.edu.br
Ketlly Azevedo   | Gerente de Projetos e Desenvolvedora | ketlly.azevedo.090@ufrn.edu.br
Vitor Daniel     | Analista, Testador                   | vitor.medeiros.709@ufrn.edu.br
Hugo Maia        | Analista e Desenvolvedor             | hugo2mufrn@gmail.com
Taciano          | Analista e Desenvolvedor             | taciano@bsi.ufrn.br

## Matriz de Competências

Membro     |     Competências   |
---------  | ----------- |
José Marques     | Desenvolvedor PHP, Laravel, Python, Django, SQL, HTML, CSS, JavaScript; Especialista em testes de software.
Ketlly Azevedo   | Desenvolvedora PHP, Laravel, Python, Django, SQL, HTML, CSS, JavaScript, Vue.
Vitor Daniel     | Analista de Sistemas; Desenvolvedor PHP, Laravel, Python, Django, SQL, HTML, CSS, JavaScript, AngularJS e Ionic.
Hugo Maia        | Desenvolveddor HTML, CSS, JavaScript, Python
Taciano          | Desenvolvedor Java, Junit, Eclipse, JSP, JSF, Hibernate, Matemática, Latex, etc;

## Perfis dos Usuários

O sistema poderá ser utilizado apenas por dois tipos de usuários, o administrador e o gerente. 

Perfil                                 | Descrição   |
---------                              | ----------- |
Administrador | Esse perfil será criado desde a implantação do sistema e conseguirá fazer alterações em todos os níveis.
Gerente           | Esse perfil todas as permissões que o Administrador, no entanto, não poderá cadastrar novos usuários, nem editar os existentes, como também não terá acesso ao histórico de movimentações. Suas permissões serão determinadas pelo Administrador.

## Lista de Requisitos Funcionais

  Requisito    |    Descrição    |    Ator    |
---------                                 | ----------- | ---------- |
RF001 - Login    | <p align="justify"> O sistema terá uma tela de login para o administrador entrar e realizar operações. O login será feito com email e senha. E terá a possibilidade de recuperar a senha. </p> | Todos os usuários |
RF002 - Logout | <p align="justify">O sistema terá um botão para quando o usuário quiser encerrar sua sessão. </p> | Todos os usuários. |
RF003 - Lista de Usuários | <p align="justify">O sistema deverá ter uma página que liste todos os usuários. </p>| Administrador |
RF004 - Cadastro de Usuário | <p align="justify">O sistema deverá ter a possibilidade de cadastrar novos usuários.</p>| Administrador |
RF005 - Edição de Usuário | <p align="justify">O sistema deverá permitir a alteração de dados dos usuários, como: email, nome, senha etc. </p> | Administrador |
RF006 - Excluir Usuário | <p align="justify">O sistema deverá permitir apagar um usuário, no entanto, esse registro não será apagado do banco de dados, mas sim inativado. </p> | Administrador |
RF007 - Lista de Produtos | <p align="justify">O sistema deverá ter uma página que liste todos os produtos. </p> | Administrador ou Gerente |
RF008 - Cadastro de Produtos | <p align="justify">O sistema deve permitir que um usuário cadastre novos produtos. </p> | Administrador ou Gerente |
RF009 - Edição de Produto | <p align="justify">O sistema deverá permitir a alteração de dados dos produtos, como: nome e preço.</p> | Administrador ou Gerente |
RF010 - Excluir Produto | <p align="justify">O sistema deverá permitir apagar um produto, no entanto, esse registro não será apagado do banco de dados, mas sim inativado. Essa funcionalidade poderá ser usada quando um produto não estiver mais a venda na loja, por exemplo.</p> | Administrador ou Gerente |
RF011 - Lista de Vendas | <p align="justify">O sistema deverá ter uma página que liste todos as vendas. </p> | Administrador ou Gerente |
RF012 - Cadastro de Vendas | <p align="justify">O sistema deve permitir que um usuário cadastre novas vendas. </p> | Administrador ou Gerente |
RF013 - Cancelar Vendas | <p align="justify">Caso a venda esteja incorreta o usuário poderá cancelá-la. Mudando assim, o status da venda para cancelada.</p> | Administrador ou Gerente |
RF014 - Cadastrar produtos na venda | <p align="justify">O usuário poderá inserir produtos na venda</p> | Administrador ou Gerente |
RF015 - Remover produtos da venda | <p align="justify">O usuário poderá remover produtos da venda</p> | Administrador ou Gerente |
RF016 - Gerar Conta a Receber para Pagamento | <p align="justify">O sistema, quando o usuário finalizar uma venda, irá gerar uma conta a receber, para que o cliente realize o pagamento, seja com uma ou mais formas, e assim, confirme o sucesso daquela venda. Cada conta a receber, terá um ou muitos registros de pagamento e um pagamento poderá ser feito com uma forma de pagamento. Assim, o cliente pode realizar vários pagamentos, com várias formas de pagamentos diferentes, até que a soma desses pagamentos resultem no valor total do pedido.</p> | Administrador ou Gerente |
RF017 - Gerador de QR Code para PIX | <p align="justify">Para clientes que desejem pagar via PIX, o sistema deverá gerar um QRcode com o valor em questão, e verificar se o pagamento foi realizado.</p> | Administrador ou Gerente |
RF018 - Lista de Formas de Pagamento | <p align="justify">O sistema deverá ter uma página que liste todas as formas de pagamento. </p> | Administrador ou Gerente |
RF019 - Cadastro de Formas de Pagamento | <p align="justify">O sistema deve permitir que um usuário cadastre novas formas de pagamento. </p> | Administrador ou Gerente |
RF020 - Edição de Forma de Pagamento | <p align="justify">O sistema deverá permitir a alteração de dados das formas de pagamento</p> | Administrador ou Gerente |
RF021 - Excluir Forma de Pagamento | <p align="justify">O sistema deverá permitir apagar uma forma de pagamento, no entanto, esse registro não será apagado do banco de dados, mas sim inativado. Essa funcionalidade poderá ser usada quando uma forma de pagamento não estiver mais sendo usada na loja, por exemplo.</p> | Administrador ou Gerente |
RF022 - Relatórios Periódicos | <p align="justify">O usuário poderá gerar um relatório a partir das vendas realizadas, onde conseguirá um feedback a respeito dos produtos que estão sendo mais vendidos, como também os meios de pagamentos mais utilizados e o valor total das vendas no período escolhido.</p> | Administrador ou Gerente |
RF023 - Estatísticas no Dashboard | <p align="justify">No dashboard, o usuário deve ter acesso a estatísticas, uma espécie de "mini relatórios" que ficarão disponivéis na página principal, como: número de vendas no dia, produtos mais vendidos na semana etc. </p> | Administrador ou Gerente |
RF024 - Histórico de Ações | <p align="justify">O sistema deve registrar no banco de dados todas as movimentações feitas por quaisquer usuários, como: alteração do preço de um produto, alteração de dados de um usuário, cadastro de vendas etc., para que fique registrado e em eventuais erros dos usuários, esse histórico possa ajudar a indetificá-los. </p> | Administrador ou Gerente |
RF025 - Lista de Histórico de Ações | <p align="justify">O sistema deverá ter uma página que liste o histórico de ações. </p> | Administrador |

## Lista de Requisitos Não-Funcionais

Requisito                                 | Descrição   |
---------                                 | ----------- |
RNF001 - Segurança | <p align="justify">O sistema deve fornecer segurança para com os dados da loja. Desse modo, o usuário deverá utilizar senhas fortes e o sistema cobrará de forma periódica a troca de senha.</p>

## Riscos

<p align=justify>A seguinte tabela apresenta uma listagem de eventuais riscos que estão previstos pela equipe, acompanhados da solução que será tomada para evitar o ocasionamento desses fatos.</p>

Data | Risco | Prioridade | Responsável | Status | Providência/Solução |
------ | ------ | ------ | ------ | ------ | ------ |
01/12/2022 | Não aprendizado das ferramentas utilizadas pelos componentes do grupo | Alta | Gerente | Vigente | Reforçar estudos sobre as ferramentas e aulas com a integrante que conhece a ferramenta |
01/12/2022 | Ausência por qualquer motivo do cliente | Média | Gerente | Vigente | Planejar o cronograma tendo em base a agenda do cliente |
01/12/2022 | Divisão de tarefas mal sucedida | Baixa | Gerente | Vigente | Acompanhar de perto o desenvolvimento de cada membro da equipe |
01/12/2022 | Não cumprimento do prazo estabelecido em contrato com o cliente | Alta | Gerente | Vigente | Planejar o cronograma tendo em base a agenda do cliente, prevendo eventuais contratempos |
01/12/2022 | Implementação de protótipos com as tecnologias. | Alta | Gerente | Vigente | Encontrar tutorial com a maioria da tecnologia e implementar um caso base do sistema. |
