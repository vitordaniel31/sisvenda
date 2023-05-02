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

O sistema poderá ser utilizado apenas por dois tipos de usuários, o administrador principal e o administrador simplificado. 

Perfil                                 | Descrição   |
---------                              | ----------- |
Administrador Principal | Esse perfil será criado desde a implantação do sistema e conseguirá fazer alterações em todos os níveis.
Administrador           | Assim como o anterior, esse administrador poderá realizar seu login, porém, haverá de ser cadastrado pelo Administrador Principal e terá algumas limitações. Suas permissões serão determinadas pelo Administrador Principal.

## Lista de Requisitos Funcionais

  Requisito    |    Descrição    |    Ator    |
---------                                 | ----------- | ---------- |
RF001 - Login    | <p align="justify"> O sistema terá uma tela de login para o administrador entrar e realizar operações. O login será feito com email e senha. E terá a possibilidade de recuperar a senha. </p> | Administrador |
RF002 - Logout | <p align="justify">O sistema terá um botão para quando o usuário quiser encerrar sua sessão. </p> | Administrador |
RF003 - Cadastro de Administrador | <p align="justify">O sistema terá um usuário administrador inapagável. Esse administrador terá a permissão para cadastrar outros usuários administradores. </p>| Administrador Principal |
RF004 - Edição dos dados dos administradores | <p align="justify">O sistema deverá permitir a alteração de dados dos administradores, como: email, nome, senha etc. </p> | Administrador Principal |
RF005 - Cadastro de Produtos | <p align="justify">O sistema deve permitir que um administrador cadastre novos produtos. </p> | Administrador |
RF006 - Edição dos dados dos produtos | <p align="justify">O sistema deverá permitir a alteração de dados dos produtos, como: nome e preço. Além da possibilidade de desativá-lo caso o produto não esteja mais à venda.</p> | Administrador |
RF007 - Cadastro de Vendas | <p align="justify">O sistema deve permitir que o administrador cadastre uma nova venda contendo o(s) produto(s), valor, método de pagamento e data.</p> | Administrador |
RF008 - Cancelar Vendas | <p align="justify">Caso a venda esteja incorreta o administrador poderá cancelá-la. Mudando assim, o status da venda para cancelada.</p> | Administrador |
RF009 - Relatórios Periódicos | <p align="justify">O administrador poderá gerar um relatório a partir das vendas realizadas, onde conseguirá um feedback a respeito dos produtos que estão sendo mais vendidos, como também os meios de pagamentos mais utilizados e o valor total das vendas no período escolhido.</p> | Administrador |
RF010 - Gerar Conta a Receber para Pagamento | <p align="justify">O sistema, quando o administrador finalizar uma venda, irá gerar uma conta a receber, para que o cliente realize o pagamento, seja com uma ou mais formas, e assim, confirme o sucesso daquela venda. Cada conta a receber, terá um ou muitos registros de pagamento e um pagamento poderá ser feito com uma forma de pagamento. Assim, o cliente pode realizar vários pagamentos, com várias formas de pagamentos diferentes, até que a soma desses pagamentos resultem no valor total do pedido. Vale ressaltar que poderia vir a existir um novo requisito dando continuidade para este, sendo esse o requisito de emissão de notas fiscais. No entanto, o cliente optou por não emitir notas pelo sistema.</p> | Administrador |
RF011 - Manter PIX | <p align="justify">O sistema terá cadastrado diferentes chaves PIX, para que o pagamento possa ser efetuado de tal forma. Para o administrador, será possível cadastrar novas chaves, editar e desativar as chaves existentes.</p> | Administrador |
RF012 - Exclusão de administrador | <p align="justify">O sistema deverá permitir a exclusão de administradores. No entanto, o administrador principal, que será cadastrado pela equipe desenvolvedora, não poderá ser excluído.</p> | Administrador Principal |
RF013 - Gerador de QR Code para PIX | <p align="justify">Para clientes que desejem pagar via PIX, o sistema deverá gerar um QRcode com o valor em questão, e verificar se o pagamento foi realizado.</p> | Administrador |

## Lista de Requisitos Não-Funcionais

Requisito                                 | Descrição   |
---------                                 | ----------- |
RNF001 - Segurança | <p align="justify">O sistema deve fornecer segurança para com os dados da loja. Desse modo, o usuário deverá utilizar senhas fortes e o sistema cobrará de forma periódica a troca de senha.</p> |
RNF002 - Valores Permanentes das Vendas | <p align="justify">Mesmo que um produto tenha o preço modificado, os valores das compras passadas não serão alterados.</p> |
RNF003 - Registro automático de logs | <p align="justify">Para segurança do sistema, haverá uma tabela para registrar todas as ações do sistema: login e logout dos usuários, alteração de dados e emissão de relatórios. Salvando sempre o antes e o depois da alteração. </p>|

## Riscos

<p align=justify>A seguinte tabela apresenta uma listagem de eventuais riscos que estão previstos pela equipe, acompanhados da solução que será tomada para evitar o ocasionamento desses fatos.</p>

Data | Risco | Prioridade | Responsável | Status | Providência/Solução |
------ | ------ | ------ | ------ | ------ | ------ |
01/12/2022 | Não aprendizado das ferramentas utilizadas pelos componentes do grupo | Alta | Gerente | Vigente | Reforçar estudos sobre as ferramentas e aulas com a integrante que conhece a ferramenta |
01/12/2022 | Ausência por qualquer motivo do cliente | Média | Gerente | Vigente | Planejar o cronograma tendo em base a agenda do cliente |
01/12/2022 | Divisão de tarefas mal sucedida | Baixa | Gerente | Vigente | Acompanhar de perto o desenvolvimento de cada membro da equipe |
01/12/2022 | Não cumprimento do prazo estabelecido em contrato com o cliente | Alta | Gerente | Vigente | Planejar o cronograma tendo em base a agenda do cliente, prevendo eventuais contratempos |
01/12/2022 | Implementação de protótipos com as tecnologias. | Alta | Gerente | Vigente | Encontrar tutorial com a maioria da tecnologia e implementar um caso base do sistema. |
